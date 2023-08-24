@extends('layouts.admin')

@section('content')

 @if (session()->has('category'))
     <p class="container alert alert-success">{{ session('category') }}</p>
 @endif
 @if (session()->has('categorydelete'))
     <p class="container alert alert-success">{{ session('categorydelete') }}</p>
 @endif
 @if (session()->has('categoryupdate'))
 <p class="container alert alert-success">{{ session('categoryupdate') }}</p>
@endif

<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline">Categories</h5>
         <a  href="{{ route('admins.create-category') }}" class="btn btn-primary mb-4 text-center float-right">Create</a>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">update</th>
                <th scope="col">delete</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                @forelse ($categories as $category)
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->name }}</td>
                <td><a  href="{{ route('admins.update-category',$category->id) }}" class="btn btn-warning text-white text-center ">Update</a></td>
                <td>
                    <form action="{{ route('admins.delete-category',$category->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
              </tr>
              @empty
                 <p>No categories yet, add one please</p>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection
