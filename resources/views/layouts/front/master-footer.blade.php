   <!--footer-->
        <div class="footer">
            <div class="inside-footer">
                <div class="container">
                    <div class="row">
                        <div class="details col-md-4">
                            <img src="{{ asset('Front/imgs/logo.png') }}">
                            <h4>بنك الدم</h4>
                            <p>{{ $settings->about_app_text }}</p>
                        </div>
                        <div class="pages col-md-4">
                            <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action {{ (\Request::route()->getName() == 'home') ? 'active' : '' }}" id="list-home-list" href="/"  role="tab" aria-controls="home"  target="_blank">الرئيسية</a>
                                <a class="list-group-item list-group-item-action {{ (\Request::route()->getName() == 'about') ? 'active' : '' }}" id="list-profile-list" href="{{ route('about') }}" role="tab" aria-controls="profile" target="_blank">عن بنك الدم</a>
                                <a class="list-group-item list-group-item-action {{ (\Request::route()->getName() == 'articles') ? 'active' : '' }}" id="list-messages-list" href="{{ route('articles') }}" role="tab" aria-controls="messages" target="_blank">المقالات</a>
                                <a class="list-group-item list-group-item-action {{ (\Request::route()->getName() == 'requests') ? 'active' : '' }}" id="list-settings-list" href="{{ route('requests') }}" role="tab" aria-controls="settings" target="_blank">طلبات التبرع</a>
                                <a class="list-group-item list-group-item-action {{ (\Request::route()->getName() == 'about') ? 'active' : '' }}" id="list-settings-list" href="{{ route('about') }}" role="tab" aria-controls="settings" target="_blank">من نحن</a>
                                <a class="list-group-item list-group-item-action {{ (\Request::route()->getName() == 'contact-us') ? 'active' : '' }}" id="list-settings-list" href="{{ route('contact-us') }}" role="tab" aria-controls="settings" target="_blank">اتصل بنا</a>
                            </div>
                        </div>
                        <div class="stores col-md-4">
                            <div class="availabe">
                                <p>متوفر على</p>
                                <a href="{{ $settings->app_store_link }}" target="_blank">
                                    <img src="{{ asset('Front/imgs/google1.png') }}">
                                </a>
                                <a href="{{ $settings->google_play_link }}" target="_blank">
                                    <img src="{{ asset('Front/imgs/ios1.png') }}">
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
                               <a href="{{ $settings->fb_link }}" class="facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="{{ $settings->insta_link }}" class="instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="{{ $settings->tw_link }}" class="twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="{{ $settings->whatsapp_link }}" class="whatsapp" target="_blank"><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                        <div class="rights col-md-8">
                            <p>جميع الحقوق محفوظة لـ <span>بنك الدم</span> &copy; {{ date('Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="{{ asset('Front/assets/js/bootstrap.bundle.js') }}"></script>
        <script src="{{ asset('Front/assets/js/bootstrap.bundle.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> --}}

        <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js" integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k" crossorigin="anonymous"></script>

        <script src="{{ asset('Front/assets/js/owl.carousel.min.js') }}"></script>

        <script src="{{ asset('Front/assets/js/main.js') }}"></script>

        @stack('scripts')

        {{-- Here --}}

    </body>
</html>
