<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;

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
            'amount_paid' => 'required'
        ]);

        DB::table('transaction_details')->insert([
            'user_id' => $request->user_id,
            'payment' => $request->payment,
            'change' => $request->amount_paid - $request->payment,
            'amount_paid' =>$request->amount_paid,
            'trans_date' => $request->created_at
        ]);

        $currentTransId = DB::getPdo()->lastInsertId();
        DB::table('order_details')->where('advanceTransId', $currentTransId)->update([
            'trans_id' => $currentTransId
        ]);

        return back()->with('transaction_added', 'Transaction Recorded!');
    }

    public function viewDaily()
    {
        $user_id = Auth::id();
        $transactions = DB::table('transaction_details')->where('user_id', $user_id)->whereDate('trans_date', today())->get();
        $numRows = count($transactions);
        return view('transaction.daily', compact('transactions', 'numRows'));
    }

    public function viewWeekly()
    {
        $user_id = Auth::id();
        $transactions = DB::table('transaction_details')->where('user_id', $user_id)
            ->whereYear('trans_date', now()->year)
            ->whereMonth('trans_date', now()->month)
            ->get();
        $numRows = count($transactions);
        return view('transaction.weekly', compact('transactions', 'numRows'));
    }
}
