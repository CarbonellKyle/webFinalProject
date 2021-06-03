@extends('layouts.adminTemplate')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <h4>Inventory<h4>
    <ul class="navbar-nav ml-4 mt-2 mt-lg-0">
        <li class="nav-item">
            <a class="btn btn-primary mx-1" href="{{route('product.index')}}">Products</a>
        </li>
        <li class="nav-item">
            <a class="btn btn-primary mx-1" href="{{route('category.index')}}">Categories</a>
        </li>
        <li class="nav-item">
            <a class="btn btn-primary mx-1" href="{{route('supplier.index')}}">Suppliers</a>
        </li>  
</nav>
    
<div class="container">
        @yield('sub_content')
</div>


@endsection