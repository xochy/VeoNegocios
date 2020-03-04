<?php

namespace App\Http\Controllers;

use App\Category;
use App\Store;
use Intervention\Image\Facades\Image as ImageResize;
use App\Image;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    public function createFromCategory(Category $category)
    {
        return view('stores.create')->with('category', $category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //print($request->name);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFromCategory(Request $request, Category $category)
    {
        $store = new Store();

        $store->name = $request->name;
        $store->description = $request->description;
        $store->slug = 'store'.time();

        $store->category_id = $category->id;
        $store->user_id = auth()->user()->id;
         

        $store->save();

        if($request->hasFile('image'))
        {
            $imageStore = $this->storeImage($request->file('image'), 1);
            $store->images()->attach($imageStore);
        } 

        return redirect()->route('showCategoryInformation', compact('category'))
            ->with([
                'statusSuccess' => 'El negocio se ha almacenado correctamente'
            ]);
    }

     /**
     * Store a newly Image from category.
     *
     * @param  $file
     * @return $imageCategory
     */
    public function storeImage($file, $position)
    {
        $url = time().$file->getClientOriginalName();
        $file->move(public_path().'/images/', $url);      
        
        $imageCategory = new Image();
        $imageCategory->url = $url;
        $imageCategory->position = $position;
        $imageCategory->save();

        $this->resizeImage($url);
        
        return $imageCategory;
    }
    
    /**
     * Store a newly Image from category.
     *
     * @param  $url
     */
    private function resizeImage($url)
    {
        $imageResize = ImageResize::make(public_path() . '/images/' . $url)->fit(500, 300);
        $imageResize->save(null, 60, 'jpg');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //
    }
}