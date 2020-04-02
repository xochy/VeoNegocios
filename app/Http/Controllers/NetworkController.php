<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\StoreNetworkRequest;
use App\Http\Requests\UpdateNetworkRequest;
use App\Network;
use App\Store;
use Illuminate\Http\Request;

class NetworkController extends Controller
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
        $contacts = Contact::orderBy('id', 'asc')->get();
        return view('networks.create')->with(['store' => $store, 'contacts' => $contacts]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFromStore(StoreNetworkRequest $request, Store $store)
    {
        $network = new Network();
        $network->description = $request->description;
        $contact = Contact::where('id', $request->input('contacts'))->first();
        
        if($contact->name == 'YouTube'){
            $network->description = str_replace('watch?v=', 'embed/', $request->description);
        }
        else{
            $network->description = $request->description;
        }

        $network->contact_id = $contact->id;
        $store->networks()->save($network);

        return redirect()->route('networks.stored', $store);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Network  $network
     * @return \Illuminate\Http\Response
     */
    public function show(Network $network)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Network  $network
     * @return \Illuminate\Http\Response
     */
    public function edit(Network $network)
    {
        $contacts = Contact::orderBy('id', 'asc')->get();
        $selectedContact = Contact::find($network->contact_id);
        return view('networks.edit')->with(['network' => $network, 'contacts' => $contacts, 'selectedContact' => $selectedContact]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Network  $network
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNetworkRequest $request, Network $network)
    {
        $network->fill($request->all());
        
        $contact = Contact::where('id', $request->input('contacts'))->first();
        
        if($contact->name == 'YouTube'){
            $network->description = str_replace('watch?v=', 'embed/', $request->description);
        }
        else{
            $network->description = $request->description;
        }
        
        $network->contact_id = $contact->id;
        $network->save();

        return redirect()->route('networks.updated', $network->store);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Network  $network
     * @return \Illuminate\Http\Response
     */
    public function destroy(Network $network)
    {
        $network->delete();

        return redirect()->route('networks.deleted', $network->store);
    }

    /**
     * Send to confirmation view.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function confirmAction(Network $network)
    {
        return view('networks.confirmAction', compact('network'));
    }
}