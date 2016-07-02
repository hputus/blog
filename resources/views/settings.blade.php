<!-- resources/views/post.blade.php -->

@extends('layouts.app')

@section('pageTitle','Settings')

@section('content')

<h3>Site Settings</h3>
<form action='/admin/settings' method='post'>
    <table class='table'>
        <thead>
            <tr>
                <th>Setting</th>
                <th>Value</th>
            </tr>
        </thead>
    @foreach($settings as $setting)
    <tr>
        <td>{{ $setting->setting }}</td>
        <td><input class='form-control' type='text' name='{{ $setting->id }}' value='{{ $setting->value }}'/></td>
    </tr>    
    @endforeach
    </table>
    {{ csrf_field() }}
    <button type='submit' class='btn btn-success'>
        <span class="glyphicon glyphicon-check"></span>
        Update Settings
    </button>
</form>
@endsection