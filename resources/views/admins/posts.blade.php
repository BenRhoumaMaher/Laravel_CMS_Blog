@extends('layouts.admin')

@section('content')

@if (session()->has('postdelete'))
<p class="container alert alert-success">{{ session('postdelete') }}</p>
@endif

<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline">Posts</h5>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">category</th>
                <th scope="col">user</th>
                <th scope="col">delete</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                @forelse ($posts as $post)
                <th scope="row">{{ $post->id }}</th>
                <td>{{ substr($post->title,0,20) }}...</td>
                <td>{{ $post->category }}</td>
                <td>{{ $post->user_name }}</td>
                 <td>
                    <form action="{{ route('admins.delete-post',$post->id) }}" method="POST">
                    @csrf
                        <button type="submit" class="btn btn-danger text-center">delete</button>
                    </form>
                </td>
              </tr>
              @empty
                    <p>No posts yet, add a post please</p>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection
