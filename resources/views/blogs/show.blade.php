@extends('layouts.app')

@include('partials.meta_dynamic')

@section('content')



   <div class="container">

    <article>

        <div class="col-md-12">
        <!-- Carrousell -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image0}}  "  style="max-height: 500px;">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image1}}  "  style="max-height: 500px;">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image2}}  "  style="max-height: 500px;">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image3}}  "  style="max-height: 500px;">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image4}}  "  style="max-height: 500px;">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image5}}  "  style="max-height: 500px;">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image6}}  "  style="max-height: 500px;">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image7}}  "  style="max-height: 500px;">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image8}}  "  style="max-height: 500px;">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image9}}  "  style="max-height: 500px;">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image10}}  "  style="max-height: 500px;">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image11}}  "  style="max-height: 500px;">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image12}}  "  style="max-height: 500px;">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image13}}  "  style="max-height: 500px;">            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="/images/post_image/{{ $blog->image14}}  "  style="max-height: 500px;">            </div>
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
       <div class="col-md-10 text-center">
          
          <p> <span class="font-weight-bold">Address:</span> {{$blog->address}}</p> 
          <p><span class="font-weight-bold">City:</span>  {{$blog->city}}</p> 
          <p><span class="font-weight-bold">Region:</span>  {{$blog->region}}</p> 
        </div> 
      </div>
     

     </article>

<div class="container">
     <div class="row" >
        <div class="col">
            <img src="/images/post_image/{{ $blog->image15}}" style="margin-top: 8px; vertical-align: middle; width: 100%" class="img-responsive">         
          </div>
          <div class="col">
            <img src="/images/post_image/{{ $blog->image16}}" style="margin-top: 8px; vertical-align: middle; width: 100%" class="img-responsive">
          </div>
          <div class="col">
            <img src="/images/post_image/{{ $blog->image17}}" style="margin-top: 8px; vertical-align: middle; width: 100%" class="img-responsive">
          </div>
      </div>

      <div class="row" >
        <div class="col" >
            <img src="/images/post_image/{{ $blog->image18}}" style="margin-top: 8px; vertical-align: middle; width: 100%; " class="img-responsive">         
          </div>
          <div class="col">
            <img src="/images/post_image/{{ $blog->image19}}" style="margin-top: 8px; vertical-align: middle; width: 100%; " class="img-responsive">
          </div>
      </div>

      <div class="row" >
        <div class="col" >
            <img src="/images/post_image/{{ $blog->image20}}" style="margin-top: 8px; vertical-align: middle; width: 100%;height: 400px;" class="img-responsive">         
          </div>
      </div>
</div>

    <div class="row justify-content-md-center">
       <div class="col-md-10 text-center text-justify">
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

    


@if($blog->address || $blog->city)
  <div class="container mt-5">
    <h2 class="text-center">How to get there</h2>
    <div class="row">
    
      <div class="col text-center text-center embed-responsive embed-responsive-16by9">
          <iframe
          width="700"
          height="450"
          frameborder="0" style="border:0"
          src="https://www.google.com/maps/embed/v1/place?key={{env('GOOGLE_KEY')}}
        &q={{$blog->address}}" allowfullscreen class="embed-responsive-item">
        </iframe>
      </div>
@endif    
    
       
    </div>

    </div>





<aside>
<div id="disqus_thread" class="container mt-5"></div>
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
