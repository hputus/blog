@extends('layouts.app')

@section('pageTitle',$settings['Site Title'].' - Something went wrong!')

@section('content')
<h1>Oh dear!</h1>
<p>Service unavailable...please <a href="/">go to the home page.</a></p>
@endsection