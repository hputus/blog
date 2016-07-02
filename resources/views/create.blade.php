<!-- resources/views/create.blade.php -->

@extends('layouts.app')

@section('pageTitle')
    {{ ($mode == 'create' ? 'Create New Post' : 'Edit Post') }}
@endsection

@section('content')
<script src="/js/ckeditor/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.2/js.cookie.min.js"></script>

<h2>{{ ($mode == 'create' ? 'Create' : 'Edit').' Post' }}</h2>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ ($mode == 'create' ? '/admin/create' : '') }}" method="POST">
    {{ csrf_field() }}
    @if ($mode == 'edit')
        <input type="hidden" name="id" value="{{ $id }}"/>
    @endif
    <div class="post">
        <p>Published? <input type='checkbox' name='is_published' {{ isset($is_published) ? ($is_published==1 ? 'checked' : '') : (old('is_published')==1 ? 'checked' : '') }}/></p>
        <br/>
        <p>Published date:</p>
        <div class="post-date">
            <div class='input-group date' id='datetimepicker1'>
                <input type='text' class="form-control" name="published_at" value="{{ isset($published_at) ? $published_at : old('published_at') }}" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
        <p><br/>Title:</p>
        <div class="post-title">
            <input type="text" name="title" value="{{ isset($title) ? $title : old('title') }}"/>
        </div>
        <div class="post-url">
            <br/>URL: <input type="text" name="url" value="{{ isset($url) ? $url : old('url') }}"/>
        </div>
        <p><br/>Content:</p>
        <div class="post-content">
            <textarea id="contents-editor" name="contents">{{ isset($contents) ? $contents : old('contents') }}</textarea>
        </div><!-- .post-content -->
        {{ csrf_field() }}
        <p>
            <br/>
            <button type="submit" class="btn btn-success btn-lg" href="#">
                <span class="glyphicon glyphicon-check"></span>
                {{ ($mode == 'create' ? 'Create' : 'Edit') }}
            </button>
        </p>
    </div><!-- .post -->
</form>
<script>
    //return the Laravel-generated CSRFToken              
    CKEDITOR.tools.getCsrfToken = function(){
        return $('input[name=_token]').val();
    };
    //and create the editor
    CKEDITOR.replace('contents-editor');
    //listen for keypresses on the post title
    $('input[name=title]').keyup(function() {
        var url = $(this).val().toLowerCase().trim().split(' ').join('-');
        $('input[name=url]').val(url);
    });
    
    //initialise the date picker
    $('#datetimepicker1').datetimepicker({
        format: 'YYYY-MM-DD'
    });
</script>
@endsection