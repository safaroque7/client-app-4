<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Http\Request;



class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('add-new-client');
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
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:clients',
            'email' => 'required|unique:clients',
            'client_photo' => 'nullable|mimes:jpg,jpeg,png',
        ]);


        //for services
        $arrayService = null;
        if(isset($request->service)){
            $arrayService = implode(', ', $request->service);
        };



        //for images
        $imageName = null;
        if(isset($request->client_photo)){
            $imageName = time(). '.' . $request->client_photo->extension();
            $request->client_photo->move(public_path('images'), $imageName);
        }

        $storeClientInfo = new Client;

        $storeClientInfo->name = $request->name;
        $storeClientInfo->phone = $request->phone;
        $storeClientInfo->email = $request->email;
        $storeClientInfo->gender = $request->gender;
        $storeClientInfo->address = $request->address;
        $storeClientInfo->facebook_review = $request->facebook_review;
        $storeClientInfo->google_review = $request->google_review;
        $storeClientInfo->page_number = $request->page_number;
        $storeClientInfo->client_photo = $imageName;
        $storeClientInfo->service = $arrayService;
        $storeClientInfo->status = $request->status;
        $storeClientInfo->facebook_profile_link = $request->facebook_profile_link;
        $storeClientInfo->dob = $request->dob;

        $storeClientInfo->save();

        return redirect()->back()->with('success', 'Your data has been inserted successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function showSingleData($id)
    {
        $singleClientInfo = Client::findOrFail($id);
        return view('single-client-info', [
            'singleClientInfo' => $singleClientInfo,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
