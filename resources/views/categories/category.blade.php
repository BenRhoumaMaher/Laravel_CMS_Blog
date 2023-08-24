@extends('layouts.app')

@section('content')

<div class="section search-result-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="heading">Category: {{ $categoryname }}</div>
            </div>
        </div>
        <div class="row posts-entry">
            <div class="col-lg-8">
                @forelse ($posts as $post)
                <div class="blog-entry d-flex blog-entry-search-item">
                    <a href="{{ route('posts.single',$post->id) }}" class="img-link me-4">
                        <img src="{{ asset('assets/images/'.$post->image.'') }}" alt="Image" class="img-fluid">
                    </a>
                    <div>
                        <span class="date">{{ $post->created_at }} &bullet; <a href="{{ route('category.single',$categoryname) }}">{{ $post->category }}</a></span>
                        <h2><a href="{{ route('posts.single',$post->id) }}">{{ substr($post->title,0,10) }}...</a></h2>
                        <p>{{ substr($post->description,0,20) }}...</p>
                        <p><a href="{{ route('posts.single',$post->id) }}" class="btn btn-sm btn-outline-primary">Read More</a></p>
                    </div>
                </div>
                @empty
                    <p>No posts yet in this category</p>
                @endforelse

            </div>

            <div class="col-lg-4 sidebar">


                <!-- END sidebar-box -->
                <div class="sidebar-box" style="padding: 20px">
                    <h3 class="heading">Popular Posts</h3>
                    <div class="post-entry-sidebar">
                        <ul>
                            @foreach ($popPost as $post)
                            <li>
                                <a href="{{ route('posts.single',$post->id) }}">
                                    <img src="{{ asset('/assets/images/'.$post->image.'') }}" alt="Image placeholder" class="me-4 rounded">
                                    <div class="text">
                                        <h4>{{ substr($post->title,0,15) }}...</h4>
                                        <div class="post-meta">
                                            <span class="mr-2">{{ $post->created_at }}</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- END sidebar-box -->

                <div class="sidebar-box" style="padding: 20px">
                    <h3 class="heading">Categories</h3>
                    <ul class="categories">
                        @foreach ($catg as $category)
                        <li><a href="{{ route('category.single',$category->name) }}">{{ $category->name }}<span>{{ $category->posts_count }}</span></a></li>
                        @endforeach
                    </ul>
                </div>
                <!-- END sidebar-box -->




            </div>
        </div>
    </div>
</div>

@endsection
