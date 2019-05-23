
@extends('layouts.appSearch')

@include('inc.navbarforsearch')

@section('css-file')
    <link rel="stylesheet" href="{{asset('css/search.css')}}">
@endsection

@section('content')
    <h1> {{$post->name_product}}</h1>
    <h1> {{$post->users()->pluck('name_market')->implode(', ')}}</h1>
    <h1> {{$post->users()->pluck('number_market')->implode(', ')}}</h1>
@endsection