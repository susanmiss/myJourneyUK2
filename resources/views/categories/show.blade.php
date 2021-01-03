@extends('layouts.app')


@section('content')

    <header class="container">
  
            <img src="/images/featured_image/{{ $category->featured_image ? $category->featured_image : '' }}" alt="{{$category->name }}"  style="width: 100%; max-height: 600px">
            <h1 class="text-center mt-3">{{ $category->name }}</h1>
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
    </header>

        <div class="col mt-5">
            @foreach($category->blog as $blog)
                <a href="{{ route('blogs.show', [$blog->slug]) }}" style="text-decoration: none;">
                    <div class="container shadow p-5 mb-5 rounded bg-light" style="height: 500px;  border-radius: 20px;" id="blog-container">
                        <h1 class="text-center"><a href="{{ route('blogs.show', [$blog->slug]) }}" >{{ $blog->title }}</a></h1>

                        <div class="row">
                        <div class="text-center col-md-6 mt-5">
                        @if($blog->featured_image)
                        <img src="/images/featured_image/{{ $blog->featured_image ? $blog->featured_image : '' }}" alt="{{ str_limit($blog->title, 50) }}" class="img-responsive featured_image" style="max-width:400px;height:auto;"><br/>
                        @endif

                        <div class="text-center">
            @if($blog->user)
                Author: <a href="{{ route('users.show', $blog->user->name) }}">{{ $blog->user->name }}</a> | Posted: {{ $blog->created_at->diffForHumans() }}
            @endif
            </div>
            </div>

            <div class="lead text-center mt-5 col-md-6 align-middle" >
            <p>{!! str_limit($blog->body, 200) !!}</p>
            </div>
            </div>
        
            </div>
            <br><br>
        @endforeach
        </div>

    </div>

@endsection