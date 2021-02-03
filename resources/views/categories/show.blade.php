@extends('layouts.app')


@section('content')

    <header class="masthead" style="background-image: url('/images/post_image/{{ $category->featured_image }}'); background-position: center center; background-size: cover; background-attachment: scroll; background-repeat: no-repeat;">
    <div class="container">
        <div class="intro-text">
            <div class="intro-heading text-uppercase"></div>
        </div>
    </div>

    <h1 class="text-center pb-5" style="overflow-wrap: break-word;">{{ $category->name }}</h1>
                   
    </header>

   
            <hr>

            @if(Auth::user() && Auth::user()->role_id === 1)

            <div class="wrapper text-center">
                <div class="btn-group">
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm btn-margin-right mr-5">Edit</a>

                    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                        {{ method_field('delete') }}
                            <button type="submit" class="btn btn-danger btn-sm pull-left">Delete</button>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
            <hr>
            @endif

        <div class="col mt-5">
            @foreach($category->blog as $blog)
                <a href="{{ route('blogs.show', [$blog->slug]) }}" style="text-decoration: none;">
                    <div class="container shadow p-5 mb-5 rounded bg-light" style="min-height: 750px;  border-radius: 20px;" id="blog-container">
                    <h1 class="text-center"><a href="{{ route('blogs.show', [$blog->slug]) }}" style="overflow-wrap: break-word;">{{ str_limit($blog->title, 50) }}</a></h1>

                        <div class="text-center">
                        @if($blog->featured_image)
                        <img src="/images/post_image/{{ $blog->featured_image ? $blog->featured_image : '' }}" alt="{{ str_limit($blog->title, 50) }}" class="img-fluid featured_image text-center" style="max-width:400px;height:auto;"><br/>
                        @endif

                        <div class="text-center">
            @if($blog->user)
                Author: <a href="{{ route('users.show', $blog->user->name) }}">{{ $blog->user->name }}</a> | Posted: {{ $blog->created_at->diffForHumans() }}
            @endif
            </div>
            </div>

            <div class="lead text-center mt-5 " >
            <p>{!! str_limit($blog->body, 120) !!}</p>
            </div>
            </div>
        
            </div>
            <br><br>
        @endforeach
        </div>

    </div>

@endsection