<?php

namespace App\Http\Controllers;

use App\Enums\ArticleStatus;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('articles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = Category::all(['id', 'name']);
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreArticleRequest $request
     * @return RedirectResponse
     */
    public function store(StoreArticleRequest $request)
    {
        $data = $this->buildAttributes($request);
        $article = Article::create($data);
        $article->tags()->sync($request->tags);

        return redirect()->route('articles.create')->with('success', 'Artículo creado con éxito');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     * @return Application|Factory|View
     */
    public function edit(Article $article)
    {
        $article->load('tags');
        $categories = Category::all(['id', 'name']);
        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateArticleRequest $request
     * @param Article $article
     * @return RedirectResponse
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        if ($request->hasFile('image'))
            $this->deleteOldImage($article->image);
        $data = $this->buildAttributes($request);
        $article->update($data);
        $article->tags()->sync($request->tags);
        return redirect()->route('articles.edit', $article)->with('success', 'Artículo actualizado con éxito');
    }

    /**
     * Builds the attributes array to be used when saving the resource.
     *
     * @param \Illuminate\Http\Request $request The request object.
     *
     * @return array The built attributes array.
     */
    private function buildAttributes(Request $request): array
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->user()->id;

        if ($request->hasFile('image')) {
            $validatedData['image'] = $this->saveImage($request->image);
        }

        if($validatedData['body']){
            return $this->saveImages($validatedData);

        }

        return $validatedData;
    }

    private function saveImages($validated)
    {


        $dom = new \DomDocument();
        $dom->loadHtml(mb_convert_encoding($validated['body'], 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $image_file = $dom->getElementsByTagName('img');

        if (!\File::exists(public_path('uploads'))) {
            \File::makeDirectory(public_path('uploads'));
        }

        foreach ($image_file as $key => $image) {
            $data = $image->getAttribute('src');
            $image_data = explode(';', $data);

            if (count($image_data) > 1) {
                list($type, $data) = $image_data;
                list(, $data) = explode(',', $data);

                $img_data = base64_decode($data);
                $image_name = "/uploads/" . time() . $key . '.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $img_data);

                $image->removeAttribute('src');
                $image->setAttribute('src', $image_name);
            }
        }

        $validated['body'] = $dom->saveHTML();

        return $validated;
    }

    private function saveImage($image): string
    {
        return $image->store('images', 'public', null, ['hashName' => true]);
    }

    private function deleteOldImage($oldImagePath)
    {
        if ($oldImagePath && Storage::disk('public')->exists($oldImagePath)) {
            Storage::disk('public')->delete($oldImagePath);
        }
    }

    public function showArticle($field, $value)
    {
        $article = Article::where($field, $value)->first();
        return \view('articles.show', compact('article'));
    }


    public function all()
    {
        $articles = Article::paginate(20);
        return \view('articles.index-web', compact('articles'));
    }
}
