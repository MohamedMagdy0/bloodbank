@extends('layouts.front.front-master', ['bodyClass' => 'home'])
@section('page_title')
    Home
@endsection

@inject('bloodTypes', 'App\Models\BloodType')
@inject('posts', 'App\Models\Post')
@inject('cities', 'App\Models\City')
@inject('donations', 'App\Models\DonationRequest')
@inject('contacts', 'App\Models\Contact')

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

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
                            <p>{{ $settings->about_app_text }} </p>
                            <a href="{{ route('about') }}">المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item carousel-2">
                    <div class="container info">
                        <div class="col-lg-5">
                            <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                            <p>{{ $settings->about_app_text }} </p>
                            <a href="{{ route('about') }}">المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item carousel-3">
                    <div class="container info">
                        <div class="col-lg-5">
                            <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                            <p>{{ $settings->about_app_text }} </p>
                            <a href="{{ route('about') }}" target="_blank">المزيد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--about-->
    <div class="about">
        <div class="container">
            <div class="col-lg-6 text-center">
                <p>
                    <span>بنك الدم</span>{{ $settings->intro_text }}
                </p>
            </div>
        </div>
    </div>

    <!--articles-->
    <div class="articles">
        <div class="container title">
            <div class="head-text">
                <h2>المقالات</h2>
            </div>
        </div>
        <div class="view">
            <div class="container">



                <div class="row">
                    <!-- Set up your HTML -->
                    <div class="owl-carousel articles-carousel">
                        @foreach ($posts->take(9)->get() as $post)
                            <div class="card">
                                <div class="photo">
                                    <img src="{{ Storage::url($post->image) }}" class="card-img-top" alt="...">
                                    <a href="{{ route('articles') }}" class="click" target="_blank">المزيد</a>
                                </div>
                                <a class="favourite">
                                    <i id="{{ $post->id }}" onclick="toggleFavourite(this)"
                                        class="first-heart  far fa-heart {{ $post->is_favourite ? 'first-heart' : 'second-heart' }}"></i>
                                </a>

                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->name }}</h5>
                                    <p class="card-text">{{ $post->content }}</p>
                                </div>
                            </div><!-- card posts-->
                        @endforeach
                    </div><!-- owl-carousel -->
                </div> <!-- row -->


            </div>
        </div>
    </div>


    <!--requests-->
    <div class="requests">
        <div class="container">
            <div class="head-text">
                <h2>طلبات التبرع</h2>
            </div>
        </div>
        <div class="content">
            <div class="container">

                <!-- form -->
                <form method="get" action="{{ route('home-search') }}" class="row filter">
                    {{-- @csrf --}}

                    <div class="col-md-5 blood">
                        <div class="form-group">
                            <div class="inside-select">
                                <select name="blood_type_id" class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>اختر فصيلة الدم</option>
                                    @foreach ($donations->get() as $bloodType)
                                        <option value="{{ $bloodType->blood_type_id }}">{{ $bloodType->bloodType->name }}
                                        </option>
                                    @endforeach

                                </select>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                    </div> <!-- end bloodTypes -->
                    <div class="col-md-5 city">
                        <div class="form-group">
                            <div class="inside-select">
                                <select name="city_id" class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>اختر المدينة</option>
                                    @foreach ($donations->get() as $city)
                                        <option value="{{ $city->city_id }}">{{ $city->city->name }}</option>
                                    @endforeach

                                </select>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                    </div><!-- end city -->
                    <div class="col-md-1 search">
                        <button type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div><!-- end search -->

                </form>

                <div class="patients">
                    @foreach ($donations->all() as $donation)
                        <div class="details">
                            <div class="blood-type">
                                <h2 dir="ltr">{{ $donation->bloodType->name }}</h2>
                            </div>
                            <ul>
                                <li><span>اسم الحالة:</span> {{ $donation->patient_name }} </li>
                                <li><span>مستشفى:</span> {{ $donation->hospital_name }} </li>
                                <li><span>المدينة:</span> {{ $donation->city->name }} </li>
                            </ul>
                            <a href="{{ route('single_request', ['id' => $donation->id]) }}" target="_blank">التفاصيل</a>

                        </div><!-- details patient -->
                    @endforeach

                    <div class="more">
                        <a href="{{ route('requests') }}" target="_blank">المزيد</a>

                    </div>
                </div>
            </div>
        </div>

        <!--contact-->
        <div class="contact">
            <div class="container">
                <div class="col-md-7">
                    <div class="title">
                        <h3>اتصل بنا</h3>
                    </div>
                    <p class="text">يمكنك الإتصال بنا للإستفسار عن معلومة وسيتم الرد عليكم</p>
                    <div class="row whatsapp">
                        <a href="{{ $settings->whatsapp_link }}" target="_blank">
                            <img src="{{ asset('Front/imgs/whats.png') }}">
                            <p dir="ltr">{{ $settings->contact_phone }}</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!--app-->
        <div class="app">
            <div class="container">
                <div class="row">
                    <div class="info col-md-6">
                        <h3>تطبيق بنك الدم</h3>
                        <p>{{ $settings->market_text }}</p>
                        <div class="download">
                            <h4>متوفر على</h4>
                            <div class="row stores">
                                <div class="col-sm-6">
                                    <a href="{{ $settings->google_play_link }}" target="_blank">
                                        <img src="{{ asset('Front/imgs/google.png') }}">
                                    </a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="{{ $settings->app_store_link }}" target="_blank">
                                        <img src="{{ asset('Front/imgs/ios.png') }}">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="screens col-md-6">
                        <img src="{{ asset('Front/imgs/App.png') }}">
                    </div>
                </div>
            </div>
        </div>



        <!-- ajax -->

        @push('scripts')
            <script>
                function toggleFavourite(heart) {
                    // alert();
                    var post_id = heart.id;

                    $.ajax({
                        url: "{{ url(route('toggle-favourite')) }}",
                        type: 'post',
                        data: {
                            _token: "{{ csrf_token() }}",
                            post_id: post_id
                        },

                        success: function(data) {
                            if (data.status == 1) {

                                var toggleBtn = $(heart).attr('class');

                                if (toggleBtn.includes('first')) {

                                    $(heart).removeClass('first-heart').addClass('second-heart');
                                } else {
                                    $(heart).removeClass('second-heart').addClass('first-heart')
                                } // if(toggleBtn....)

                            } // if(data.status == 1)

                        }, // success

                        error: function(jqXhr, textStatus, errorMessage) {
                            alert(errorMessage);
                        } // error

                    }); // ajax

                } // toggleFavourite
            </script>
        @endpush
    @endsection
