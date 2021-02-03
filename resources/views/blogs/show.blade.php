
@extends('layouts.app')

@include('partials.meta_dynamic')

@section('content')


<header class="masthead" style="background-image: url('/images/post_image/{{ $blog->featured_image}}'); background-position: center center; background-size: cover; background-attachment: scroll; background-repeat: no-repeat;">
    <div class="container">
        <div class="intro-text">
            <div class="intro-heading text-uppercase"></div>
        </div>
    </div>

    <h1 class="text-center mt-3">{{ $blog->name }}</h1>
                   
    </header>


   <div class="container">

    <article>

        <div class="col-md-12">

        </div>

        <div class="col-md-12">
           <h1 class="text-center mt-3">{{ $blog->title }}</h1>
        </div>

        @if($blog->user)
                <div class="wrapper text-center">
                  Author: <a href="{{ route('users.show', $blog->user->name) }}">{{ $blog->user->name }}</a> | Posted: {{ $blog->created_at->diffForHumans() }}
                  <hr>

                  <strong>Categories: </strong>
                  @foreach($blog->category as $category)
                    <span><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></span>
                  @endforeach
                  <hr>
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
             @csrf
               {{ method_field('delete') }}
                <button type="submit" class="btn btn-danger btn-sm pull-left">Delete</button>
                {{ csrf_field() }}
               
             </form>
            
           </div>
           <hr>
           </div>
          
         </div>

         @endif
         @endif
   

     </article>

<div class="container">
             <!-- Carrousell -->
             <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
          @for($z=0; $z<=15; $z++)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{$z}}" class="active"></li>
          @endfor  
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image0 ? $blog->image0 : $blog->featured_image }}" class="img-responsive" style="width: auto; max-height: 600px;"> </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image1 ? $blog->image1 : $blog->featured_image }}" class="img-responsive"  style="width: auto; max-height: 600px;">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image2 ? $blog->image2 : $blog->featured_image }}"  class="img-responsive" style="width: auto; max-height: 600px;">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image3 ? $blog->image3 : $blog->featured_image }}"  class="img-responsive" style="width: auto; max-height: 600px;">            </div>
            <div class="carousel-item" >
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image4 ? $blog->image4 : $blog->featured_image }}"  class="img-responsive" style="width: auto; max-height: 600px;">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image5 ? $blog->image5 : $blog->featured_image }}" style="width: auto; max-height: 600px;"  class="img-responsive">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image6 ? $blog->image6 : $blog->featured_image }}" style="width: auto; max-height: 600px;" class="img-responsive">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image7 ? $blog->image7 : $blog->featured_image }}"  style="width: auto; max-height: 600px;" class="img-responsive">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image8 ? $blog->image8 : $blog->featured_image }}" style="width: auto; max-height: 600px;" class="img-responsive">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image9 ? $blog->image9 : $blog->featured_image }}"  style="width: auto; max-height: 600px;"class="img-responsive">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image10 ? $blog->image10 : $blog->featured_image }}" style="width: auto; max-height: 600px;" class="img-responsive">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image11 ? $blog->image11 : $blog->featured_image }}" style="width: auto; max-height: 600px;" class="img-responsive">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image12 ? $blog->image12 : $blog->featured_image }}"  style="width: auto; max-height: 600px;"class="img-responsive">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image13 ? $blog->image13 : $blog->featured_image }}"  style="width: auto; max-height: 600px;"class="img-responsive">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image15 ? $blog->image15 : $blog->featured_image }}"  style="width: auto; max-height: 600px;"class="img-responsive">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image16 ? $blog->image16 : $blog->featured_image }}"  style="width: auto; max-height: 600px;"class="img-responsive">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image17 ? $blog->image17 : $blog->featured_image }}"  style="width: auto; max-height: 600px;"class="img-responsive">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image18 ? $blog->image18 : $blog->featured_image }}"  style="width: auto; max-height: 600px;"class="img-responsive">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image19 ? $blog->image19 : $blog->featured_image }}"  style="width: auto; max-height: 600px;"class="img-responsive">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image20 ? $blog->image20 : $blog->featured_image }}"  style="width: auto; max-height: 600px;"class="img-responsive">            </div>


           
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        
<!-- Carrousel End -->

<div class="row justify-content-md-center mt-5">
       <div class="col-md-10 text-center">
          
          <p> <span class="font-weight-bold">Address:</span> {{$blog->address0}}</p> 
          <p><span class="font-weight-bold">City:</span>  {{$blog->city0}}</p> 
          <p><span class="font-weight-bold">Region:</span>  {{$blog->region0}}</p> 
        </div> 
      </div>


  
      @if($blog->video0)
      <h2 class="text-center mt-5">Check out our Video</h2>
    <div class="row justify-content-md-center">

      
       <div class="col-md-10 text-center embed-responsive embed-responsive-16by9">
         
         <iframe width="861" height="484" src="https://www.youtube.com/embed/{{$blog->video0}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="embed-responsive-item"></iframe>   
    </div>
        </div> 
        @endif
    </div>

    
    <div class="row justify-content-md-center">
       <div class="col-md-10 text-center text-justify mt-5">
          <p>{{ $blog->body}}</p>
        </div> 
    </div>




@if($blog->address0 || $blog->city0)
  <div class="container mt-5 mb-5">
    <h2 class="text-center mb-3">Program your journey </h2>
    <div class="row">
    
      <div class="col text-center text-center embed-responsive embed-responsive-16by9">
          <iframe
          width="700"
          height="450"
          frameborder="0" style="border:0"
          src="https://www.google.com/maps/embed/v1/place?key={{env('GOOGLE_KEY')}}
        &q={{$blog->address0}}" allowfullscreen class="embed-responsive-item">
        </iframe>
      </div>
@endif    
      
    </div>

    </div>



</div>

<aside>
<div id="disqus_thread" class="container" style="margin-top: 10%"></div>
<aside>
<script>
(function() {
  var d = document, s = d.createElement('script');
  s.src = 'https://larablog.disqus.com/embed.js';
  s.setAttribute('data-timestamp', +new Date());
  (d.head || d.body).appendChild(s);
})();
</script>




@endsection
