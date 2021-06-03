<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
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

    public function viewJobs()
    {
        $jobs = DB::table('jobs')->get();
        $numRows = count($jobs);
        return view('job.index', compact('jobs', 'numRows'));
    }

    public function addJob()
    {
        return view('job.add');
    }

    public function addJobSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'salary' => 'required'
        ]);

        DB::table('jobs')->insert([
            'title' => $request->title,
            'salary' => $request->salary
        ]);
        return back()->with('job_added', 'New Job has been Added!');
    }

    public function deleteJob($id)
    {
        DB::table('jobs')->where('job_id', $id)->delete();
        return back()->with('delete_job', 'Job has been deleted!');
    }

    public function editJob($id)
    {
        $job = DB::table('jobs')->where('job_id', $id)->first();
        return view('job.edit', compact('job'));
    }

    public function updateJob(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'salary' => 'required'
        ]);

        DB::table('jobs')->where('job_id', $request->id)->update([
            'title' => $request->title,
            'salary' => $request->salary
        ]);
        return back()->with('job_updated', 'Job has been updated successfully!');
    }
}
