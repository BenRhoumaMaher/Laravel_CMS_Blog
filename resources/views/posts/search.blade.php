@extends('layouts.app')

@section('content')

<div class="section search-result-wrap">
    <div class="container">
        <div class="row">
            {{-- <div class="col-12">
                <div class="heading">Category: {{ $categoryname }}</div>
            </div> --}}
        </div>
        <div class="row posts-entry">
            <div class="col-lg-8">
                @forelse ($results as $post)
                <div class="blog-entry d-flex blog-entry-search-item">
                    <a href="{{ route('posts.single',$post->id) }}" class="img-link me-4">
                        <img src="{{ asset('assets/images/'.$post->image.'') }}" alt="Image" class="img-fluid">
                    </a>
                    <div>
                        <span class="date">{{ $post->created_at }} &bullet; <a href="{{ route('category.single', $post->category) }}">{{ $post->category }}</a></span>
                        <h2><a href="{{ route('posts.single',$post->id) }}">{{ substr($post->title,0,10) }}...</a></h2>
                        <p>{{ substr($post->description,0,20) }}...</p>
                        <p><a href="{{ route('posts.single',$post->id) }}" class="btn btn-sm btn-outline-primary">Read More</a></p>
                    </div>
                </div>
                @empty
                    <p class='text-danger'>No results, try to search for something else</p>
                @endforelse

            </div>
        </div>
    </div>
</div>

@endsection
