<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:administrator|superadministrator');
    }

    public function allProducts()
    {
        $products = DB::table('products')->get();
        $numRows = count($products);
        return view('product.index', compact('products', 'numRows'));
    }

    public function addProduct()
    {
        $categories = DB::table('category')->get();
        $suppliers = DB::table('suppliers')->get();
        return view('product.add', compact('categories', 'suppliers'));
    }

    public function addProductSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'stock_qty' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'supplier_id' => 'required'
        ]);

        DB::table('products')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'stock_qty' => $request->stock_qty,
            'critical_qty' =>$request->critical_qty,
            'price' => $request->price,
            'discounted_price' => $request->discounted_price,
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
            'created_at' => $request->created_at
        ]);
        return back()->with('product_added', 'Product has been added successfully!');
    }

    public function getProductById($id)
    {
        $product = DB::table('products')->where('product_id', $id)->first();
        $category = DB::table('category')->select('name')->where('category_id', $product->category_id)->first();
        $supplier = DB::table('suppliers')->select('company_name')->where('supplier_id', $product->supplier_id)->first();
        return view('product.view', compact('product', 'category', 'supplier'));
    }

    public function deleteProduct($id)
    {
        DB::table('products')->where('product_id', $id)->delete();
        return back()->with('remove_product', 'Product has been removed!');
    }

    public function editProduct($id)
    {
        $categories = DB::table('category')->get();
        $suppliers = DB::table('suppliers')->get();
        $product = DB::table('products')->where('product_id', $id)->first();
        return view('product.edit', compact('product', 'categories', 'suppliers'));
    }

    public function updateProduct(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'stock_qty' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'supplier_id' => 'required'
        ]);

        DB::table('products')->where('product_id', $request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'stock_qty' => $request->stock_qty,
            'critical_qty' =>$request->critical_qty,
            'price' => $request->price,
            'discounted_price' => $request->discounted_price,
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
        ]);
        return back()->with('product_updated', 'Product has been updated successfully!');
    }
}
