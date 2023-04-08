<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $this->authorize('index', Faq::class);

        return \view('faqs.index');
    }

    /**
     * Display a create form.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $this->authorize('create', Faq::class);

        return \view('faqs.create');
    }

    public function store(CreateFaqRequest $createFaqRequest)
    {
        Faq::create($createFaqRequest->validated());

        return redirect()->route('faqs.create')->with('success', 'Pregunta creada con éxito');
    }
    /**
     * Display a edit form.
     *
     * @return Application|Factory|View
     */
    public function edit(Faq $faq)
    {
        $this->authorize('update', Faq::class);

        return \view('faqs.edit', compact('faq'));
    }

    public function update(Faq $faq, UpdateFaqRequest $updateFaqRequest)
    {
        $faq->update($updateFaqRequest->validated());

        return redirect()->route('faqs.edit', $faq->id)->with('success', 'Pregunta actualizada con éxito');
    }
}
