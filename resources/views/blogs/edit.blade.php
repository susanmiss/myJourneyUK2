@extends('layouts.app')

@section('content')
@include('partials.tinymce')

$x = 20;

   <div class="container-fluid">
       <div class="jumbotron">
           <h1>Edit | {{ $blog->title }}</h1>
       </div>

       <div class="col-md-12">
           <form action="{{ route('blogs.update', $blog->id) }}" method="post" enctype="multipart/form-data">
            {{ method_field('patch') }}
               <div class="form-group">
                   <label for="title">Title</label>
                   <input type="text" name="title" class="form-control" value="{{ $blog->title }}">
               </div>

               <div class="form-group">
                   <label for="body">Body</label>
                   {{-- <textarea name="body" class="form-control">{{ $blog->body }}</textarea> --}}
                   <textarea name="body" class="form-control my-editor">{{ $blog->body }}</textarea>
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
                   <input type="file" name="featured_image" class="form-control">
                 </label>
               </div>

               @for ($x = 0; $x <= 10; $x++) 
                   
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
