<?php

namespace App\Http\Controllers;

use App\Events\ImageSaved;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Product;
use App\Store;
use Illuminate\Support\Facades\Storage;
use App\Image;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['createFromStore', 'edit']);
    }

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
     * Display the specified resource.
     *
     * @param  \App\Store  $store
     */
    public function createFromStore(Store $store)
    {
        return view('products.create')->with(['store' => $store]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFromStore(StoreProductRequest $request, Store $store)
    {
        $product              = new Product();
        $product->name        = $request->name;
        $product->description = $request->description;
        $product->price       = $request->price;

        if($request->offered == 'on'){
            $product->offered = true;
        }
        else{
            $product->offered = false;
        }

        $product->slug = 'product'.time();
        $store->products()->save($product);

        if($request->hasFile('image'))
        {

            $imageProduct = $this->storeImage($request->file('image'), 1);

            $product->images()->attach($imageProduct);
        }

        return redirect()->route('products.stored', $store);
    }

      /**
     * Store a newly Image from category.
     *
     * @param  $file
     * @return $imageCategory
     */
    public function storeImage($file, $position)
    {
        $url = $file->store('images');

        $imageCategory = new Image();
        $imageCategory->url = $url;
        $imageCategory->position = $position;
        $imageCategory->save();

        ImageSaved::dispatch($imageCategory, 300);

        return $imageCategory;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
        //dd($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->fill($request->except('image'));

        if($request->offered == 'on'){
            $product->offered = true;
        }
        else{
            $product->offered = false;
        }

        if($request->hasFile('image'))
        {
            $image = $product->images->where('position', 1)->first();
            Storage::delete($image->url);
            $product->images()->detach($image);
            $image->delete();

            $imageProduct = $this->storeImage($request->file('image'), 1);
            $product->images()->attach($imageProduct);
        }

        $product->save();

        return redirect()->route('products.updated', $product->store);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        foreach($product->images as $image){
            Storage::delete($image->url);
        }

        $product->delete();

        return redirect()->route('products.deleted', $product->store);
    }

    /**
     * Send to confirmation view.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function confirmAction(Product $product)
    {
        return view('products.confirmAction', compact('product'));
    }
}
