@extends('layouts.app')
@section('content')

<div class="comment-form-wrap pt-5">
    <h3 class=" ps-5">Update your profile</h3>
    <form action="{{ route('users.edit',$user->id) }}" class="ps-5 pe-5 bg-light" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        @error('name')
            <p class="container alert alert-danger text-center">{{ $message }}</p>
        @enderror
        <input type="text" name="name" class="form-control" value="{{ old('name',$user->name) }}"  placeholder="write your name">
      </div>

      <div class="form-group">
        @error('email')
            <p class="container alert alert-danger text-center">{{ $message }}</p>
        @enderror
        <input type="text" name="email" class="form-control" value="{{ old('email',$user->email) }}"  placeholder="write your email">
      </div>

      <div class="form-group">
        @error('bio')
            <p class="container alert alert-danger text-center">{{ $message }}</p>
        @enderror
        <textarea placeholder="write your bio please" name="bio" id="bio" cols="30" rows="10" class="form-control">
            {{ old('bio',$user->bio) }}
        </textarea>
      </div>
      @can('update', $user)
    <div class="form-group">
        <input type="submit" value="Update Profile" class="btn btn-primary">
        @endcan
    </div>

    </form>
  </div>
</div>

@endsection
