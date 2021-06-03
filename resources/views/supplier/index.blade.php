@extends('layouts.inventory')

@section('sub_content')
<br>
<div class="container">
    <h3>Supplier List</h3>
    <br>

    <div>
        <a class="btn btn-primary" href="{{route('supplier.add')}}">Add Suppliers</a>
    </div><br>

    @if(Session::has('forget_supplier'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('forget_supplier')}}
        </div>
    @endif

    @if($numRows==0)

        <div class="alert alert-danger" role="alert">
                {{'No Records Yet'}}
        </div>
            
        @else
        <!-- Contents -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Company Name</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($suppliers as $supplier)
                <tr>
                    <td>{{$supplier->company_name}}</td>
                    <td>{{$supplier->phone_number}}</td>
                    <td>
                        <a href="/supplier/edit/{{$supplier->supplier_id}}" class="btn btn-warning">Edit</a>
                        <a href="/supplier/delete/{{$supplier->supplier_id}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @endif

    

</div>



@endsection