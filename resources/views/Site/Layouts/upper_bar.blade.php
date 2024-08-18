<div class="upper-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="language">
                    <a href="{{ LaravelLocalization::getCurrentLocaleScript('ar') }}" class="ar active">عربى</a>

                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="social">
                    <div class="icons">

                        <a href="{{$facebook->value}}" class="facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{$instagram->value}}" class="instagram"><i class="fab fa-instagram"></i></a>
                        <a href="{{$twitter->value}}" class="twitter"><i class="fab fa-twitter"></i></a>
                        <a href="{{$whats_app->value}}" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
            @guest('site')

            <div class="col-md-4">
                <div class="accounts" dir="ltr">
                        <a href="{{route('site.login')}}" class="signin">الدخول</a>
                        <a href="{{route('site.register')}}" class="create-new">إنشاء حساب جديد</a>
                </div>
            </div>
            <!-- not a member-->
            <div class="col-lg-4">
                <div class="info" dir="ltr">
                    <div class="phone">
                        <i class="fas fa-phone-alt"></i>
                        <p>{{$phone->value}}</p>
                    </div>
                    <div class="e-mail">
                        <i class="far fa-envelope"></i>
                        <p>{{$email->value}}</p>
                    </div>
                </div>

                @else

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
                            <a href="{{route('site.home')}}" class="dropdown-item" href="contact-us.html">
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
                @endguest
            </div>

        </div>
    </div>
</div>

