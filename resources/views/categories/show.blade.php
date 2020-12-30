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

        <div class="col mt-5">
            @foreach($category->blog as $blog)
                <a href="{{ route('blogs.show', [$blog->slug]) }}" style="text-decoration: none;">
                    <div class="container shadow p-5 mb-5 rounded bg-light" style="height: 500px;  border-radius: 20px;" id="blog-container">
                        <h2 class="mb-5 text-center">{{ $blog->title }}</h2>

                        <div class="container">
                            <div class="row text-center" >

                                <div class="col-md-12 pt-5 col-sm-12 "   >
                                    <p class="text-center">{!! str_limit($blog->body, 50) !!}</p>

                             
                                </div>

                                <div class="col-md-12 col-sm-12 container-carr" >

                                    <!-- Carrousell -->
                                    <div id="carouselExampleControls " class="carousel slide" data-ride="carousel" >

                                   
                                        <div class="carousel-inner " >
                                            
                                            <div class="carousel-item active ">
                                            <img class="d-block w-100" src="/images/post_image/{{ $blog->image0 }}" alt="{{$blog->title}}" style=" max-height: 350px;">
                                            </div>
                                            <div class="carousel-item  ">
                                            <img class="d-block w-100" src="/images/post_image/{{ $blog->image1 }}" alt="{{$blog->title}}" style="max-height: 350px;">
                                            </div>
                                            <div class="carousel-item  ">
                                            <img class="d-block w-100" src="/images/post_image/{{ $blog->image2 }}" alt="{{$blog->title}}" style="max-height: 350px;">
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                                                                
                                        </div>
                                       
                                        </div>
                                    <!-- Carrousel End -->
                                     
                                </div>
                            
                
                            </div>
                        </div>
                        

                    </div>
                </a>
            @endforeach
        </div>

    </div>

@endsection