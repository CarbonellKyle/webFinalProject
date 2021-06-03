<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
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

    public function viewCategories()
    {
        $categories = DB::table('category')->get();
        $numRows = count($categories);
        return view('category.index', compact('categories', 'numRows'));
    }

    public function addCategory()
    {
        return view('category.add');
    }

    public function addCategorySubmit(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        DB::table('category')->insert([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return back()->with('category_added', 'You have a new Category!');
    }

    public function deleteCategory($id)
    {
        DB::table('category')->where('category_id', $id)->delete();
        return back()->with('delete_category', 'Category has been deleted!');
    }

    public function editCategory($id)
    {
        $category = DB::table('category')->where('category_id', $id)->first();
        return view('category.edit', compact('category'));
    }

    public function updateCategory(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        DB::table('category')->where('category_id', $request->id)->update([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return back()->with('category_updated', 'Category has been updated successfully!');
    }

}
