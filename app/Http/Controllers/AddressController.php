<?php

namespace App\Http\Controllers;

use App\Address;
use App\City;
use App\Http\Requests\StoreAddressRequest;
use App\Store;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'edit']);
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
        return view('addresses.create', compact('cities'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Store  $store
     */
    public function createFromStore(Store $store)
    {
        $cities = City::orderBy('name', 'asc')->get();
        return view('addresses.create')->with(['store' => $store, 'cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFromStore(StoreAddressRequest $request, Store $store)
    {
        $address = new Address();
        $address->address_address = $request->address_address;
        $address->address_latitude = (double)$request->address_latitude;
        $address->address_longitude = (double)$request->address_longitude;
        $address->reference = $request->reference;
        $address->schedule = $request->schedule;
        $address->slug = 'address'.time();

        $address->city_id = City::where('slug', $request->input('cities'))->first()->id;
        $store->addresses()->save($address);
        
        return redirect()->route('addresses.stored', $store);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        print('hola');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        $cities = City::orderBy('name', 'asc')->get();
        $selectedCity = City::find($address->city_id);
        return view('addresses.edit')->with(['address' => $address, 'cities' => $cities, 'selectedCity' => $selectedCity]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $address->fill($request->all());
        $address->city_id = City::where('slug', $request->input('cities'))->first()->id;
        $address->save();

        return redirect()->route('addresses.updated', $address->store);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $address->delete();

        return redirect()->route('addresses.deleted', $address->store);
    }    

    /**
     * Send to confirmation view.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function confirmAction(Address $address)
    {
        return view('addresses.confirmAction', compact('address'));
    }
}