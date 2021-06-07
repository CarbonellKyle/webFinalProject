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
        $numRows = count($orders);

        $products = DB::table('products')->get();

        $payment = $orders->sum('amount');

        return view('order.add', compact('products', 'nextTransId', 'numRows', 'orders', 'payment'));
    }

    public function addOrderSubmit(Request $request)
    {

        $validatedData = $request->validate([
            'advanceTransId' => 'required',
            'product_id' => 'required',
            'order_qty' => 'required',
            'price' => 'required',
        ]);

        $product_name = DB::table('products')->select('name')->where('product_id', $request->product_id)->first();

        DB::table('order_details')->insert([
            'advanceTransId' => $request->advanceTransId,
            'product_id' => $request->product_id,
            'product_name' => $product_name->name,
            'order_qty' => $request->order_qty,
            'price' => $request->price,
            'amount' => $request->price * $request->order_qty,
            'order_date' => $request->created_at
        ]);

        $purchased = DB::table('products')->where('product_id', $request->product_id)->first();
        $qty = $purchased->stock_qty;
        $current_qty = $qty - $request->order_qty;

        DB::table('products')->where('product_id', $request->product_id)->update([
            'stock_qty' => $current_qty
        ]);

        $statement = DB::select("SHOW TABLE STATUS LIKE 'transaction_details' ");
        $nextTransId = $statement[0]->Auto_increment;

        $orders = DB::table('order_details')->where('advanceTransId', $nextTransId)->get();
        $numRows = count($orders);

        $products = DB::table('products')->get();
        $payment = $orders->sum('amount');

        return view('order.add', compact('products', 'nextTransId', 'numRows', 'orders', 'payment'));
    }
}
