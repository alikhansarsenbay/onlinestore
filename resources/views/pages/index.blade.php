@extends('layouts.main-layout')

@section('title', 'Online Store')

@section('content')
    @include('includes.categories')
    @foreach($posts as $post)
    <div class="card mb-4">
        <div class="card-header">
            <a href="{{route('getPostsByCategory', $post->category['slug'])}}">{{$post->category['title']}}</a>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->description}}</p>
            <p class="card-text">Количество лайков: {{$post->like}}</p>
            <form method="post" action="{{route('posts.destroy',$post->id)}}">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
            <form method="post" action="{{route('posts.update',$post->id)}}">
                @method('put')
                @csrf
                <button type="submit" class="btn btn-primary btn-sm">Like</button>
            </form>
        </div>
    </div>
    @endforeach

    {{$posts->links('vendor.pagination.bootstrap-4')}}
@endsection
