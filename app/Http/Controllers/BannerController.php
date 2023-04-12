<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', Faq::class);

        return \view('banner.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBannerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBannerRequest $request)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            $validatedData['image'] = $this->saveImage($request->image);
        }

        Banner::create($validatedData);

        return redirect()->back()->with('success', 'Banner creado exitosamente');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBannerRequest  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            $validatedData['image'] = $this->saveImage($request->image);
        }
        $banner->update($validatedData);

        return redirect()->back()->with('success', 'Banner actualizado correctamente');
    }


    private function saveImage($image): string
    {
        return $image->store('images', 'public', null, ['hashName' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }
}
