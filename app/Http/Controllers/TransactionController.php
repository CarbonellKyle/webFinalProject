<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
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

    public function addTransactionSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'payment' => 'required',
            'change' => 'required',
            'amount_paid' => 'required'
        ]);

        DB::table('transaction_details')->insert([
            'user_id' => $request->user_id,
            'payment' => $request->payment,
            'change' => $request->change,
            'amount_paid' =>$request->amount_paid,
            'trans_date' => $request->created_at
        ]);

        $currentTransId = DB::getPdo()->lastInsertId();
        DB::table('order_details')->where('advanceTransId', $currentTransId)->update([
            'trans_id' => $currentTransId
        ]);

        return back()->with('transaction_added', 'Transaction Recorded!');
    }
}
