@extends('layouts.app')
@section('content')

<div class="comment-form-wrap pt-5">
    <h3 class=" ps-5">Create a new post</h3>
    <form action="{{ route('post.store') }}" class="ps-5 pe-5 bg-light" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <input type="text" name="title" class="form-control" placeholder="write your post title">
      </div>

      <div class="form-control">
        <select class="form-select" aria-label="Default select example" name="category">
            <option disabeld selected hidden>Choose your post category</option>
            @foreach ($categories as $category)
            <option value="{{ $category->name }}">{{ $category->name }}</option>
            @endforeach
          </select>
      </div>

      <div class="form-group">
        <input type="file" name="image" class="form-control">
      </div>

      <div class="form-group">
        <textarea placeholder="write your post please" name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <input type="submit" value="Create" class="btn btn-primary">
      </div>

    </form>
  </div>
</div>

@endsection
