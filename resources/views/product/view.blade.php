@extends('layouts.inventory')

@section('sub_content')
<br>
<div class="container">
    <div class="pull-right">
        <a class="btn btn-info" href="{{ route('product.index') }}"> Back</a>
    </div><br>

    <h2>Product Info</h2><br>
    <div>
        <strong>Name:</strong>
                    {{ $product->name }}
        <br>
        <strong>Description:</strong>
                {{ $product->description }}
        <br>
        <strong>Stock Quantity:</strong>
                {{ $product->stock_qty}}
        <br>
        <strong>Critical Quantity:</strong>
                {{ $product->critical_qty}}
        <br>
        <strong>Price:</strong>
                {{ $product->price}}
        <br>
        <strong>Discounted Price:</strong>
                {{ $product->discounted_price}}
        <br>
        <strong>Category:</strong>
                {{ $category->name ?? "Not Categorized" }}
        <br>
        <strong>Supplier:</strong>
                {{ $supplier->company_name ?? "No Supplier" }}
        <br>
        <strong>Date Created:</strong>
                {{ $product->created_at}}
        <br>
    </div>
</div>
@endsection