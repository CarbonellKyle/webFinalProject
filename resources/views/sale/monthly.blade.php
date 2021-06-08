@extends('layouts.form')

@section('content')
<div class="container-fluid">
    <div class="pull-right">
        <a class="btn btn-info" href="/adminDashboard"> Back</a>
        <a class="btn btn-primary" href="{{route('sale.daily')}}" style="margin-left: 210px;">Daily Sales</a>
    </div><br>

    <div class="card-header border-0 pt-5">
        <h2 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">This Month</span><br>
            <span class="text-muted mt-1 fw-bold fs-7">Sold Item List</span>
        </h2><br>

        @if ($numRows==0)
            <div class="alert alert-danger" role="alert">
                {{'No Sales Yet'}}
            </div>

            @else
            <div class="table-responsive">
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                    <thead>
                        <tr class="fw-bolder text-muted">
                            <th class="min-w-150px">Product Name</th>
                            <th class="min-w-150px">Sold</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0; ?>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$soldList[$i]}}</td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                    </tbody>
                </table>
        @endif
    </div>
</div>
@endsection
