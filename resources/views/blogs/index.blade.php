@ob_start()
@extends('layouts.app')



@section('content')

    <div class="container col-md-12" style="margin-bottom: 100px;">

        <div class="container">
        @if(Session::has('blog_created_message'))
            <div class="alert alert-success">
                {{ Session::get('blog_created_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            </div>
        @endif

        @if(Session::has('contact_form_send'))
            <div class="alert alert-success ">
                {{ Session::get('contact_form_send') }}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            </div>
        @endif
        </div>


        @foreach($blogs as $blog)
        <div class="container shadow p-5 mb-5 rounded bg-light" style="min-height: 750px!important;  border-radius: 20px; margin-top: 100px;" id="blog-container">
            <h1 class="text-center"><a href="{{ route('blogs.show', [$blog->slug]) }}" style="overflow-wrap: break-word;">{{ str_limit($blog->title, 50) }}</a></h1>

          
          <div class="text-center">
            <div class="text-center  mt-5">
              @if($blog->featured_image)
                <img src="/images/post_image/{{ $blog->featured_image ? $blog->featured_image : '' }}" alt="{{ str_limit($blog->title, 30) }}" class="img-fluid featured_image" style="max-width:400px;height:auto;"><br/>
              @endif
            

            <div class="text-center">
            @if($blog->user)
                Author: <a href="{{ route('users.show', $blog->user->name) }}">{{ $blog->user->name }}</a> | Posted: {{ $blog->created_at->diffForHumans() }}
            @endif
            </div>
            </div>

            <div class="lead text-center mt-5">{!! str_limit($blog->body, 120) !!}</div>
            </div>
        
            </div>
            <br><hr><br>
        @endforeach

        <br>

        <div><div class="col-md-6 offset-md-3 text-center">{{ $blogs->links() }}</div>

    </div>

@endsection



