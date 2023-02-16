@extends('layouts.layouts')

@section('title', 'Home')

@section('content')

<h1>Bem vindo {{auth()->user()->firstName}}</h1>
@endsection
