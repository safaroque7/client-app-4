<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(){
        return view(view: 'accounce.credit-account');
    }

    //store credit
    public function storeCredit(Request $request){

        
        $creditArray =  new Account;

        $creditArray->credit_date = $request->credit_date; 
        $creditArray->credit = $request->credit; 

        $creditArray->save();

        return redirect()->back()->with('success', 'Your account has been inserted successfully');
    }
}
