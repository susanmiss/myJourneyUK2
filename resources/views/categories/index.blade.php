@extends('layouts.app')



@section('content')

    <div class="container">
        @foreach($categories as $category)
            <h2><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></h2>

            <img src="/images/featured_image/{{ $category->featured_image ? $category->featured_image : '' }}" alt="{{$category->title }}" class="img-responsive featured_image" style="width:300px;">

        @endforeach
    </div>

@endsection
