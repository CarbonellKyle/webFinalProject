@extends('layouts.form')

@section('content')
<div class="container-fluid">
    <div class="pull-right">
        <a class="btn btn-info" href="{{ route('product.index') }}"> Back</a>
    </div>
    <h2 class="mt-4 text-center"><strong>Edit Product</strong></h2><br>

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

    <form method="POST" action="{{route('product.update')}}" class="form w-100">
        @csrf 

        <input type="hidden" name="id" value="{{$product->product_id}}"/>
        <!--begin::Input group-->
		<div class="row fv-row mb-7">
			<!--begin::Col-->
			<div class="col-xl-6">
                <label for="name" class="form-label fw-bolder text-dark fs-6">{{ __('Name') }}</label>
                <input type="text" name="name" value="{{$product->name}}" class="form-control form-control-lg form-control-solid" placeholder="Name">
			</div>
			<!--end::Col-->
			<!--begin::Col-->
			<div class="col-xl-6">
                <label for="description" class="form-label fw-bolder text-dark fs-6">{{ __('Description') }}</label>
                <input type="text" name="description" value="{{$product->description}}" class="form-control form-control-lg form-control-solid" placeholder="Description">
			</div>
		    <!--end::Col-->
		</div>
		<!--end::Input group-->

        <!--begin::Input group-->
		<div class="row fv-row mb-7">
			<!--begin::Col-->
			<div class="col-xl-6">
                <label for="stock_qty" class="form-label fw-bolder text-dark fs-6">{{ __('Stock Quantity') }}</label>
                <input type="number" name="stock_qty" value="{{$product->stock_qty}}" class="form-control form-control-lg form-control-solid" placeholder="Stock Quantity">
			</div>
			<!--end::Col-->
			<!--begin::Col-->
			<div class="col-xl-6">
                <label for="critical_qty" class="form-label fw-bolder text-dark fs-6">{{ __('Critical Quantity') }}</label>
                <input type="number" name="critical_qty" value="{{$product->critical_qty}}" class="form-control form-control-lg form-control-solid" placeholder="Critical Quantity">
			</div>
		    <!--end::Col-->
		</div>
		<!--end::Input group-->

        <!--begin::Input group-->
		<div class="row fv-row mb-7">
			<!--begin::Col-->
			<div class="col-xl-6">
                <label for="price" class="form-label fw-bolder text-dark fs-6">{{ __('Price') }}</label>
                <input type="number" name="price" value="{{$product->price}}" class="form-control form-control-lg form-control-solid" placeholder="Price">
			</div>
			<!--end::Col-->
			<!--begin::Col-->
			<div class="col-xl-6">
                <label for="discounted_price" class="form-label fw-bolder text-dark fs-6">{{ __('Discounted Price') }}</label>
                <input type="number" name="discounted_price" value="{{$product->discounted_price}}" class="form-control form-control-lg form-control-solid" placeholder="Discounted Price">
			</div>
		    <!--end::Col-->
		</div>
		<!--end::Input group-->

        <!--begin::Input group-->
		<div class="row fv-row mb-7">
			<!--begin::Col-->
			<div class="col-xl-6">
                <label for="category_id" class="form-label fw-bolder text-dark fs-6">{{ __('Category') }}</label>
                <select name="category_id" class="select form-control form-control-lg form-control-solid">
                    @foreach ($categories as $category)
                    <option value="{{$category->category_id}}">{{ $category->name }}</option>
                    @endforeach
                </select>
			</div>
			<!--end::Col-->
			<!--begin::Col-->
			<div class="col-xl-6">
                <a class="btn btn-primary" href="{{route('category.add')}}">Add Category</a>
			</div>
		    <!--end::Col-->
		</div>
		<!--end::Input group-->

        <!--begin::Input group-->
		<div class="row fv-row mb-7">
			<!--begin::Col-->
			<div class="col-xl-6">
            <label for="supplier_id" class="form-label fw-bolder text-dark fs-6">{{ __('Supplier') }}</label>
                <select name="supplier_id" class="select form-control form-control-lg form-control-solid">
                    @foreach ($suppliers as $supplier)
                    <option value="{{$supplier->supplier_id}}">{{ $supplier->company_name }}</option>
                    @endforeach
                </select>
			</div>
			<!--end::Col-->
			<!--begin::Col-->
			<div class="col-xl-6">
                <a class="btn btn-primary" href="{{route('supplier.add')}}">Add Supplier</a>
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