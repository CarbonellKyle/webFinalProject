@extends('layouts.employeeTemp')

@section('sub_content')
<br>
<div class="container">
    <div class="pull-right">
        <a class="btn btn-info" href="{{ route('employee.index') }}"> Back</a>
    </div><br>

    <h2>Hire Employee</h2><br>

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

    @if(Session::has('hire_employee'))
        <div class="alert alert-success" role="alert">
            {{Session::get('hire_employee')}}
        </div>
    @endif

    @error('employee')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror

    <form method="POST" action="{{route('employee.addSubmit')}}" class="form">
        @csrf 
        <div class="fv-row mb-7">
            <label for="first_name" class="form-label fw-bolder text-dark fs-6">{{ __('Firstname') }}</label>
            <input type="text" name="first_name" class="form-control form-control-lg form-control-solid" placeholder="Firstname">
        </div>
        <div class="fv-row mb-7">
            <label for="last_name" class="form-label fw-bolder text-dark fs-6">{{ __('Lastname') }}</label>
            <input type="text" name="last_name" class="form-control form-control-lg form-control-solid" placeholder="Lastname">
        </div>
        <div class="fv-row mb-7">
            <label for="email" class="form-label fw-bolder text-dark fs-6">{{ __('Email') }}</label>
            <input type="email" name="email" class="form-control form-control-lg form-control-solid" placeholder="Email">
        </div>
        <div class="fv-row mb-7">
            <label for="phone_number" class="form-label fw-bolder text-dark fs-6">{{ __('Phone Number') }}</label>
            <input type="number" name="phone_number" class="form-control form-control-lg form-control-solid" placeholder="Phone Number">
        </div>
        <div class="fv-row mb-7">
            <label for="job_id" class="form-label fw-bolder text-dark fs-6">{{ __('Job') }}</label>
            <select name="job_id" class="select">
                @foreach ($jobs as $job)
                <option value="{{$job->job_id}}">{{ $job->title }}</option>
                @endforeach
            </select>
            <a class="btn btn-primary" href="{{route('job.add')}}">Add Jobs</a>
        </div>
        <div class="fv-row mb-7">
            <label for="hired_date" class="form-label fw-bolder text-dark fs-6">{{ __('Date Hired') }}</label>
            <input type="date" name="hired_date" class="form-control form-control-lg form-control-solid">
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary">
                {{ __('Add') }}
            </button>
        </div>
    </form>

    
</div>
@endsection