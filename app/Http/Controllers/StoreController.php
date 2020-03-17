<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreStoreRequest;
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
    public function storeFromCategory(StoreStoreRequest $request, Category $category)
    {
        $store = new Store();

        $store->name = $request->name;
        $store->description = $request->description;
        $store->slug = 'store'.time();

        $store->category_id = $category->id;
        $store->user_id = auth()->user()->id;         

        $store->save();

        if($request->hasFile('profileImage'))
        {
            $imageStore = $this->storeImage($request->file('profileImage'), 0, 500, 300);
            $store->images()->attach($imageStore);
        } 

        if($request->hasFile('coverImage1'))
        {
            $imageStore = $this->storeImage($request->file('coverImage1'), 1, 800, 250, 
            $request->tittleCoverImage1, $request->descriptionCoverImage1);
            $store->images()->attach($imageStore);
        }

        if($request->hasFile('coverImage2'))
        {
            $imageStore = $this->storeImage($request->file('coverImage2'), 2, 800, 250, 
            $request->tittleCoverImage2, $request->descriptionCoverImage2);
            $store->images()->attach($imageStore);
        }

        if($request->hasFile('coverImage3'))
        {
            $imageStore = $this->storeImage($request->file('coverImage3'), 3, 800, 250, 
            $request->tittleCoverImage3, $request->descriptionCoverImage3);
            $store->images()->attach($imageStore);
        }

        return redirect()->route('store.stored', $store);
    }

     /**
     * Store a newly Image from category.
     *
     * @param  $file
     * @return $imageCategory
     */
    public function storeImage($file, $position, $width, $height, $tittle = null, $description = null)
    {
        $url = time().$file->getClientOriginalName();
        $file->move(public_path().'/images/', $url);      
        
        $imageStore = new Image();
        $imageStore->url = $url;
        $imageStore->position = $position;
        $imageStore->tittle = $tittle;
        $imageStore->description = $description;
        $imageStore->save();

        $this->resizeImage($url, $width, $height);
        
        return $imageStore;
    }
    
    /**
     * Store a newly Image from category.
     *
     * @param  $url
     */
    private function resizeImage($url, $width, $height)
    {
        $imageResize = ImageResize::make(public_path() . '/images/' . $url)->fit($width, $height);
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
        return view('stores.show')->with('store', $store);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        return view('stores.edit', compact('store'));
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
        $store->fill($request->except(['profileImage', 'coverImage1', 'coverImage2', 'coverImage3']));

        if($request->hasFile('profileImage'))
        {
            $image = $store->images->where('position', 0)->first();
            $this->deleteImage($image->url);
            $store->images()->detach($image);
            $image->delete();

            $imageStore = $this->storeImage($request->file('profileImage'), 0, 500, 300);
            $store->images()->attach($imageStore);
        }

        if($request->hasFile('coverImage1'))
        {
            $image = $store->images->where('position', 1)->first();
            $this->deleteImage($image->url);
            $store->images()->detach($image);
            $image->delete();

            $imageStore = $this->storeImage($request->file('coverImage1'), 1, 800, 250, 
            $request->tittleCoverImage1, $request->descriptionCoverImage1);
            $store->images()->attach($imageStore);
        }

        if($request->hasFile('coverImage2'))
        {
            $image = $store->images->where('position', 2)->first();
            $this->deleteImage($image->url);
            $store->images()->detach($image);
            $image->delete();

            $imageStore = $this->storeImage($request->file('coverImage2'), 2, 800, 250, 
            $request->tittleCoverImage2, $request->descriptionCoverImage2);
            $store->images()->attach($imageStore);
        }

        if($request->hasFile('coverImage3'))
        {
            $image = $store->images->where('position', 3)->first();
            $this->deleteImage($image->url);
            $store->images()->detach($image);
            $image->delete();

            $imageStore = $this->storeImage($request->file('coverImage3'), 3, 800, 250, 
            $request->tittleCoverImage3, $request->descriptionCoverImage3);
            $store->images()->attach($imageStore);
        }

        $store->save();

        $this->updateImageInformation($request, $store);

        return redirect()->route('store.updated', $store->fresh());
    }

    private function updateImageInformation(Request $request, Store $store)
    {
        if(\File::exists(public_path() . '/images/' . $store->images->where('position', 1)->first()->url)){

            $image = $store->images->where('position', 1)->first();
            $image->tittle = $request->tittleCoverImage1;
            $image->description = $request->descriptionCoverImage1;
            $image->save();
        }

        if(\File::exists(public_path() . '/images/' . $store->images->where('position', 2)->first()->url)){

            $image = $store->images->where('position', 2)->first();
            $image->tittle = $request->tittleCoverImage2;
            $image->description = $request->descriptionCoverImage2;
            $image->save();
        }

        if(\File::exists(public_path() . '/images/' . $store->images->where('position', 3)->first()->url)){

            $image = $store->images->where('position', 3)->first();
            $image->tittle = $request->tittleCoverImage3;
            $image->description = $request->descriptionCoverImage3;
            $image->save();
        }
    }

     /**
     * Store a newly Image from category.
     *
     * @param  $url
     */
    private function deleteImage($url)
    {
        if(\File::exists(public_path() . '/images/' . $url)){

            \File::delete(public_path() . '/images/' . $url);
        }else
        {
            dd($url);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        foreach($store->images as $image){
            $this->deleteImage($image->url);
        }

        $store->delete();

        return redirect()->route('store.deleted', $store->category);
    }

    /**
     * Send to confirmation view.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function confirmAction(Store $store)
    {
        return view('stores.confirmAction', compact('store'));
    }
}