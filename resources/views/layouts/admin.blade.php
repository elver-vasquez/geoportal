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
                        <ol class="breadcrumbs">
                            {{--<li>--}}
                                {{--<a href="index.html">--}}
                                    {{--<i class="fa fa-home"></i>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li><span>Pages</span></li>--}}
                            {{--<li><span>{Auth::user()->username}}</span></li>--}}
                        </ol>

                        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                    </div>
                </header>
            @yield('content')
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