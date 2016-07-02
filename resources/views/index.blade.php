<!-- resources/views/index.blade.php -->

@extends('layouts.app')

@section('pageTitle',$settings['Site Title'])

@section('content')
    <!-- All blog posts -->
    @if (count($posts) > 0)
        <!-- show each post -->
        @foreach ($posts as $index=>$post)
            <div class="post">
                <span class="post-date">
                    {{ strtoupper(date("F jS, Y", strtotime($post->published_at))) }}
                </span>
                <h3 class="post-title">
                    <a href="/post/{{ $post->url }}">{{$post->title}}</a>
                </h3>
                <div class="post-content">
                    {{ substr(strip_tags($post->contents),0,500) }}...
                    <p><a class="btn btn-default btn-lg" href="/post/{{ $post->url }}">More</a></p>
                </div><!-- .post-content -->
            </div><!-- .post -->
            @if ($index < count($posts)-1)
                <hr/>
            @endif
        @endforeach
        
        <div id="prev-next">
            <!-- display next/previous links -->
            @if ($posts->currentPage() != 1)
                <a class="btn btn-default btn-lg" href="{{ $posts->previousPageUrl() }}">&lt;&lt; Prev</a> 
            @endif
            @if ($posts->currentPage() != $posts->lastPage())
                @if ($posts->currentPage() != 1)
                    ||
                @endif
                <a class="btn btn-default btn-lg" href="{{ $posts->nextPageUrl() }}">Next &gt;&gt;</a>
            @endif
        </div><!-- #prev-next -->
    @endif
@endsection