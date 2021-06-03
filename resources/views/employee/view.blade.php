@extends('layouts.employeeTemp')

@section('sub_content')
<br>
<div class="container">
    <div class="pull-right">
        <a class="btn btn-info" href="{{ route('employee.index') }}"> Back</a>
    </div><br>

    <h2>Employee Info</h2><br>
    <div>
        <strong>Firstname:</strong>
                    {{ $employee->first_name }}
        <br>
        <strong>Lastname:</strong>
                    {{ $employee->last_name }}
        <br>
        <strong>Email:</strong>
                {{ $employee->email }}
        <br>
        <strong>Phone Number:</strong>
                {{ $employee->phone_number }}
        <br>
        <strong>Job:</strong>
                {{ $job->title ?? "Not Assigned" }}
        <br>
        <strong>Hired Date:</strong>
                {{ $employee->hired_date }}
        <br>
    </div>
</div>
@endsection