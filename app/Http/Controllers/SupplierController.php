<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
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

    public function viewSuppliers()
    {
        $suppliers = DB::table('suppliers')->get();
        $numRows = count($suppliers);
        return view('supplier.index', compact('suppliers', 'numRows'));
    }

    public function addSupplier()
    {
        return view('supplier.add');
    }

    public function addSupplierSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'company_name' => 'required',
        ]);

        DB::table('suppliers')->insert([
            'company_name' => $request->company_name,
            'phone_number' => $request->phone_number
        ]);
        return back()->with('supplier_added', 'You have a new Supplier!');
    }

    public function deleteSupplier($id)
    {
        DB::table('suppliers')->where('supplier_id', $id)->delete();
        return back()->with('forget_supplier', 'Supplier has been deleted!');
    }

    public function editSupplier($id)
    {
        $supplier = DB::table('suppliers')->where('supplier_id', $id)->first();
        return view('supplier.edit', compact('supplier'));
    }

    public function updateSupplier(Request $request)
    {
        $validatedData = $request->validate([
            'company_name' => 'required'
        ]);

        DB::table('suppliers')->where('supplier_id', $request->id)->update([
            'company_name' => $request->company_name,
            'phone_number' => $request->phone_number
        ]);
        return back()->with('supplier_updated', 'Supplier has been updated successfully!');
    }
}
