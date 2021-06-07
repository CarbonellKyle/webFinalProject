@extends('layouts.pos')

@section('sub_content')
<br>
<div class="container">
<h3>This Week</h3>
    @if ($numRows==0)
        <div class="alert alert-danger" role="alert">
            {{'No Transactions Yet'}}
        </div>

        @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="max-width: 50px;">Transaction Id</th>
                    <th>Payment</th>
                    <th>Change</th>
                    <th>Amount Paid</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{$transaction->trans_id}}</td>
                    <td>{{$transaction->payment}}</td>
                    <td>{{$transaction->change}}</td>
                    <td>{{$transaction->amount_paid}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
