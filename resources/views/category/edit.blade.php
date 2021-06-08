@extends('layouts.form')

@section('content')
<div class="container-fluid">
    <div class="pull-right">
        <a class="btn btn-info" href="{{ route('category.index') }}"> Back</a>
    </div>
    <h2 class="mt-4 text-center"><strong>Edit Category</strong></h2><br>

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

    @if(Session::has('category_updated'))
        <div class="alert alert-info" role="alert">
            {{Session::get('category_updated')}}
        </div>
    @endif

    @error('category')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror

    <form method="POST" action="{{route('category.update')}}" class="form w-100">
        @csrf 
        <input type="hidden" name="id" value="{{$category->category_id}}"/>

        <!--begin::Input group-->
		<div class="row fv-row mb-7">
			<!--begin::Col-->
			<div class="col-xl-6">
                <label for="name" class="form-label fw-bolder text-dark fs-6">{{ __('Category Name') }}</label>
                <input type="text" name="name" value="{{$category->name}}" class="form-control form-control-lg form-control-solid" placeholder="Category Name">
			</div>
			<!--end::Col-->
			<!--begin::Col-->
			<div class="col-xl-6">
                <label for="description" class="form-label fw-bolder text-dark fs-6">{{ __('Description') }}</label>
                <input type="text" name="description" value="{{$category->description}}" class="form-control form-control-lg form-control-solid" placeholder="Description">
			</div>
		    <!--end::Col-->
		</div>
		<!--end::Input group-->
        
        <div class="text-center">
            <button type="submit" class="btn btn-primary w-100 text-center">
                {{ __('Update') }}
            </button>
        </div>
    </form>
    
</div>
@endsection