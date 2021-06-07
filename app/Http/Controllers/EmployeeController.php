<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
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

    public function allEmployees()
    {
        $employees = DB::table('employees')->get();
        $numRows = count($employees);
        $jobs = DB::table('jobs')->pluck('title');
        return view('employee.index', compact('employees', 'numRows', 'jobs'));
    }

    public function addEmployee()
    {
        $jobs = DB::table('jobs')->get();
        return view('employee.add', compact('jobs'));
    }

    public function addEmployeeSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'job_id' => 'required',
            'hired_date' => 'required'
        ]);

        DB::table('employees')->insert([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'job_id' =>$request->job_id,
            'hired_date' => $request->hired_date
        ]);
        return back()->with('hire_employee', 'You hired a New Employee!');
    }

    public function getEmployeeById($id)
    {
        $employee = DB::table('employees')->where('employee_id', $id)->first();
        $job = DB::table('jobs')->select('title')->where('job_id', $employee->job_id)->first();
        return view('employee.view', compact('employee', 'job'));
    }

    public function deleteEmployee($id)
    {
        DB::table('employees')->where('employee_id', $id)->delete();
        return back()->with('fire_employee', 'Employee has been Fired!');
    }

    public function editEmployee($id)
    {
        $jobs = DB::table('jobs')->get();
        $employee = DB::table('employees')->where('employee_id', $id)->first();
        return view('employee.edit', compact('employee', 'jobs'));
    }

    public function updateEmployee(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'job_id' => 'required',
        ]);

        DB::table('employees')->where('employee_id', $request->id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'job_id' =>$request->job_id,
        ]);
        return back()->with('employee_updated', 'Employee has been updated successfully!');
    }
}
