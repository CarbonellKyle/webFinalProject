@extends('layouts.employeeTemp')

@section('sub_content')
<br>
<div class="container">
    <div class="pull-right">
        <a class="btn btn-info" href="{{ route('employee.index') }}"> Back</a>
    </div><br>

    <h2>Edit Employee</h2><br>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check your input code<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(Session::has('employee_updated'))
        <div class="alert alert-success" role="alert">
            {{Session::get('employee_updated')}}
        </div>
    @endif

    @error('employee')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror

    <form method="POST" action="{{route('employee.update')}}" class="form">
        @csrf 
        <input type="hidden" name="id" value="{{$employee->employee_id}}"/>
        <div class="fv-row mb-7">
            <label for="first_name" class="form-label fw-bolder text-dark fs-6">{{ __('Firstname') }}</label>
            <input type="text" name="first_name" class="form-control form-control-lg form-control-solid" value="{{$employee->first_name}}" placeholder="Firstname">
        </div>
        <div class="fv-row mb-7">
            <label for="last_name" class="form-label fw-bolder text-dark fs-6">{{ __('Lastname') }}</label>
            <input type="text" name="last_name" class="form-control form-control-lg form-control-solid" value="{{$employee->last_name}}" placeholder="Lastname">
        </div>
        <div class="fv-row mb-7">
            <label for="email" class="form-label fw-bolder text-dark fs-6">{{ __('Email') }}</label>
            <input type="email" name="email" class="form-control form-control-lg form-control-solid" value="{{$employee->email}}" placeholder="Email">
        </div>
        <div class="fv-row mb-7">
            <label for="phone_number" class="form-label fw-bolder text-dark fs-6">{{ __('Phone Number') }}</label>
            <input type="number" name="phone_number" class="form-control form-control-lg form-control-solid" value="{{$employee->phone_number}}" placeholder="Phone Number">
        </div>
        <div class="fv-row mb-7">
            <label for="job_id" class="form-label fw-bolder text-dark fs-6">{{ __('Job') }}</label>
            <select name="job_id" class="select">
                @foreach ($jobs as $job)
                <option value="{{$job->job_id}}">{{ $job->title }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary">
                {{ __('Update') }}
            </button>
        </div>
    </form>

    
</div>
@endsection