<?php

namespace App\Http\Controllers;

use App\City;
use App\Events\ImageSaved;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Image;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::paginate(10);
        return view('cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCityRequest $request)
    {
        $city       = new City();
        $city->name = $request->name;
        $city->slug = 'city'.time();

        $city->save();

        if($request->hasFile('coverImage1'))
        {
            $imageStore = $this->storeImage($request->file('coverImage1'), 1, 540, 460,
            $request->tittleCoverImage1, $request->descriptionCoverImage1);
            $city->images()->attach($imageStore);
        }

        if($request->hasFile('coverImage2'))
        {
            $imageStore = $this->storeImage($request->file('coverImage2'), 2, 540, 460,
            $request->tittleCoverImage2, $request->descriptionCoverImage2);
            $city->images()->attach($imageStore);
        }

        if($request->hasFile('coverImage3'))
        {
            $imageStore = $this->storeImage($request->file('coverImage3'), 3, 540, 460,
            $request->tittleCoverImage3, $request->descriptionCoverImage3);
            $city->images()->attach($imageStore);
        }

        if($request->hasFile('coverImage4'))
        {
            $imageStore = $this->storeImage($request->file('coverImage4'), 4, 540, 460,
            $request->tittleCoverImage4, $request->descriptionCoverImage4);
            $city->images()->attach($imageStore);
        }

        if($request->hasFile('coverImage5'))
        {
            $imageStore = $this->storeImage($request->file('coverImage5'), 5, 540, 460,
            $request->tittleCoverImage5, $request->descriptionCoverImage5);
            $city->images()->attach($imageStore);
        }

        if($request->hasFile('coverImage6'))
        {
            $imageStore = $this->storeImage($request->file('coverImage6'), 6, 540, 460,
            $request->tittleCoverImage6, $request->descriptionCoverImage6);
            $city->images()->attach($imageStore);
        }

        if($request->hasFile('coverImage7'))
        {
            $imageStore = $this->storeImage($request->file('coverImage7'), 7, 540, 460,
            $request->tittleCoverImage7, $request->descriptionCoverImage7);
            $city->images()->attach($imageStore);
        }

        if($request->hasFile('coverImage8'))
        {
            $imageStore = $this->storeImage($request->file('coverImage8'), 8, 540, 460,
            $request->tittleCoverImage8, $request->descriptionCoverImage8);
            $city->images()->attach($imageStore);
        }

        return redirect()->route('cites.stored', $city);
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
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        dd($city);
        //return view('cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        $city->fill($request->all());

        if($request->hasFile('coverImage1'))
        {
            $image = $city->images->where('position', 1)->first();

            if($image != null)
            {
                Storage::delete($image->url);
                $city->images()->detach($image);
                $image->delete();
            }

            $imageStore = $this->storeImage($request->file('coverImage1'), 1, 540, 460,
            $request->tittleCoverImage1, $request->descriptionCoverImage1);
            $city->images()->attach($imageStore);
        }

        if($request->hasFile('coverImage2'))
        {
            $image = $city->images->where('position', 2)->first();

            if($image != null)
            {
                Storage::delete($image->url);
                $city->images()->detach($image);
                $image->delete();
            }

            $imageStore = $this->storeImage($request->file('coverImage2'), 2, 540, 460,
            $request->tittleCoverImage2, $request->descriptionCoverImage2);
            $city->images()->attach($imageStore);
        }

        if($request->hasFile('coverImage3'))
        {
            $image = $city->images->where('position', 3)->first();

            if($image != null)
            {
                Storage::delete($image->url);
                $city->images()->detach($image);
                $image->delete();
            }

            $imageStore = $this->storeImage($request->file('coverImage3'), 3, 540, 460,
            $request->tittleCoverImage3, $request->descriptionCoverImage3);
            $city->images()->attach($imageStore);
        }

        if($request->hasFile('coverImage4'))
        {
            $image = $city->images->where('position', 4)->first();

            if($image != null)
            {
                Storage::delete($image->url);
                $city->images()->detach($image);
                $image->delete();
            }

            $imageStore = $this->storeImage($request->file('coverImage4'), 4, 540, 460,
            $request->tittleCoverImage4, $request->descriptionCoverImage4);
            $city->images()->attach($imageStore);
        }

        if($request->hasFile('coverImage5'))
        {
            $image = $city->images->where('position', 5)->first();

            if($image != null)
            {
                Storage::delete($image->url);
                $city->images()->detach($image);
                $image->delete();
            }

            $imageStore = $this->storeImage($request->file('coverImage5'), 5, 540, 460,
            $request->tittleCoverImage5, $request->descriptionCoverImage5);
            $city->images()->attach($imageStore);
        }

        if($request->hasFile('coverImage6'))
        {
            $image = $city->images->where('position', 6)->first();

            if($image != null)
            {
                Storage::delete($image->url);
                $city->images()->detach($image);
                $image->delete();
            }

            $imageStore = $this->storeImage($request->file('coverImage6'), 6, 540, 460,
            $request->tittleCoverImage6, $request->descriptionCoverImage4);
            $city->images()->attach($imageStore);
        }

        if($request->hasFile('coverImage7'))
        {
            $image = $city->images->where('position', 7)->first();

            if($image != null)
            {
                Storage::delete($image->url);
                $city->images()->detach($image);
                $image->delete();
            }

            $imageStore = $this->storeImage($request->file('coverImage7'), 7, 540, 460,
            $request->tittleCoverImage7, $request->descriptionCoverImage7);
            $city->images()->attach($imageStore);
        }

        if($request->hasFile('coverImage8'))
        {
            $image = $city->images->where('position', 8)->first();

            if($image != null)
            {
                Storage::delete($image->url);
                $city->images()->detach($image);
                $image->delete();
            }

            $imageStore = $this->storeImage($request->file('coverImage8'), 8, 540, 460,
            $request->tittleCoverImage8, $request->descriptionCoverImage8);
            $city->images()->attach($imageStore);
        }

        $city->save();

        $this->updateImageInformation($request, $city);

        return redirect()->route('cities.updated', $city);
    }

    private function updateImageInformation(Request $request, City $city)
    {
        if(isset($city->images->where('position', 2)->first()->url)){
            if(Storage::exists($city->images->where('position', 1)->first()->url)) {

                $image = $city->images->where('position', 1)->first();
                $image->tittle = $request->tittleCoverImage1;
                $image->description = $request->descriptionCoverImage1;
                $image->save();
            }
        }

        if(isset($city->images->where('position', 2)->first()->url)){
            if(Storage::exists($city->images->where('position', 2)->first()->url)) {

                $image = $city->images->where('position', 2)->first();
                $image->tittle = $request->tittleCoverImage2;
                $image->description = $request->descriptionCoverImage2;
                $image->save();
            }
        }

        if(isset($city->images->where('position', 3)->first()->url)){
            if(Storage::exists($city->images->where('position', 3)->first()->url)) {

                $image = $city->images->where('position', 3)->first();
                $image->tittle = $request->tittleCoverImage3;
                $image->description = $request->descriptionCoverImage3;
                $image->save();
            }
        }

        if(isset($city->images->where('position', 4)->first()->url)){
            if(Storage::exists($city->images->where('position', 4)->first()->url)){

                $image = $city->images->where('position', 4)->first();
                $image->tittle = $request->tittleCoverImage4;
                $image->description = $request->descriptionCoverImage4;
                $image->save();
            }
        }

        if(isset($city->images->where('position', 5)->first()->url)){
            if(Storage::exists($city->images->where('position', 5)->first()->url)){

                $image = $city->images->where('position', 5)->first();
                $image->tittle = $request->tittleCoverImage5;
                $image->description = $request->descriptionCoverImage5;
                $image->save();
            }
        }

        if(isset($city->images->where('position', 6)->first()->url)){
            if(Storage::exists($city->images->where('position', 6)->first()->url)){

                $image = $city->images->where('position', 6)->first();
                $image->tittle = $request->tittleCoverImage6;
                $image->description = $request->descriptionCoverImage6;
                $image->save();
            }
        }

        if(isset($city->images->where('position', 7)->first()->url)){
            if(Storage::exists($city->images->where('position', 7)->first()->url)){

                $image = $city->images->where('position', 7)->first();
                $image->tittle = $request->tittleCoverImage7;
                $image->description = $request->descriptionCoverImage7;
                $image->save();
            }
        }

        if(isset($city->images->where('position', 8)->first()->url)){
            if(Storage::exists($city->images->where('position', 8)->first()->url)){

                $image = $city->images->where('position', 8)->first();
                $image->tittle = $request->tittleCoverImage8;
                $image->description = $request->descriptionCoverImage8;
                $image->save();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route('cities.deleted');
    }

    /**
     * Send to confirmation view.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function confirmAction(City $city)
    {
        return view('cities.confirmAction', compact('city'));
    }
}
