@ob_start()
@extends('layouts.app')



@section('content')

    <div class="container mt-5">

        @if(Session::has('blog_created_message'))
            <div class="alert alert-success">
                {{ Session::get('blog_created_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            </div>
        @endif

        @if(Session::has('contact_form_send'))
            <div class="alert alert-success">
                {{ Session::get('contact_form_send') }}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            </div>
        @endif


        @foreach($blogs as $blog)
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

            <div class="lead text-center mt-5 col-md-6">{!! str_limit($blog->body, 200) !!}</div>
            </div>
        
            </div>
            <br><hr><br>
        @endforeach

        <br>

        <div><div class="col-md-6 offset-md-3 text-center">{{ $blogs->links() }}</div>

    </div>

@endsection



