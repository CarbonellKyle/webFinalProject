@extends('layouts.template')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as User!') }}
                </div>

                <div class="container">
                    <p><strong>Temporary</strong> pa ni guys kay magbuhat pa kog seeder para ma built-in ang Admin</p>
                    <p>I edit imong account, I check ang <strong>Administrator</strong> then i uncheck ang <strong>User</strong></p>
                    <p>Balik dayun <strong>Login</strong> para ma redirect ka sa <strong>Admin Panel</strong>. Thank You!</p>
                </div>
                <a href="/laratrust" class="btn btn-danger">Click Here to Change Your Account Type</a>

            </div>
        </div>
    </div>
</div>
@endsection
