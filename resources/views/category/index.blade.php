@extends('layouts.inventory')

@section('sub_content')
<br>
<div class="container">
    <h3>Category List</h3>
    <br>

    <div>
        <a class="btn btn-primary" href="{{route('category.add')}}">Add Category</a>
    </div><br>

    @if(Session::has('delete_category'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('delete_category')}}
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
                    <th>Category Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}}</td>
                    <td>
                        <a href="/category/edit/{{$category->category_id}}" class="btn btn-warning">Edit</a>
                        <a href="/category/delete/{{$category->category_id}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @endif

    

</div>



@endsection