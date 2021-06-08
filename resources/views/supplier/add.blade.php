@extends('layouts.form')

@section('content')
<div class="container-fluid">
    <div class="pull-right">
        <a class="btn btn-info" href="{{ route('supplier.index') }}"> Back</a>
    </div>
    <h2 class="mt-4 text-center"><strong>Add Supplier</strong></h2><br>

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

    @if(Session::has('supplier_added'))
        <div class="alert alert-success" role="alert">
            {{Session::get('supplier_added')}}
        </div>
    @endif

    @error('supplier')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror

    <form method="POST" action="{{route('supplier.addSubmit')}}" class="form w-100">
        @csrf 

        <!--begin::Input group-->
		<div class="row fv-row mb-7">
			<!--begin::Col-->
			<div class="col-xl-6">
                <label for="company_name" class="form-label fw-bolder text-dark fs-6">{{ __('Company Name') }}</label>
                <input type="text" name="company_name" class="form-control form-control-lg form-control-solid" placeholder="Company Name">
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
        
        <div class="text-center">
            <button type="submit" class="btn btn-primary w-100 text-center">
                {{ __('Add') }}
            </button>
        </div>
    </form>
    
</div>
@endsection