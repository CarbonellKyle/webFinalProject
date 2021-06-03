<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
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

    public function index()
    {
        return view('order.index');
    }

    public function addOrder()
    {
        //getting the next Auto Increment Id on transaction_details table
        $statement = DB::select("SHOW TABLE STATUS LIKE 'transaction_details' ");
        $nextTransId = $statement[0]->Auto_increment;

        $orders = DB::table('order_details')->where('advanceTransId', $nextTransId)->get();
        //$purchased = $orders->select

        $products = DB::table('products')->get();
        return view('order.add', compact('products', 'nextTransId', 'orders'));
    }

    public function addOrderSubmit(Request $request)
    {
        $product_name = DB::table('products')->select('name')->where('product_id', $request->product_id)->first();

        $validatedData = $request->validate([
            'advanceTransId' => 'required',
            'product_id' => 'required',
            'order_qty' => 'required',
            'price' => 'required',
            'amount' => 'required'
        ]);

        DB::table('order_details')->insert([
            'advanceTransId' => $request->advanceTransId,
            'product_id' => $request->product_id,
            'order_qty' => $request->order_qty,
            'price' => $request->price,
            'amount' => $request->amount,
            'order_date' => $request->created_at
        ]);
        return back()->with('order_added', $product_name->name );
    }
}
