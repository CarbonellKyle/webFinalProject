@extends('layouts.form')

@section('content')
<div class="container-fluid">
    <div class="pull-right">
        <a class="btn btn-info" href="{{ route('employee.index') }}"> Back</a>
    </div>
    <h2 class="mt-4 text-center"><strong>Edit Employee Records</strong></h2><br>

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
        <div class="alert alert-info" role="alert">
            {{Session::get('employee_updated')}}
        </div>
    @endif

    @error('employee')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror

    <form method="POST" action="{{route('employee.update')}}" class="form w-100">
        @csrf 
        <input type="hidden" name="id" value="{{$employee->employee_id}}"/>

        <!--begin::Input group-->
		<div class="row fv-row mb-7">
			<!--begin::Col-->
			<div class="col-xl-6">
                <label for="first_name" class="form-label fw-bolder text-dark fs-6">{{ __('Firstname') }}</label>
                <input type="text" name="first_name" value="{{$employee->first_name}}" class="form-control form-control-lg form-control-solid" placeholder="Firstname">
			</div>
			<!--end::Col-->
			<!--begin::Col-->
			<div class="col-xl-6">
                <label for="last_name" class="form-label fw-bolder text-dark fs-6">{{ __('Lastname') }}</label>
                <input type="text" name="last_name" value="{{$employee->last_name}}" class="form-control form-control-lg form-control-solid" placeholder="Lastname">
			</div>
		    <!--end::Col-->
		</div>
		<!--end::Input group-->

        <!--begin::Input group-->
		<div class="row fv-row mb-7">
			<!--begin::Col-->
			<div class="col-xl-6">
                <label for="email" class="form-label fw-bolder text-dark fs-6">{{ __('Email') }}</label>
                <input type="email" name="email" value="{{$employee->email}}" class="form-control form-control-lg form-control-solid" placeholder="Email">
			</div>
			<!--end::Col-->
			<!--begin::Col-->
			<div class="col-xl-6">
                <label for="phone_number" class="form-label fw-bolder text-dark fs-6">{{ __('Phone Number') }}</label>
                <input type="number" name="phone_number" value="{{$employee->phone_number}}" class="form-control form-control-lg form-control-solid" placeholder="Phone Number">
			</div>
		    <!--end::Col-->
		</div>
		<!--end::Input group-->

        <!--begin::Input group-->
		<div class="row fv-row mb-7">
			<!--begin::Col-->
			<div class="col-xl-6">
            <label for="job_id" class="form-label fw-bolder text-dark fs-6">{{ __('Job') }}</label>
                <select name="job_id" class="select form-control form-control-lg form-control-solid">
                    @foreach ($jobs as $job)
                    <option value="{{$job->job_id}}">{{ $job->title }}</option>
                    @endforeach
                </select>
			</div>
			<!--end::Col-->
			<!--begin::Col-->
			<div class="col-xl-6">
                <a class="btn btn-primary" href="{{route('job.add')}}">Add Jobs</a>
			</div>
		    <!--end::Col-->
		</div>
		<!--end::Input group-->
        
        <div class="text-center">
            <button type="submit" class="btn btn-primary w-100 text-center">
                {{ __('Update') }}
            </button>
        </div>
    </form>

    
</div>
@endsection