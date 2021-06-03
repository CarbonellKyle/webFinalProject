@extends('layouts.inventory')

@section('sub_content')
<br>
<div class="container">
    <div class="pull-right">
        <a class="btn btn-info" href="{{ route('category.index') }}"> Back</a>
    </div><br>

    <h2>Add Category</h2><br>

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

    @if(Session::has('category_added'))
        <div class="alert alert-success" role="alert">
            {{Session::get('category_added')}}
        </div>
    @endif

    @error('category')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror

    <form method="POST" action="{{route('category.addSubmit')}}" class="form">
        @csrf 
        <div class="fv-row mb-7">
            <label for="name" class="form-label fw-bolder text-dark fs-6">{{ __('Category Name') }}</label>
            <input type="text" name="name" class="form-control form-control-lg form-control-solid" placeholder="Category Name">
        </div>
        <div class="fv-row mb-7">
            <label for="description" class="form-label fw-bolder text-dark fs-6">{{ __('Description') }}</label>
            <input type="text" name="description" class="form-control form-control-lg form-control-solid" placeholder="Description">
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary">
                {{ __('Add') }}
            </button>
        </div>
    </form>
    
</div>
@endsection