<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Account;
use App\Models\DebitAccount;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(){
        $currentDate = Carbon::now()->format('d/m/Y');
        $totalcreditAmount = Account::sum('credit');
        $totalDebitAmount = DebitAccount::sum('debit_amount');

        $totalCreditAmountCollection = Account::all()->reverse();
        $totalDeditAmountCollection = DebitAccount::all()->reverse();

        // dd($accountCollection);

        // return $totalcreditAmount;
       
        return view(view: 'accounce.dabit-and-credit')
        ->with('totalCreditAmountCollection', $totalCreditAmountCollection)
        ->with('currentDate', $currentDate)
        ->with('totalcreditAmount', $totalcreditAmount)
        ->with('totalDeditAmountCollection', $totalDeditAmountCollection)
        ->with('totalDebitAmount', $totalDebitAmount);
    }

    //store credit
    public function storeCredit(Request $request){

        $request -> validate([
            'credit' => 'required',
        ]);
        
        $creditArray =  new Account;
        $creditArray->credit_date = $request->credit_date; 
        $creditArray->credit = $request->credit; 

        $creditArray->save();

        return redirect()->back()->with('successCredit', 'Your credit has been recorded successfully');
    }


    //debit store
    public function debitStore(Request $request){

        $request->validate([
            'debit_title'   => 'required',
            'debit_amount'   => 'required',
        ]);
        

        $debitAccount = new DebitAccount;

        $debitAccount->debit_title = $request->debit_title;
        $debitAccount->debit_amount = $request->debit_amount;

        $debitAccount->save();

        return redirect()->back()->with('successDebit', 'Your debit has been recorded successfully');
    }
}
