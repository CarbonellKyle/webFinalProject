@extends('layouts.employeeTemp')

@section('sub_content')
<br>
<div class="container">
    <h3>Job List</h3>
    <br>

    <div>
        <a class="btn btn-primary" href="{{route('job.add')}}">Add Jobs</a>
    </div><br>

    @if(Session::has('delete_job'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('delete_job')}}
        </div>
    @endif

    @if($numRows==0)

        <div class="alert alert-danger" role="alert">
                {{'No Records Yet'}}
        </div>
            
        @else
        <!-- Contents -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Salary</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($jobs as $job)
                <tr>
                    <td>{{$job->title}}</td>
                    <td>{{$job->salary}}</td>
                    <td>
                        <a href="/job/edit/{{$job->job_id}}" class="btn btn-warning">Edit</a>
                        <a href="/job/delete/{{$job->job_id}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @endif

    

</div>



@endsection