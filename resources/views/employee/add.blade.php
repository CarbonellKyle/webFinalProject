@extends('layouts.form')

@section('content')
<div class="container-fluid">
    <div class="pull-right">
        <a class="btn btn-info" href="{{ route('employee.index') }}"> Back</a>
    </div>
    <h2 class="mt-4 text-center"><strong>Hire Employee</strong></h2><br>

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

    <form method="POST" action="{{route('employee.addSubmit')}}" class="form w-100">
        @csrf 

        <!--begin::Input group-->
		<div class="row fv-row mb-7">
			<!--begin::Col-->
			<div class="col-xl-6">
                <label for="first_name" class="form-label fw-bolder text-dark fs-6">{{ __('Firstname') }}</label>
                <input type="text" name="first_name" class="form-control form-control-lg form-control-solid" placeholder="Firstname">
			</div>
			<!--end::Col-->
			<!--begin::Col-->
			<div class="col-xl-6">
                <label for="last_name" class="form-label fw-bolder text-dark fs-6">{{ __('Lastname') }}</label>
                <input type="text" name="last_name" class="form-control form-control-lg form-control-solid" placeholder="Lastname">
			</div>
		    <!--end::Col-->
		</div>
		<!--end::Input group-->

        <!--begin::Input group-->
		<div class="row fv-row mb-7">
			<!--begin::Col-->
			<div class="col-xl-6">
                <label for="email" class="form-label fw-bolder text-dark fs-6">{{ __('Email') }}</label>
                <input type="email" name="email" class="form-control form-control-lg form-control-solid" placeholder="Email">
			</div>
			<!--end::Col-->
			<!--begin::Col-->
			<div class="col-xl-6">
                <label for="phone_number" class="form-label fw-bolder text-dark fs-6">{{ __('Phone Number') }}</label>
                <input type="number" name="phone_number" class="form-control form-control-lg form-control-solid" placeholder="Phone Number">
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

        <div class="fv-row mb-7">
            <label for="hired_date" class="form-label fw-bolder text-dark fs-6">{{ __('Date Hired') }}</label>
            <input type="date" name="hired_date" class="form-control form-control-lg form-control-solid">
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-primary w-100 text-center">
                {{ __('Add') }}
            </button>
        </div>
    </form>

    
</div>
@endsection