<?php

namespace App\Http\Controllers;

use App\Category;
use App\City;
use App\Events\ImageSaved;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Store;
use Illuminate\Support\Facades\Storage;
use App\Image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'createFromCategory', 'edit']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$stores = Store::paginate(15);
        $city = City::where('slug', 'an')->first();

        //$stores = Store::where('city_id', $city->id);

        $stores = Store
            ::join('addresses', 'stores.id', '=', 'addresses.store_id')->where('addresses.city_id', '=', $city->id)
            ->select('stores.*')
            ->get();

        return view('stores.index', compact('stores'));
    }

    public function loadFromCity($citySlug)
    {
        $city = City::where('slug', $citySlug)->first();

        $stores = Store
        ::join('addresses', function($join) use ($city){
            $join->on('stores.id', '=', 'addresses.store_id')

                    ->where('addresses.city_id', '=', $city->id)->distinct('store_id');
        })
        ->select('stores.*')
        ->distinct('stores.id')
        ->paginate(16);

        //dd($stores);
        return view('stores.index', compact('stores', 'city'));
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
    public function storeFromCategory(StoreStoreRequest $request, Category $category)
    {
        $store = new Store();

        $store->name        = $request->name;
        $store->description = $request->description;
        $store->slug        = 'store'.time();

        $store->category_id = $category->id;
        $store->user_id     = auth()->user()->id;

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
        $url = $file->store('images');

        $imageStore              = new Image();
        $imageStore->url         = $url;
        $imageStore->position    = $position;
        $imageStore->tittle      = $tittle;
        $imageStore->description = $description;
        $imageStore->save();

        ImageSaved::dispatch($imageStore, $width);

        return $imageStore;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function showStoreCostumer(User $user)
    {
        $store = Store::where('user_id', $user->id)->first();

        dd($store);
        //return view('stores.show', compact('store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        return view('stores.show', compact('store'));
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
    public function update(UpdateStoreRequest $request, Store $store)
    {
        $store->fill($request->except(['profileImage', 'coverImage1', 'coverImage2', 'coverImage3']));

        if($request->hasFile('profileImage'))
        {
            $image = $store->images->where('position', 0)->first();
            Storage::delete($image->url);
            $store->images()->detach($image);
            $image->delete();

            $imageStore = $this->storeImage($request->file('profileImage'), 0, 500, 300);
            $store->images()->attach($imageStore);
        }

        if($request->hasFile('coverImage1'))
        {
            $image = $store->images->where('position', 1)->first();
            Storage::delete($image->url);
            $store->images()->detach($image);
            $image->delete();

            $imageStore = $this->storeImage($request->file('coverImage1'), 1, 800, 250,
            $request->tittleCoverImage1, $request->descriptionCoverImage1);
            $store->images()->attach($imageStore);
        }

        if($request->hasFile('coverImage2'))
        {
            $image = $store->images->where('position', 2)->first();
            Storage::delete($image->url);
            $store->images()->detach($image);
            $image->delete();

            $imageStore = $this->storeImage($request->file('coverImage2'), 2, 800, 250,
            $request->tittleCoverImage2, $request->descriptionCoverImage2);
            $store->images()->attach($imageStore);
        }

        if($request->hasFile('coverImage3'))
        {
            $image = $store->images->where('position', 3)->first();
            Storage::delete($image->url);
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
        if(Storage::exists($store->images->where('position', 1)->first()->url)){

            $image = $store->images->where('position', 1)->first();
            $image->tittle = $request->tittleCoverImage1;
            $image->description = $request->descriptionCoverImage1;
            $image->save();
        }

        if(isset($store->images->where('position', 2)->first()->url)){
            if(Storage::exists($store->images->where('position', 2)->first()->url)) {

                $image = $store->images->where('position', 2)->first();
                $image->tittle = $request->tittleCoverImage2;
                $image->description = $request->descriptionCoverImage2;
                $image->save();
            }
        }

        if(isset($store->images->where('position', 3)->first()->url)){
            if(Storage::exists($store->images->where('position', 3)->first()->url)) {

                $image = $store->images->where('position', 3)->first();
                $image->tittle = $request->tittleCoverImage3;
                $image->description = $request->descriptionCoverImage3;
                $image->save();
            }
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
            Storage::delete($image->url);
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
