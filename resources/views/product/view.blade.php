@extends('layouts.form')

@section('content')
<div class="container-fluid">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
        </div>
        <h2 class="mt-4 text-center"><strong>View Product Details</strong></h2><br>

        <div class="col bg-light-primary px-6 py-8 rounded-2 me-7 mb-7">
		<!--begin::Svg Icon | path: icons/stockholm/Media/Equalizer.svg-->
		<span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					<rect x="0" y="0" width="24" height="24" />
					<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
					<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
					<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
					<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
				</g>
			</svg><!--end::Svg Icon-->
                        <h2 class="text-primary">Product Info</h2><br>
                        <div>
                                <div class="form-group">
                                        <strong class="text-primary">Name:</strong>
                                                {{ $product->name }}
                                </div><br>
                                <div class="form-group">
                                        <strong class="text-primary">Description:</strong>
                                                {{ $product->description }}
                                </div><br>
                                <div class="form-group">
                                        <strong class="text-primary">Stock Quantity:</strong>
                                                {{ $product->stock_qty}}       
                                </div><br>
                                <div class="form-group">
                                        <strong class="text-primary">Critical Quantity:</strong>
                                                {{ $product->critical_qty}}       
                                </div><br>
                                <div class="form-group">
                                        <strong class="text-primary">Price:</strong>
                                                {{ $product->price}}
                                </div><br>
                                <div class="form-group">
                                        <strong class="text-primary">Discounted Price:</strong>
                                                {{ $product->discounted_price}}
                                </div><br>
                                <div class="form-group">
                                        <strong class="text-primary">Category:</strong>
                                                {{ $category->name ?? "Not Categorized" }}
                                </div><br>
                                <div class="form-group">
                                        <strong class="text-primary">Supplier:</strong>
                                                {{ $supplier->company_name ?? "No Supplier" }}
                                </div><br>
                                <div class="form-group">
                                        <strong class="text-primary">Date Created:</strong>
                                        {{ $product->created_at}}
                                </div><br>
                        </div>
		</span>
	</div>
</div>
@endsection