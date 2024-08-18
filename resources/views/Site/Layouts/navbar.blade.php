
@guest('site')
@else
            <!--nav-->
    <div class="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{route('about')}}">
                    <img src="{{asset('Site/imgs/logo.png')}}" class="d-inline-block align-top" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('site.home')}}">الرئيسية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('about')}}">عن بنك الدم</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('site.posts.index')}}">المقالات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('site.donation.index')}}">طلبات التبرع</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('who_are_we')}}">من نحن</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('site.contact')}}">اتصل بنا</a>
                        </li>
                    </ul>
                    <a href="{{route('site.donation.create')}}" class="donate">
                        <img src="{{asset('Site/imgs/transfusion.svg')}}">
                        <p>طلب تبرع</p>
                    </a>
                </div>
            </div>
        </nav>
    </div>
@endguest
