@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-5 d-inline">Update Categories</h5>
        <form method="POST" action="{{ route('admins.edit-category',$category->id) }}">
        @csrf
            <div class="form-outline mb-4 mt-4">
                @error('name')
                    <p class="container alert alert-danger">{{$message }}</p>
                @enderror
                <input value="{{ old('name',$category->name) }}" type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
            </div>
            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>
        </form>
        </div>
        </div>
    </div>
    </div>

@endsection
