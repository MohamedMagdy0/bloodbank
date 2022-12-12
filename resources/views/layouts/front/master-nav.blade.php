        <div class="nav-bar">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a class="navbar-brand" href="/">
                        <img src="{{ asset('Front/imgs/logo.png') }}" class="d-inline-block align-top" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item ">
                                <a class="nav-link {{ \Request::route()->getName() == 'home' ? 'active' : '' }}"
                                    href="/" target="_blank">الرئيسية <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item {{ \Request::route()->getName() == 'about' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('about') }}" target="_blank">عن بنك الدم</a>
                            </li>
                            <li class="nav-item {{ \Request::route()->getName() == 'articles' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('articles') }}" target="_blank">المقالات</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ \Request::route()->getName() == 'requests' ? 'active' : '' }}"
                                    href="{{ route('requests') }}" target="_blank">طلبات التبرع</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ \Request::route()->getName() == 'about' ? 'active' : '' }}"
                                    href="{{ route('about') }}" target="_blank">من نحن</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ \Request::route()->getName() == 'contact-us' ? 'active' : '' }}"
                                    href="{{ route('contact-us') }}" target="_blank">اتصل بنا</a>
                            </li>
                        </ul>
{{-- 
                        <div class="dropdown">
                            <button class="btn btn-sm  dropdown-toggle" type="button" data-toggle="dropdown"
                                aria-expanded="false">

                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">login</a>
                                <a class="dropdown-item" href="#">logout</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div> --}}
                        </div>

                        <!--not a member-->
                        <div class="accounts">
                            <a href="{{ route('register-client') }}" class="create" target="_blank">إنشاء حساب جديد</a>
                            <a href="{{ route('login-client') }}" class="signin" target="_blank">الدخول</a>
                        </div>

                        <!--I'm a member

                        <a href="#" class="donate">
                            <img src="imgs/transfusion.svg">
                            <p>طلب تبرع</p>
                        </a>

                        -->

                    </div>
                </div>
            </nav>
        </div>
