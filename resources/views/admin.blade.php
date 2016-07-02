<!-- resources/views/index.blade.php -->

@extends('layouts.app')

@section('pageTitle','Admin Panel')

@section('content')
    <h2>
        Existing Posts 
        <a class="btn btn-success btn-md" href="/admin/create">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            New
        </a>
        <a class="btn btn-warning btn-md" href="/admin/settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            Settings
        </a>
    </h2>
    <!-- All blog posts -->
    @if (count($posts) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Published Date</th><th>Title</th><th></th>
                </tr>
            </thead>
            <tbody>
            <!-- show each post -->
            @foreach ($posts as $index=>$post)
                <tr>
                    <td>{{ strtoupper(date("F jS, Y", strtotime($post->published_at))) }}</td>
                    <td><a href="/admin/edit/{{ $post->id }}">{{$post->title}}</a></td>
                    <td>
                        <a class="btn btn-default btn-md" href="/admin/edit/{{ $post->id }}">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>
                    </td>
                    <td>
                        <form action="/admin/delete/" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $post->id }}"/>
                            <button type="submit" class="btn btn-default btn-md">
                                <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
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