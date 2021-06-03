@extends('layouts.inventory')

@section('sub_content')
<br>
<div class="container">
    <div class="pull-right">
        <a class="btn btn-info" href="{{ route('product.index') }}"> Back</a>
    </div><br>

    <h2>Edit Product</h2><br>

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

    @if(Session::has('product_updated'))
        <div class="alert alert-info" role="alert">
            {{Session::get('product_updated')}}
        </div>
    @endif

    @error('product')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror

    <form method="POST" action="{{route('product.update')}}" class="form">
        @csrf
        <input type="hidden" name="id" value="{{$product->product_id}}"/>
        <div class="fv-row mb-7">
            <label for="name" class="form-label fw-bolder text-dark fs-6">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control form-control-lg form-control-solid" value="{{$product->name}}" placeholder="Name">
        </div>
        <div class="fv-row mb-7">
            <label for="description" class="form-label fw-bolder text-dark fs-6">{{ __('Description') }}</label>
            <input type="text" name="description" class="form-control form-control-lg form-control-solid" value="{{$product->description}}" placeholder="Description">
        </div>
        <div class="fv-row mb-7">
            <label for="stock_qty" class="form-label fw-bolder text-dark fs-6">{{ __('Stock Quantity') }}</label>
            <input type="number" name="stock_qty" class="form-control form-control-lg form-control-solid" value="{{$product->stock_qty}}" placeholder="Stock Quantity">
        </div>
        <div class="fv-row mb-7">
            <label for="critical_qty" class="form-label fw-bolder text-dark fs-6">{{ __('Critical Quantity') }}</label>
            <input type="number" name="critical_qty" class="form-control form-control-lg form-control-solid" value="{{$product->critical_qty}}" placeholder="Critical Quantity">
        </div>
        <div class="fv-row mb-7">
            <label for="price" class="form-label fw-bolder text-dark fs-6">{{ __('Price') }}</label>
            <input type="number" name="price" class="form-control form-control-lg form-control-solid" value="{{$product->price}}" placeholder="Price">
        </div>
        <div class="fv-row mb-7">
            <label for="discounted_price" class="form-label fw-bolder text-dark fs-6">{{ __('Discounted Price') }}</label>
            <input type="number" name="discounted_price" class="form-control form-control-lg form-control-solid" value="{{$product->discounted_price}}" placeholder="Discounted Price">
        </div>
        <div class="fv-row mb-7">
            <label for="category_id" class="form-label fw-bolder text-dark fs-6">{{ __('Category') }}</label>
            <select name="category_id" class="select">
                @foreach ($categories as $category)
                <option value="{{$category->category_id}}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="fv-row mb-7">
            <label for="supplier_id" class="form-label fw-bolder text-dark fs-6">{{ __('Supplier') }}</label>
            <select name="supplier_id" class="select">
                @foreach ($suppliers as $supplier)
                <option value="{{$supplier->supplier_id}}">{{ $supplier->company_name }}</option>
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