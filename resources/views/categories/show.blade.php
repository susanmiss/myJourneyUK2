@extends('layouts.app')



@section('content')

    <header class="container">
  
            <img src="/images/featured_image/{{ $category->featured_image ? $category->featured_image : '' }}" alt="{{$category->name }}" style="height: 500px; display:block; margin: auto;" >
            <h1 class="text-center">{{ $category->name }}</h1>

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

            @endif
    </header>

        <div class="col-md-12 mt-5">
            @foreach($category->blog as $blog)
                <a href="{{ route('blogs.show', [$blog->slug]) }}" style="text-decoration: none;">
                    <div class="container shadow p-5 mb-5 rounded bg-light" style="height: 400px;  border-radius: 20px;" >
                        <h2>{{ $blog->title }}</h2>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 pt-5">
                                <p>{{ $blog->body }}</p>
                                </div>

                                <div class="col-md-4">
                                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                @foreach($category->blog as $blog)
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                        <img src="/images/featured_image/{{ $blog->featured_image }}" style="height: 260px; display:block; margin: auto;" class="d-block w-100">
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                                </div>


                            </div>
                        </div>
                        

                    </div>
                </a>
            @endforeach
        </div>

    </div>

@endsection