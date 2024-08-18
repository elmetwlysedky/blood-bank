 <!--footer-->
        <div class="footer">
            <div class="inside-footer">
                <div class="container">
                    <div class="row">
                        <div class="details col-md-4">
                            <img src="{{asset('Site/imgs/logo.png')}}">
                            <h4>بنك الدم</h4>
                            <p>{{$about->value}}</p>
                        </div>
                        <div class="pages col-md-4">
                            <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action" id="list-home-list" href="index.html" role="tab" aria-controls="home">الرئيسية</a>
                                <a class="list-group-item list-group-item-action" id="list-profile-list" href="#" role="tab" aria-controls="profile">عن بنك الدم</a>
                                <a class="list-group-item list-group-item-action" id="list-messages-list" href="#" role="tab" aria-controls="messages">المقالات</a>
                                <a class="list-group-item list-group-item-action" id="list-settings-list" href="donation-requests.html" role="tab" aria-controls="settings">طلبات التبرع</a>
                                <a class="list-group-item list-group-item-action" id="list-settings-list" href="who-are-us.html" role="tab" aria-controls="settings">من نحن</a>
                                <a class="list-group-item list-group-item-action" id="list-settings-list" href="contact-us.html" role="tab" aria-controls="settings">اتصل بنا</a>
                            </div>
                        </div>
                        <div class="stores col-md-4">
                            <div class="availabe">
                                <p>متوفر على</p>
                                <a href="#">
                                    <img src="{{asset('Site/imgs/google1.png')}}">
                                </a>
                                <a href="#">
                                    <img src="{{asset('Site/imgs/ios.png')}}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="other">
                <div class="container">
                    <div class="row">
                        <div class="social col-md-4">
                            <div class="icons">
                                <a href="{{$facebook->value}}" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="{{$instagram->value}}" class="instagram"><i class="fab fa-instagram"></i></a>
                                <a href="{{$twitter->value}}" class="twitter"><i class="fab fa-twitter"></i></a>
                                <a href="{{$whats_app->value}}" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                        <div class="rights col-md-8">
                            <p>جميع الحقوق محفوظة لـ <span>بنك الدم</span> &copy; 2019</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{asset('Site/assets/js/jquery-3.5.1.min.js')}}"></script>

        <script src="{{asset('Site/assets/js/bootstrap.bundle.js')}}"></script>
        <script src="{{asset('Site/assets/js/bootstrap.bundle.min.js')}}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

        <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js" integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k" crossorigin="anonymous"></script>

        <script src="{{asset('Site/assets/js/owl.carousel.min.js')}}"></script>

        <script src="{{asset('Site/assets/js/main.js')}}"></script>

 @yield('script')
    </body>
</html>

