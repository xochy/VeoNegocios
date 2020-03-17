<?php

namespace App\Http\Controllers;

use App\Product;
use App\Store;
use Intervention\Image\Facades\Image as ImageResize;
use App\Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
    public function storeFromStore(Request $request, Store $store)
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
        $imageResize = ImageResize::make(public_path() . '/images/' . $url)->fit(350, 250);
        $imageResize->save(null, 60, 'jpg');
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
    public function update(Request $request, Product $product)
    {
        $product->fill($request->except('image'));

        if($request->hasFile('image'))
        {
            $image = $product->images->where('position', 1)->first();
            $this->deleteImage($image->url);
            $product->images()->detach($image);
            $image->delete();

            $imageProduct = $this->storeImage($request->file('image'), 1);
            $product->images()->attach($imageProduct);
        }

        $product->save();

        return redirect()->route('products.updated', $product->store);
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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        foreach($product->images as $image){
            $this->deleteImage($image->url);
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