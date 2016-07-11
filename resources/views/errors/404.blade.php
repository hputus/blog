@extends('layouts.app')

@section('pageTitle',$settings['Site Title'].' - Page not found')

@section('content')
<h1>Whoops!</h1>
<p>Sorry, but I couldn't find the page you're looking for...please <a href="/">go to the home page.</a></p>
@endsection