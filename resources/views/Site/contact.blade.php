@extends('Site.Layouts.master')

@section('title')
    {{__('main.register')}}
@endsection


@section('navbar')

<body class="contact-us">
        <!--upper-bar-->

@endsection


@section('content')

<div class="contact-now">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">تواصل معنا</li>
                        </ol>
                    </nav>
                </div>




                <div class="row methods">
                    <div class="col-md-6">
                        <div class="call">
                            <div class="title">
                                <h4>اتصل بنا</h4>
                            </div>
                            <div class="content">
                                <div class="logo">
                                    <img src="{{asset('Site/imgs/logo.png')}}">
                                </div>
                                <div class="details">
                                    <ul>
                                        <li><span>الجوال:</span> {{$phone->value}}</li>
                                        <li><span>فاكس:</span> 234234234</li>
                                        <li><span>البريد الإلكترونى:</span> {{$email->value}}</li>
                                    </ul>
                                </div>
                                <div class="social">
                                    <h4>تواصل معنا</h4>
                                    <div class="icons" dir="ltr">
                                        <div class="out-icon">
                                            <a href="{{$facebook->value}}"><img src="{{asset('Site/imgs/001-facebook.svg')}}"></a>
                                        </div>
                                        <div class="out-icon">
                                            <a href="{{$twitter->value}}"><img src="{{asset('Site/imgs/002-twitter.svg')}}"></a>
                                        </div>
                                        <div class="out-icon">
                                            <a href="{{$youtube->value}}"><img src="{{asset('Site/imgs/003-youtube.svg')}}"></a>
                                        </div>
                                        <div class="out-icon">
                                            <a href="{{$instagram->value}}"><img src="{{asset('Site/imgs/004-instagram.svg')}}"></a>
                                        </div>
                                        <div class="out-icon">
                                            <a href="{{$whats_app->value}}"><img src="{{asset('Site/imgs/005-whatsapp.svg')}}"></a>
                                        </div>
                                        <div class="out-icon">
                                            <a href="#"><img src="{{asset('Site/imgs/006-google-plus.svg')}}"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="col-md-6">
                        <div class="contact-form">
                            <div class="title">
                                <h4>تواصل معنا</h4>
                            </div>
                            <div class="fields">
                                {!! Form::open(['route'=>'site.contact','class'=>'form-validate-jquery','method'=>'post']) !!}
                                <input type="hidden" name="client_id" value="{{ auth()->guard('site')->user()->id}}">
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="الإسم" name="name" value="{{ auth()->guard('site')->user()->name }}">
                                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="البريد الإلكترونى" name="email" value="{{ auth()->guard('site')->user()->email }}">
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="الجوال" name="phone"value="{{ auth()->guard('site')->user()->phone }}">
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="عنوان الرسالة" name="title">
                                    <textarea placeholder="نص الرسالة" class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
                                    <button type="submit">ارسال</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
