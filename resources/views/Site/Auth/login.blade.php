@extends('Site.Layouts.master')

@section('title')
    {{__('main.register')}}
@endsection


@section('navbar')

    <body class="signin-account">
        <!--upper-bar-->


@endsection




@section('content')


 <!--form-->
    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">تسجيل الدخول</li>
                    </ol>
                </nav>
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
            <div class="signin-form">
            {!! Form::open(['route'=>'site.login','class'=>'form-validate-jquery','method'=>'post' ,'id'=>'myForm']) !!}
                    <div class="logo">
                        <img src="{{asset('Site/imgs/logo.png')}}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="الجوال">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="كلمة المرور">
                    </div>
                    <div class="row options">
                        <div class="col-md-6 remember">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">تذكرنى</label>
                            </div>
                        </div>
                        <div class="col-md-6 forgot">
                            <img src="{{asset('Site/imgs/complain.png')}}">
                            <a href="#">هل نسيت كلمة المرور</a>
                        </div>
                    </div>
                    <div class="row buttons">
                        <div class="col-md-6 right">
{{--                             <a  href="">دخول</a>--}}
                            <input type="submit"  value="دخول">
                        </div>
                        <div class="col-md-6 left">
                            <a href="{{route('site.register')}}">انشاء حساب جديد</a>
                        </div>
                    </div>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection

@section('script')




@endsection
