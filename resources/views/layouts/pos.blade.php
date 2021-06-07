@extends('layouts.adminTemplate')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <h4>Point of Sale<h4>
    <ul class="navbar-nav ml-4 mt-2 mt-lg-0">
        <li class="nav-item">
            <a class="btn btn-primary mx-1" href="{{route('order.add')}}">Take Orders</a>
        </li>
        <li class="nav-item">
            <a class="btn btn-primary mx-1" href="{{route('transaction.daily')}}">Daily Transactions</a>
        </li>
        <li class="nav-item">
            <a class="btn btn-primary mx-1" href="{{route('transaction.weekly')}}">Weekly Transactions</a>
        </li>
</nav>
    
<div class="container">
        @yield('sub_content')
</div>


@endsection