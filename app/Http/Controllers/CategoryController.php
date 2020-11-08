<?php

namespace App\Http\Controllers;

use App\Category;
use App\Events\ImageSaved;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Storage;
use App\Image;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('auth')->only(['create', 'edit']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('images')->paginate();
        return view('categories.index', compact('categories'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();

        $category->name        = $request->name;
        $category->description = $request->description;
        $category->slug        = 'category'.time();

        $category->save();

        if($request->hasFile('image1'))
        {
            $imageCategory = $this->storeImage($request->file('image1'), 1);
            $category->images()->attach($imageCategory);
        }

        if($request->hasFile('image2'))
        {
            $imageCategory = $this->storeImage($request->file('image2'), 2);
            $category->images()->attach($imageCategory);
        }

        return redirect()->route('categories.index')
            ->with('statusSuccess', 'Categoría almacenada correctamente');
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
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->fill($request->except(['image1', 'image2']));

        if($request->hasFile('image1'))
        {
            $image = $category->images->where('position', 1)->first();
            Storage::delete($image->url);
            $category->images()->detach($image);
            $image->delete();

            $imageCategory = $this->storeImage($request->file('image1'), 1);
            $category->images()->attach($imageCategory);
        }

        if($request->hasFile('image2'))
        {
            $image = $category->images->where('position', 2)->first();
            Storage::delete($image->url);
            $category->images()->detach($image);
            $image->delete();

            $imageCategory = $this->storeImage($request->file('image2'), 2);
            $category->images()->attach($imageCategory);
        }

        $category->save();

        return view('categories.show')
            ->with([
                'category' => $category->fresh(),
                'statusSuccess' => 'Edición de categoría realizada correctamente'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        foreach($category->images as $image){
            Storage::delete($image->url);
        }

        $category->delete();

        return redirect()->route('categories.index')
            ->with('statusSuccess', 'Categoría eliminada correctamente');
    }

    /**
     * Send to confirmation view.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function confirmAction(Category $category)
    {
        return view('categories.confirmAction', compact('category'));
    }
}
