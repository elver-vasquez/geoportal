@extends('layouts.master')
@section('head')
    @include('includes.head')
@stop
@section('body')

    <section class="body">

        <!-- start: header -->
        @include('includes.header')
                <!-- end: header -->

        <div class="inner-wrapper">
            <!-- start: sidebar -->
            @include('includes.sidebar_admin')
                    <!-- end: sidebar -->

            <section role="main" class="content-body">


                <header class="page-header">
                    {{--<h2>{{Auth::user()->username}}</h2>--}}

                    <div class="right-wrapper pull-right">
                       
                        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                    </div>
                </header>
                <div class=" row col-md-12">
            @yield('content')
                </div>
                <!-- start: page -->


                <!-- end: page -->
            </section>
        </div>
        @include('includes.sidebar-right')

    </section>
    @include('includes.footer')
@stop


@section('scripts')
    @include('includes.scripts')
@stop