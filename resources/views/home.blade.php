@extends('layouts.template')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>

                <div class="container bg-danger">
                    <p>Naa sa Dropdown ang <strong>Logout</strong> incase nasaag mo dri</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
