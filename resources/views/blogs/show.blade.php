@extends('layouts.app')

@include('partials.meta_dynamic')

@section('content')

   <div class="container-fluid">

    <article>

  

        <div class="col-md-12">
          @if($blog->featured_image)
            <img src="/images/featured_image/{{ $blog->featured_image ? $blog->featured_image : '' }}" alt="{{ str_limit($blog->title, 50) }}" class="img-responsive featured_image" style="max-width: 500px; display: block; margin: auto;"><br/>
          @endif
        </div>

        <div class="col-md-12">
           <h1 class="text-center">{{ $blog->title }}</h1>
        </div>

        @if($blog->user)
                <div class="wrapper text-center">
                  Author: <a href="{{ route('users.show', $blog->user->name) }}">{{ $blog->user->name }}</a> | Posted: {{ $blog->created_at->diffForHumans() }}
                  <hr>

                  <strong>Categories: </strong>
                  @foreach($blog->category as $category)
                    <span><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></span>
                  @endforeach
                  </div>
                 
                </div>
          @endif

          @if(Auth::user())
          @if(Auth::user()->role_id === 1 || Auth::user()->role_id === 2 && Auth::user()->id === $blog->user_id)

          <div class="col-md-12">
            <div class="wrapper text-center">
            <div class="btn-group">
              <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary btn-sm pull-left btn-margin-right btn-margin-right">Edit </a>&nbsp;

             <form method="post" action="{{ route('blogs.delete', $blog->id) }}">
               {{ method_field('delete') }}
                <button type="submit" class="btn btn-danger btn-sm pull-left">Delete</button>
                {{ csrf_field() }}
             </form>
           </div>
           </div>
           <hr >
         </div>

         @endif
         @endif

    
      <div class="row justify-content-md-center">
       <div class="col-md-10 ">
          <p>{!! $blog->body !!}</p>
          <p>Address: {{$blog->address}}</p> 
        </div> 
      </div>
     

     </article>

<div class="container">
     <div class="row" >
        <div class="col">
            <img src="/images/post_image/{{ $blog->image0}}" style="margin-top: 8px; vertical-align: middle; width: 100%">         
          </div>
          <div class="col">
            <img src="/images/post_image/{{ $blog->image0}}" style="margin-top: 8px; vertical-align: middle; width: 100%">
          </div>
          <div class="col">
            <img src="/images/post_image/{{ $blog->image0}}" style="margin-top: 8px; vertical-align: middle; width: 100%">
          </div>
      </div>

      <div class="row" >
        <div class="col" >
            <img src="/images/post_image/{{ $blog->image0}}" style="margin-top: 8px; vertical-align: middle; width: 100%; height: 500px;">         
          </div>
          <div class="col">
            <img src="/images/post_image/{{ $blog->image0}}" style="margin-top: 8px; vertical-align: middle; width: 100%; height: 500px;">
          </div>
      </div>

      <div class="row" >
        <div class="col" >
            <img src="/images/post_image/{{ $blog->image0}}" style="margin-top: 8px; vertical-align: middle; width: 100%;height: 400px;">         
          </div>
      </div>
</div>

    <div class="row justify-content-md-center">
       <div class="col-md-10 ">
          <p>{!! $blog->body !!}</p>
        </div> 
    </div>

      @if($blog->video)
    <div class="row justify-content-md-center">
       <div class="col-md-10 text-center embed-responsive embed-responsive-16by9">
         <h2>Video</h2>
         <iframe width="861" height="484" src="https://www.youtube.com/embed/{{$blog->video}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="embed-responsive-item"></iframe>   
    </div>
        </div> 
        @endif
    </div>
    <!-- https://youtu.be/PAwzzBXUNNY
    https://youtu.be/PAwzzBXUNNY?t=50
    https://www.youtube.com/watch?v=PAwzzBXUNNY&t=32s -->
    

    <!-- AIzaSyBl37aBwk41Wk2aFrE1TK90S3d53LA5Z2s -->
  <div class="container">
    <div class="row">
      <div class="col text-center text-center embed-responsive embed-responsive-16by9">
        <h2 class="text-center">How to get there</h2>
          <iframe
          width="700"
          height="450"
          frameborder="0" style="border:0"
          src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBl37aBwk41Wk2aFrE1TK90S3d53LA5Z2s
        &q={{$blog->address}}" allowfullscreen class="embed-responsive-item">
        </iframe>
      </div>

    
       
    </div>
    </div>



     <hr>

<aside>
<div id="disqus_thread"></div>
<script>
(function() {
  var d = document, s = d.createElement('script');
  s.src = 'https://larablog.disqus.com/embed.js';
  s.setAttribute('data-timestamp', +new Date());
  (d.head || d.body).appendChild(s);
})();
</script>
<aside>

</div>

@endsection
