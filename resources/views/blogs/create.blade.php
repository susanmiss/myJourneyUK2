@extends('layouts.app')

@section('content')
@include('partials.tinymce')



   <div class="container-fluid">
       <div class="jumbotron">
           <h1>Create a new blog</h1>
       </div>

       <div class="col-md-12">
           <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
           @csrf
              @include('partials.error-message')

               <div class="form-group">
                   <label for="title">Title</label>
                   <input type="text" name="title" class="form-control">
               </div>

               <div class="form-group">
                   <label for="address0">Address</label>
                   <input type="text" name="address0" class="form-control">
               </div>

               <div class="form-group">
                   <label for="city0">City</label>
                   <input type="text" name="city0" class="form-control">
               </div>

               <div class="form-group">
                   <label for="region0">Region</label>
                   <input type="text" name="region0" class="form-control">
               </div>

               <div class="form-group">
                   <label for="body">Body</label>
                   <textarea name="body" class="form-control"></textarea>
               </div>

               <div class="form-group form-check form-check-inline">
                @foreach($categories as $category)
                  <input type="checkbox" value="{{ $category->id }}" name="category_id[]" class="form-check-input">
                  <label class="form-check-label btn-margin-right">{{ $category->name }}</label>&nbsp;&nbsp;&nbsp;&nbsp;
                @endforeach
               </div>

               <div class="form-group">
                  <label class="btn btn-default">
                   <span class="btn btn-outline btn-sm btn-warning">Featured Image</span>
                   <input type="file" name="featured_image" class="form-control"  >
                 </label>
                
               </div>

               <div class="form-group">
                   <label for="video0">Video - Just the number, ex: PAwzzBXUNNY</label>
                   <input type="text" name="video0" class="form-control">
               </div>

                
                @for ($x = 0; $x <= 20; $x++)                    
                <div class="form-group">
                  <label class="btn btn-default">
                   <span class="btn btn-outline btn-sm btn-info">Post Image {{$x}}</span>
                   <input type="file" name="image{{$x}}" class="form-control" >
                 </label>
                 
               </div>
                
               @endfor 
                         

              <div>
                <button class="btn btn-primary" type="submit">Create a new blog</button>
              </div>
               {{ csrf_field() }}
           </form>
       </div>
   </div>

@endsection