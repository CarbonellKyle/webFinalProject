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

    @error('order')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror

    <div class="d-flex">
        <div>
            <form method="POST" action="{{route('order.addSubmit')}}" class="form" 
                oninput="a.value=parseInt(p.value)*parseInt(q.value)">
                @csrf 
                <input type="hidden" name="advanceTransId" value="{{$nextTransId}}"/>
                <div class="fv-row mb-7">
                    <label for="user" class="form-label fw-bolder text-dark fs-6">{{ __('Cashier Name') }}</label>
                    <h5> {{ Auth::user()->name }} </h5>
                </div>
                <div class="fv-row mb-7">
                    <label for="product_id" class="form-label fw-bolder text-dark fs-6">{{ __('Product') }}</label>
                    <select name="product_id"  class="select" >
                        <?php $price = 0; ?>
                        @foreach ($products as $product)
                        <option value="{{$product->product_id}}"><?php echo $product->name; $price=$product->price ?></option>
                        @endforeach
                    </select>
                </div>
                <div class="fv-row mb-7">
                    <label for="price" class="form-label fw-bolder text-dark fs-6">{{ __('Price') }}</label>
                    <input type="number" name="price" id="p" class="form-control form-control-lg form-control-solid" value="{{$price}}">
                </div>
                <div class="fv-row mb-7">
                    <label for="order_qty" class="form-label fw-bolder text-dark fs-6">{{ __('Order Quantity') }} </label>
                    <input type="number" name="order_qty" id="q" class="form-control form-control-lg form-control-solid" placeholder="Order Quantity">
                </div>
                <div class="fv-row mb-7">
                    <label for="amount" class="form-label fw-bolder text-dark fs-6">{{ __('Amount') }}</label>
                    <output name="amount" id="a" for="p q" value="" class="form-control form-control-lg form-control-solid"></output>
                </div>
                
                <div class="text-center">
                    <button type="submit" class="btn btn-lg btn-primary">
                        {{ __('Add') }}
                    </button>
                </div>
            </form>
        </div>

        <div class="container">
            @if($numRows==0)

                <div class="alert alert-warning" role="alert">
                    {{'Orders will be placed here'}}
                </div>
                
                @else
                <?php $i = 0 ?>
                @foreach ($orders as $order)
                <div class="alert alert-success" role="alert">
                    {{ $order->product_name . ': ' . $order->price . 'pesos ' . ' x ' .  $order->order_qty . ' = ' . $order->amount}}
                </div>
                <?php $i++ ?>
                @endforeach
            @endif
        </div>
    </div>
    

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

    <form method="POST" action="{{route('transaction.addSubmit')}}" class="form"
        oninput="c.value=parseInt(ap.value)-parseInt(pay.value)">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
        <div class="fv-row mb-7">
            <label for="payment" class="form-label fw-bolder text-dark fs-6">{{ __('Payment') }}</label>
            <input type="number" name="payment" id="pay" class="form-control form-control-lg form-control-solid" value="{{$payment}}" readonly>
        </div>
        <div class="fv-row mb-7">
            <label for="amount_paid" class="form-label fw-bolder text-dark fs-6">{{ __('Amount Paid') }}</label>
            <input type="number" name="amount_paid" id="ap" class="form-control form-control-lg form-control-solid" placeholder="Amount_Paid">
        </div>
        <div class="fv-row mb-7">
            <label for="change" class="form-label fw-bolder text-dark fs-6">{{ __('Change') }}</label>
            <output for="pay ap" name="change" id="c" class="form-control form-control-lg form-control-solid" placeholder="Change"><output>
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary">
                {{ __('Add All') }}
            </button>
        </div>
    </form>
    
</div>

@endsection