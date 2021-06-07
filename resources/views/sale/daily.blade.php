@extends('layouts.sales')

@section('sub_content')
<br>
<div class="container">
    <h3>Today's Sale</h3>
    @if ($numRows==0)
        <div class="alert alert-danger" role="alert">
            {{'No Sales Yet'}}
        </div>

        @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Sold</th>
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
@endsection
