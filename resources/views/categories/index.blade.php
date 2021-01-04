
@extends('layouts.app')

@section('content')

<div>
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in"></div>
          <div class="intro-heading text-uppercase"></div>
        </div>
      </div>
    </header>

    <div class="page-section bg-welcome">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Welcome to Journey UK </h2>
            <h3 class="section-subheading text-welcome">'It's a dangerous business, Frodo, going out your door. You step onto the road, and if you don't keep your feet, there's no knowing where you might be swept off to...' Bilbo Baggings</h3>
          </div>
        </div>
      </div>
    </div>
</div>    


    <div class="itemList" id="portfolio"> 

    <div class="container col-md-12" style="margin-bottom: 100px;">
        @if(Session::has('blog_created_message'))
            <div class="alert alert-success">
                {{ Session::get('blog_created_message') }}
               
            </div>
        @endif

        @if(Session::has('contact_form_send'))
            <div class="alert alert-success ">
                {{ Session::get('contact_form_send') }}
               
            </div>
        @endif
        </div>
        
            @foreach($categories as $category)
                <div class="Item portfolio-item" style="margin-bottom: 100px">
                <a class="portfolio-link"  href="{{ route('categories.show', $category->slug) }}">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fas fa-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="/images/featured_image/{{ $category->featured_image ? $category->featured_image : '' }}" alt="{{$category->title }}" class="img-fluid" style="width: 350px; height: 260px;" >
                </a>
                
        
                       

                <div class="portfolio-caption bg-light">
                    <h4 class="mt-4">{{$category->name}}</h4>
                    <!-- <p class="text-muted">{{$category->name}}</p> -->
                    </div>
               
                    
                </div>
                @endforeach
    </div> 
           
      
@endsection
