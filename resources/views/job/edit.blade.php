@extends('layouts.employeeTemp')

@section('sub_content')
<br>
<div class="container">
    <div class="pull-right">
        <a class="btn btn-info" href="{{ route('job.index') }}"> Back</a>
    </div><br>

    <h2>Edit Job</h2><br>

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

    @if(Session::has('job_updated'))
        <div class="alert alert-info" role="alert">
            {{Session::get('job_updated')}}
        </div>
    @endif

    @error('job')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror

    <form method="POST" action="{{route('job.update')}}" class="form">
    <input type="hidden" name="id" value="{{$job->job_id}}"/>
        @csrf 
        <div class="fv-row mb-7">
            <label for="title" class="form-label fw-bolder text-dark fs-6">{{ __('Tilte') }}</label>
            <input type="text" name="title" class="form-control form-control-lg form-control-solid" value="{{$job->title}}" placeholder="Title">
        </div>
        <div class="fv-row mb-7">
            <label for="salary" class="form-label fw-bolder text-dark fs-6">{{ __('Salary') }}</label>
            <input type="number" name="salary" class="form-control form-control-lg form-control-solid" value="{{$job->salary}}" placeholder="Salary">
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary">
                {{ __('Update') }}
            </button>
        </div>
    </form>
    
</div>
@endsection