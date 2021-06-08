@extends('layouts.pos')

<div class="container-fluid">

@section('content')
    <div class="pull-right">
        <a class="btn btn-primary" href="{{route('transaction.daily')}}">This Day</a>
        <a class="btn btn-primary" href="{{route('transaction.weekly')}}">This Week</a>
    </div><br>
    <h2 class="mt-4 text-center"><strong>Point of Sale</strong></h2><br>

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

    <form method="POST" action="{{route('order.addSubmit')}}" class="form w-100" 
        oninput="a.value=parseInt(p.value)*parseInt(q.value)">
        @csrf 
        <input type="hidden" name="advanceTransId" value="{{$nextTransId}}"/>

        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1"> {{ __('Cashier Name: ') }} </span>
            <span class="text-muted mt-1 fw-bold fs-7"> {{ Auth::user()->name }} </span>
        </h3><br>

        <!--begin::Input group-->
		<div class="row fv-row mb-7">
			<!--begin::Col-->
			<div class="col-xl-6">
                <label for="product_id" class="form-label fw-bolder text-dark fs-6">{{ __('Product') }}</label>
                <select name="product_id"  class="select form-control form-control-lg form-control-solid">
                    <?php $price = 0; ?>
                    @foreach ($products as $product)
                    <option value="{{$product->product_id}}"><?php echo $product->name; $price=$product->price ?></option>
                    @endforeach
                </select>
			</div>
			<!--end::Col-->
			<!--begin::Col-->
			<div class="col-xl-6">
                <label for="price" class="form-label fw-bolder text-dark fs-6">{{ __('Price') }}</label>
                <input type="number" name="price" id="p" class="form-control form-control-lg form-control-solid" value="{{$price}}">
			</div>
		    <!--end::Col-->
		</div>
		<!--end::Input group-->

        <!--begin::Input group-->
		<div class="row fv-row mb-7">
			<!--begin::Col-->
			<div class="col-xl-6">
                <label for="order_qty" class="form-label fw-bolder text-dark fs-6">{{ __('Order Quantity') }} </label>
                <input type="number" name="order_qty" id="q" class="form-control form-control-lg form-control-solid" placeholder="Order Quantity">
			</div>
			<!--end::Col-->
			<!--begin::Col-->
			<div class="col-xl-6">
                <label for="amount" class="form-label fw-bolder text-dark fs-6">{{ __('Amount') }}</label>
                <output name="amount" id="a" for="p q" value="" class="form-control form-control-lg form-control-solid"></output>
			</div>
		    <!--end::Col-->
		</div>
		<!--end::Input group-->

        <div class="text-center">
            <button type="submit" class="btn btn-primary w-100 text-center">
                {{ __('Add Order') }}
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

    @error('transaction')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror

    <form method="POST" action="{{route('transaction.addSubmit')}}" class="form w-100""
        oninput="c.value=parseInt(ap.value)-parseInt(pay.value)">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>

        <!--begin::Input group-->
		<div class="row fv-row mb-7">
			<!--begin::Col-->
			<div class="col-xl-6">
                <label for="payment" class="form-label fw-bolder text-dark fs-6">{{ __('Payment') }}</label>
                <input type="number" name="payment" id="pay" class="form-control form-control-lg form-control-solid" value="{{$payment}}" readonly>
			</div>
			<!--end::Col-->
			<!--begin::Col-->
			<div class="col-xl-6">
                <label for="amount_paid" class="form-label fw-bolder text-dark fs-6">{{ __('Amount Paid') }}</label>
                <input type="number" name="amount_paid" id="ap" class="form-control form-control-lg form-control-solid" placeholder="Amount_Paid">
			</div>
		    <!--end::Col-->
		</div>
		<!--end::Input group-->

        <div class="fv-row mb-7">
            <label for="change" class="form-label fw-bolder text-dark fs-6">{{ __('Change') }}</label>
            <output for="pay ap" name="change" id="c" class="form-control form-control-lg form-control-solid" placeholder="Change"><output>
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-primary w-100 text-center">
                {{ __('Check Out') }}
            </button>
        </div>
    </form>
@endsection

@section('denomination')

    <div class="pull-right">
        <a style="margin-left: 35px;" class="menu-link active py-3" href="{{route('adminDashboard')}}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotone/Interface/Lock.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd" d="M3.11117 13.2288C3.27137 11.0124 5.01376 9.29156 7.2315 9.15059C8.55778 9.06629 10.1795 9 12 9C13.8205 9 15.4422 9.06629 16.7685 9.15059C18.9862 9.29156 20.7286 11.0124 20.8888 13.2288C20.9535 14.1234 21 15.085 21 16C21 16.915 20.9535 17.8766 20.8888 18.7712C20.7286 20.9876 18.9862 22.7084 16.7685 22.8494C15.4422 22.9337 13.8205 23 12 23C10.1795 23 8.55778 22.9337 7.23151 22.8494C5.01376 22.7084 3.27137 20.9876 3.11118 18.7712C3.04652 17.8766 3 16.915 3 16C3 15.085 3.04652 14.1234 3.11117 13.2288Z" fill="#12131A" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13 16.7324C13.5978 16.3866 14 15.7403 14 15C14 13.8954 13.1046 13 12 13C10.8954 13 10 13.8954 10 15C10 15.7403 10.4022 16.3866 11 16.7324V18C11 18.5523 11.4477 19 12 19C12.5523 19 13 18.5523 13 18V16.7324Z" fill="#12131A" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7 6C7 3.23858 9.23858 1 12 1C14.7614 1 17 3.23858 17 6V10C17 10.5523 16.5523 11 16 11C15.4477 11 15 10.5523 15 10V6C15 4.34315 13.6569 3 12 3C10.3431 3 9 4.34315 9 6V10C9 10.5523 8.55228 11 8 11C7.44772 11 7 10.5523 7 10V6Z" fill="#12131A" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Admin Dashboard</span>
        </a>

        <!-- Logout Button -->
        <a style="margin-left: 10px;" class="menu-link active" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotone/Interface/Lock.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd" d="M3.11117 13.2288C3.27137 11.0124 5.01376 9.29156 7.2315 9.15059C8.55778 9.06629 10.1795 9 12 9C13.8205 9 15.4422 9.06629 16.7685 9.15059C18.9862 9.29156 20.7286 11.0124 20.8888 13.2288C20.9535 14.1234 21 15.085 21 16C21 16.915 20.9535 17.8766 20.8888 18.7712C20.7286 20.9876 18.9862 22.7084 16.7685 22.8494C15.4422 22.9337 13.8205 23 12 23C10.1795 23 8.55778 22.9337 7.23151 22.8494C5.01376 22.7084 3.27137 20.9876 3.11118 18.7712C3.04652 17.8766 3 16.915 3 16C3 15.085 3.04652 14.1234 3.11117 13.2288Z" fill="#12131A" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13 16.7324C13.5978 16.3866 14 15.7403 14 15C14 13.8954 13.1046 13 12 13C10.8954 13 10 13.8954 10 15C10 15.7403 10.4022 16.3866 11 16.7324V18C11 18.5523 11.4477 19 12 19C12.5523 19 13 18.5523 13 18V16.7324Z" fill="#12131A" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7 6C7 3.23858 9.23858 1 12 1C14.7614 1 17 3.23858 17 6V10C17 10.5523 16.5523 11 16 11C15.4477 11 15 10.5523 15 10V6C15 4.34315 13.6569 3 12 3C10.3431 3 9 4.34315 9 6V10C9 10.5523 8.55228 11 8 11C7.44772 11 7 10.5523 7 10V6Z" fill="#12131A" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div><br>

    <!-- DENOMINATION -->
    <div class="container">
        <br><br><br><br>
        <h2 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Denomination</span><br>
            <span class="text-muted mt-1 fw-bold fs-7">Purchase Summary</span>
        </h2><br><br>

        @if(Session::has('transaction_added'))
            <div class="alert alert-success" role="alert">
                {{Session::get('transaction_added')}}
            </div>
        @endif

        @if($numRows==0)

            <div class="alert alert-primary" role="alert">
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
@endsection
    
</div>

