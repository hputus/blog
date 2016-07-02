<!-- resources/views/post.blade.php -->

@extends('layouts.app')

@section('pageTitle',$settings['Site Title'].' - '.$post->title)

@section('content')
<div class="post">
    <span class="post-date">
        {{ strtoupper(date("F jS, Y", strtotime($post->published_at))) }}
    </span>
    <h3 class="post-title">
        <a href="/post/{{ $post->url }}">{{$post->title}}</a>
    </h3>
    <div class="post-content">
        {!! $post->contents !!}
    </div><!-- .post-content -->
</div><!-- .post -->
@endsection