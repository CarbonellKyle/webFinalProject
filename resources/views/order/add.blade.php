@extends('layouts.pos')

@section('sub_content')
<br>
<div class="container">
    <div class="pull-right">
        <a class="btn btn-info" href="{{route('order.index')}}"> Back</a>
    </div><br>

    <h2>Orders</h2><br>

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

    @if(Session::has('order_added'))
        <div class="alert alert-success" role="alert">
            {{Session::get('order_added')}}
        </div>
    @endif

    @error('order')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror

    <form method="POST" action="{{route('order.addSubmit')}}" class="form">
        @csrf 
        <input type="hidden" name="advanceTransId" value="{{$nextTransId}}"/>
        <div class="fv-row mb-7">
            <label for="user" class="form-label fw-bolder text-dark fs-6">{{ __('Cashier Name') }}</label>
            <h5> {{ Auth::user()->name }} </h5>
        </div>
        <div class="fv-row mb-7">
            <label for="product_id" class="form-label fw-bolder text-dark fs-6">{{ __('Product') }}</label>
            <select name="product_id" class="select">
                @foreach ($products as $product)
                <option value="{{$product->product_id}}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="fv-row mb-7">
            <label for="price" class="form-label fw-bolder text-dark fs-6">{{ __('Price') }}</label>
            <input type="number" name="price" class="form-control form-control-lg form-control-solid" placeholder="Price">
        </div>
        <div class="fv-row mb-7">
            <label for="order_qty" class="form-label fw-bolder text-dark fs-6">{{ __('Order Quantity') }}</label>
            <input type="number" name="order_qty" class="form-control form-control-lg form-control-solid" placeholder="Order Quantity">
        </div>
        <div class="fv-row mb-7">
            <label for="amount" class="form-label fw-bolder text-dark fs-6">{{ __('Amount') }}</label>
            <input type="number" name="amount" class="form-control form-control-lg form-control-solid" placeholder="Amount">
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary">
                {{ __('Add') }}
            </button>
        </div>
    </form>

    <!-- Transaction Part -->
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

    @if(Session::has('transaction_added'))
        <div class="alert alert-success" role="alert">
            {{Session::get('transaction_added')}}
        </div>
    @endif

    @error('transaction')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror

    <form method="POST" action="{{route('transaction.addSubmit')}}" class="form">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
        <div class="fv-row mb-7">
            <label for="payment" class="form-label fw-bolder text-dark fs-6">{{ __('Payment') }}</label>
            <input type="number" name="payment" class="form-control form-control-lg form-control-solid" placeholder="Payment">
        </div>
        <div class="fv-row mb-7">
            <label for="amount_paid" class="form-label fw-bolder text-dark fs-6">{{ __('Amount Paid') }}</label>
            <input type="number" name="amount_paid" class="form-control form-control-lg form-control-solid" placeholder="Amount_Paid">
        </div>
        <div class="fv-row mb-7">
            <label for="change" class="form-label fw-bolder text-dark fs-6">{{ __('Change') }}</label>
            <input type="number" name="change" class="form-control form-control-lg form-control-solid" placeholder="Change">
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary">
                {{ __('Add All') }}
            </button>
        </div>
    </form>
    
</div>
@endsection