@extends('layouts.form')

@section('content')
<div class="container-fluid">
    <div class="pull-right">
        <a class="btn btn-info" href="{{ route('job.index') }}"> Back</a>
    </div>
    <h2 class="mt-4 text-center"><strong>Add Job</strong></h2><br>

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

    @if(Session::has('job_added'))
        <div class="alert alert-success" role="alert">
            {{Session::get('job_added')}}
        </div>
    @endif

    @error('job')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror

    <form method="POST" action="{{route('job.addSubmit')}}" class="form w-100">
        @csrf 

        <!--begin::Input group-->
		<div class="row fv-row mb-7">
			<!--begin::Col-->
			<div class="col-xl-6">
                <label for="title" class="form-label fw-bolder text-dark fs-6">{{ __('Tilte') }}</label>
                <input type="text" name="title" class="form-control form-control-lg form-control-solid" placeholder="Title">
			</div>
			<!--end::Col-->
			<!--begin::Col-->
			<div class="col-xl-6">
                <label for="salary" class="form-label fw-bolder text-dark fs-6">{{ __('Salary') }}</label>
                <input type="number" name="salary" class="form-control form-control-lg form-control-solid" placeholder="Salary">
			</div>
		    <!--end::Col-->
		</div>
		<!--end::Input group-->
        
        <div class="text-center">
            <button type="submit" class="btn btn-primary w-100 text-center">
                {{ __('Add') }}
            </button>
        </div>
    </form>
    
</div>
@endsection