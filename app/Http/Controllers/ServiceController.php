<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request){

        $request->validate([
            'service_name' => 'required',
            'client_id' => 'required',
            'domain_provider' => 'nullable',
            'domain_registration_date' => 'nullable',
            'hosting_provider' => 'nullable',
            'hosting_registration_date' => 'nullable',
            'hosting_size' => 'nullable',
            'remark' => 'nullable',
        ]);

        $inputService = new Service;

        $inputService-> service_name = $request-> service_name;
        $inputService-> client_id = $request-> client_id;
        $inputService-> domain_provider = $request-> domain_provider;
        $inputService-> domain_registration_date = $request-> domain_registration_date;
        $inputService-> hosting_provider = $request-> hosting_provider;
        $inputService-> hosting_registration_date = $request-> hosting_registration_date;
        $inputService-> hosting_size = $request-> hosting_size;
        $inputService-> remark = $request-> remark;
        $inputService-> save();

        return redirect()->back()->with('success', 'Your service\'s name has been entered successfully');
    }
}
