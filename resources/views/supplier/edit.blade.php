@extends('layouts.inventory')

@section('sub_content')
<br>
<div class="container">
    <div class="pull-right">
        <a class="btn btn-info" href="{{ route('supplier.index') }}"> Back</a>
    </div><br>

    <h2>Edit Supplier</h2><br>

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

    @if(Session::has('supplier_updated'))
        <div class="alert alert-info" role="alert">
            {{Session::get('supplier_updated')}}
        </div>
    @endif

    @error('supplier')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror

    <form method="POST" action="{{route('supplier.update')}}" class="form">
        @csrf 
        <input type="hidden" name="id" value="{{$supplier->supplier_id}}"/>
        <div class="fv-row mb-7">
            <label for="company_name" class="form-label fw-bolder text-dark fs-6">{{ __('Company Name') }}</label>
            <input type="text" name="company_name" class="form-control form-control-lg form-control-solid" value="{{$supplier->company_name}}" placeholder="Company Name">
        </div>
        <div class="fv-row mb-7">
            <label for="phone_number" class="form-label fw-bolder text-dark fs-6">{{ __('Phone Number') }}</label>
            <input type="number" name="phone_number" class="form-control form-control-lg form-control-solid" value="{{$supplier->phone_number}}" placeholder="Phone Number">
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary">
                {{ __('Update') }}
            </button>
        </div>
    </form>
    
</div>
@endsection