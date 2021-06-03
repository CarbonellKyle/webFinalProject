@extends('layouts.inventory')

@section('sub_content')
<br>
<div class="container">
    <div class="pull-right">
        <a class="btn btn-info" href="{{ route('supplier.index') }}"> Back</a>
    </div><br>

    <h2>Add Supplier</h2><br>

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

    <form method="POST" action="{{route('supplier.addSubmit')}}" class="form">
        @csrf 
        <div class="fv-row mb-7">
            <label for="company_name" class="form-label fw-bolder text-dark fs-6">{{ __('Company Name') }}</label>
            <input type="text" name="company_name" class="form-control form-control-lg form-control-solid" placeholder="Company Name">
        </div>
        <div class="fv-row mb-7">
            <label for="phone_number" class="form-label fw-bolder text-dark fs-6">{{ __('Phone Number') }}</label>
            <input type="number" name="phone_number" class="form-control form-control-lg form-control-solid" placeholder="Phone Number">
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary">
                {{ __('Add') }}
            </button>
        </div>
    </form>
    
</div>
@endsection