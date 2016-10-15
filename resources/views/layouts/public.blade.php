@extends('layouts.main')

@section('head')
    @stop

@section('title')
    Sistema  Cuencas
    @stop
@section('styles')
    @include('includes.public_style')
    @include('includes.public_scripts')
    @stop

@section('body')
    @yield('content')

@stop