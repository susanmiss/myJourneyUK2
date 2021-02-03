ob_start()
@extends('layouts.app')

@section('content')


$x = 20;

   <div class="container-fluid">
       <div class="jumbotron">
           <h1>Edit | {{ $blog->title }}</h1>
       </div>

       <div class="col-md-12">
           <form action="{{ route('blogs.update', $blog->id) }}" method="post" enctype="multipart/form-data">
           @csrf
            {{ method_field('patch') }}
               <div class="form-group">
                   <label for="title">Title</label>
                   <input type="text" name="title" class="form-control" value="{{ $blog->title }}">
               </div>

               <div class="form-group">
                   <label for="address0">Address</label>
                   <input type="text" name="address0" class="form-control" value="{{ $blog->address0 }}">
               </div>

               <div class="form-group">
                   <label for="city0">City</label>
                   <input type="text" name="city0" class="form-control" value="{{ $blog->city0 }}">
               </div>

               <div class="form-group">
                   <label for="region0">Region</label>
                   <input type="text" name="region0" class="form-control" value="{{ $blog->region0 }}">
               </div>

               <div class="form-group">
                   <label for="body">Body</label>
                   <textarea name="body" class="form-control">{{ $blog->body }}</textarea>
               </div>

               <div class="form-group">
                   <label for="video0">Video - Just the number, ex: PAwzzBXUNNY</label>
                   <input type="text" name="video0" class="form-control" value="{{$blog->video0}}">
               </div>

               <div class="form-group form-check form-check-inline mr-3">
                {{ $blog->category->count() ? 'Current categories: ' : '' }} &nbsp;
                @foreach($blog->category as $category)
                  <input type="checkbox" value="{{ $category->id }}" name="category_id[]" class="form-check-input p-3" checked>
                  <label class="form-check-label btn-margin-rightp-3">{{ $category->name }}</label>&nbsp;&nbsp;&nbsp;&nbsp;
                @endforeach
               </div>

               <div class="form-group form-check form-check-inline p-3">
                {{ $filtered->count() ? 'Unused categories: ' : '' }} &nbsp;
                @foreach($filtered as $category)
                  <input type="checkbox" value="{{ $category->id }}" name="category_id[]" class="form-check-input p-3">
                  <label class="form-check-label btn-margin-right p-3">{{ $category->name }}</label>&nbsp;&nbsp;&nbsp;&nbsp;
                @endforeach
               </div>

               <div class="form-group">
                  <label class="btn btn-default">
                   <span class="btn btn-outline btn-sm btn-warning">Featured Image</span>
                   <input type="file" name="featured_image" class="form-control" >
                 </label>
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
               <button class="btn btn-primary" type="submit">Update blog</button>
             </div>
               {{ csrf_field() }}
           </form>
       </div>
   </div>

@endsection
