@extends('layouts.app')
@section('content')

<div class="comment-form-wrap pt-5">
    <h3 class=" ps-5">Update the post</h3>
    <form action="{{ route('posts.update',$post->id) }}" class="ps-5 pe-5 bg-light" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <input type="text" name="title" class="form-control" value="{{ old('title',$post->title) }}"  placeholder="write your post title">
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
        <textarea placeholder="write your post please" name="description" id="description" cols="30" rows="10" class="form-control">
            {{ old('description',$post->description) }}
        </textarea>
      </div>
      <div class="form-group">
        <input type="submit" value="Edit" class="btn btn-primary">
      </div>

    </form>
  </div>
</div>

@endsection
