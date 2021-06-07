@extends('layouts.employeeTemp')

@section('sub_content')
<br>
<div class="container">
    <h3>Employee List</h3>
    <br>

    <div>
        <a class="btn btn-primary" href="{{route('employee.add')}}">Hire Employee</a>
    </div><br>

    @if(Session::has('fire_employee'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('fire_employee')}}
        </div>
    @endif

    @if($numRows==0)

        <div class="alert alert-danger" role="alert">
                {{'No Employees Yet, Go Hire Some!'}}
        </div>
            
        @else
        <!-- Contents -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Job</th>
                    <th>Hired Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 0 ?>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{$employee->first_name . ' ' . $employee->last_name}}</td>
                    <td>{{$jobs[$i]}}</td>
                    <td>{{$employee->hired_date}}</td>
                    <td>
                        <a class="btn btn-info" href="/employee/view/{{$employee->employee_id}}">See More</a>
                        <a class="btn btn-warning" href="/employee/edit/{{$employee->employee_id}}">Edit</a> 
                        <a class="btn btn-danger" href="/employee/delete/{{$employee->employee_id}}">Fire</a>
                    </td>
                </tr>
                <?php $i++ ?>
            @endforeach
            </tbody>
        </table>

    @endif

</div>
@endsection