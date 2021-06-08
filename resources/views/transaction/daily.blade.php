@extends('layouts.form')

@section('content')
<div class="container-fluid">
    <div class="pull-right">
        <a class="btn btn-info" href="{{route('order.add')}}"> Back</a>
    </div><br>

    <div class="card-header border-0 pt-5">
        <h2 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Today's Transaction</span><br>
            <span class="text-muted mt-1 fw-bold fs-7">Daily Transaction List</span>
        </h2><br>

        @if ($numRows==0)
            <div class="alert alert-danger" role="alert">
                    {{'No Transactions Yet'}}
            </div>

            @else
            <div class="table-responsive">
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                    <thead>
                        <tr class="fw-bolder text-muted">
                            <th class="min-w-120px">Transaction Id</th>
                            <th class="min-w-120px">Payment</th>
                            <th class="min-w-120px">Change</th>
                            <th class="min-w-120px">Amount Paid</th>
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
            </div>
        @endif
    </div>
</div>

@endsection
