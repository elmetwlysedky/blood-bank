@extends('Site.Layouts.master')

@section('title')
    {{__('main.register')}}
@endsection


@section('navbar')

    <body class="who-are-us">


    @endsection


    @section('content')

        <!--inside-article-->
        <div class="about-us">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">عن بنك الدم </li>
                        </ol>
                    </nav>
                </div>
                <div class="details">
                    <div class="logo">
                        <img src="{{asset('Site/imgs/logo.png')}}">
                    </div>
                    <div class="text">
                        <p>
                            {{$about->value}}
                        </p>
                    </div>
                </div>
            </div>
        </div>

@endsection
