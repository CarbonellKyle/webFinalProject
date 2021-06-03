@extends('layouts.inventory')

@section('sub_content')
<br>
<div class="container">
    <h3>Products</h3>
    <br>

    <div>
        <a class="btn btn-primary" href="{{route('product.add')}}">Add Product</a>
    </div><br>

    @if(Session::has('remove_product'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('remove_product')}}
        </div>
    @endif

    @if($numRows==0)

        <div class="alert alert-danger" role="alert">
                {{'No Records Yet'}}
        </div>
            
        @else
        <!-- Contents -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Stock Quantity</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->stock_qty}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <a class="btn btn-info" href="/product/view/{{$product->product_id}}">See More</a>
                        <a class="btn btn-warning" href="/product/edit/{{$product->product_id}}">Edit</a> 
                        <a class="btn btn-danger" href="/product/delete/{{$product->product_id}}">Remove</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @endif

</div>
@endsection