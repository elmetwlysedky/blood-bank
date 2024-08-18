@extends('Site.Layouts.master')

@section('title')
    {{__('main.register')}}
@endsection


@section('navbar')

<body>
                    <!-- not a member-->

    <!-- <div class="col-lg-4">
        <div class="info" dir="ltr">
            <div class="phone">
                <i class="fas fa-phone-alt"></i>
            </div>
            <div class="e-mail">
                <i class="far fa-envelope"></i>
                <p></p>
            </div>
        </div>
    </div> -->
    <!-- @auth('site')
    <div class="member">
        <p class="welcome">مرحباً بك</p>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">


                    {{ auth()->guard('site')->user()->name }}

            <i class="fas fa-chevron-down"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="index-1.html">
                    <i class="fas fa-home"></i>
                    الرئيسية
                </a>
                <a class="dropdown-item" href="#">
                    <i class="far fa-user"></i>
                    معلوماتى
                </a>
                <a class="dropdown-item" href="#">
                    <i class="far fa-bell"></i>
                    اعدادات الاشعارات
                </a>
                <a class="dropdown-item" href="#">
                    <i class="far fa-heart"></i>
                    المفضلة
                </a>
                <a class="dropdown-item" href="#">
                    <i class="far fa-comments"></i>
                    ابلاغ
                </a>
                <a class="dropdown-item" href="contact-us.html">
                    <i class="fas fa-phone-alt"></i>
                    تواصل معنا
                </a>
                <a href="{{route('site.logout')}}" class="dropdown-item" href="index.html">
                    <i class="fas fa-sign-out-alt"></i>
                    تسجيل الخروج
                </a>
            </div>
        </div>
    </div>
    @endauth -->




@endsection



@section('content')

 <!--intro-->
 <div class="intro">
            <div id="slider" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#slider" data-slide-to="0" class="active"></li>
                    <li data-target="#slider" data-slide-to="1"></li>
                    <li data-target="#slider" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item carousel-1 active">
                        <div class="container info">
                            <div class="col-lg-5">
                                <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                                <p>
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص.
                                </p>
                                <a href="#">المزيد</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item carousel-2">
                        <div class="container info">
                            <div class="col-lg-5">
                                <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                                <p>
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص.
                                </p>
                                <a href="#">المزيد</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item carousel-3">
                        <div class="container info">
                            <div class="col-lg-5">
                                <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                                <p>
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي.
                                </p>
                                <a href="#">المزيد</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
