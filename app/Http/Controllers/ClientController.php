<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;



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
    public function editSingleData($id)
    {
        $editSingleData = Client::findOrFail($id);
        return view('edit-single-data', ['editSingleData' => $editSingleData]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'client_photo' => 'nullable|mimes:jpg,jpeg,png',
        ]);

        $updateClientInfo = Client::findOrFail($id);

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
        } else {
            $imageName = $updateClientInfo->client_photo;
        }

        $updateClientInfo->name = $request->name;
        $updateClientInfo->phone = $request->phone;
        $updateClientInfo->email = $request->email;
        $updateClientInfo->gender = $request->gender;
        $updateClientInfo->address = $request->address;
        $updateClientInfo->facebook_review = $request->facebook_review;
        $updateClientInfo->google_review = $request->google_review;
        $updateClientInfo->page_number = $request->page_number;
        $updateClientInfo->client_photo = $imageName;
        $updateClientInfo->service = $arrayService;
        $updateClientInfo->status = $request->status;
        $updateClientInfo->facebook_profile_link = $request->facebook_profile_link;
        $updateClientInfo->dob = $request->dob;

        $updateClientInfo->save();

        return redirect()->back()->with('success', 'Your data has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $deleteClientInfo = Client::findOrFail($id);
        $deleteClientInfo->delete();

        // return redirect()->back()->with('success', 'Your data has been deleted successfully.');


        return redirect('/all-clients')->with('success', 'Your client information has been deleted successfully');
    }
}
