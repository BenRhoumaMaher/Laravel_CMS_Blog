@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mt-5">Login</h5>
          <form action="{{ route('admins.checkLogin') }}" method="POST" class="p-auto">
            @csrf
              <!-- Email input -->
              <div class="form-outline mb-4">
                @error('email')
                    <p class="container h-25 alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
              </div>


              <!-- Password input -->
              <div class="form-outline mb-4">
                @error('password')
                <p class="container h-25 alert alert-danger">{{ $message }}</p>
                 @enderror
                <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
              </div>



              <!-- Submit button -->
              <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>


            </form>

        </div>
   </div>
 </div>

@endsection
