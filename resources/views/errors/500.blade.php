@extends('layouts.app')

@section('pageTitle',$settings['Site Title'].' - Something went wrong!')

@section('content')
<h1>Oh dear!</h1>
<p>It looks like something went wrong...please <a href="/">go to the home page.</a></p>
@endsection