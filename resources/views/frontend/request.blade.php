@extends('layouts.front.front-master',['pageClass'=>'inside-request'])
@section('page_title')
    Request
@endsection
{{-- @inject('bloodTypes', 'App\Models\BloodType') --}}
{{-- @inject('posts', 'App\Models\Post') --}}
{{-- @inject('cities', 'App\Models\City') --}}
{{-- @inject('donations', 'App\Models\DonationRequest') --}}

@section('content')


        <!--ask-donation-->
        <div class="ask-donation">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('requests') }}">طلبات التبرع</a></li>
                            <li class="breadcrumb-item active" aria-current="page">طلب التبرع: احمد محمد</li>
                        </ol>
                    </nav>
                </div>



                <div class="details">
                    <div class="person">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="inside">
                                    <div class="info">
                                        <div class="dark">
                                            <p>الإسم</p>
                                        </div>
                                        <div class="light">
                                            <p>{{ $donation->patient_name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inside">
                                    <div class="info">
                                        <div class="dark">
                                            <p>فصيلة الدم</p>
                                        </div>
                                        <div class="light">
                                            <p dir="ltr">{{ $donation->blood_type_id }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="inside">
                                    <div class="info">
                                        <div class="dark">
                                            <p>العمر</p>
                                        </div>
                                        <div class="light">
                                            <p>{{ $donation->patient_age }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inside">
                                    <div class="info">
                                        <div class="dark">
                                            <p>عدد الأكياس المطلوبة</p>
                                        </div>
                                        <div class="light">
                                            <p>{{ $donation->bags_num }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="inside">
                                    <div class="info">
                                        <div class="dark">
                                            <p>المشفى</p>
                                        </div>
                                        <div class="light">
                                            <p>{{ $donation->hospital_name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inside">
                                    <div class="info">
                                        <div class="dark">
                                            <p>رقم الجوال</p>
                                        </div>
                                        <div class="light">
                                            <p>{{ $donation->patient_phone }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="inside">
                                    <div class="info">
                                        <div class="special-dark dark">
                                            <p>عنوان المشفى</p>
                                        </div>
                                        <div class="special-light light">
                                            <p>{{ $donation->hospital_address }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="details-button">
                            <a href="#">التفاصيل</a>
                        </div> --}}
                    </div>
                    <div class="text">
                        <p>{{ $donation->notes }}</p>
                    </div>
                    <div class="location">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3418.0770797767814!2d31.409187284906096!3d31.051953681527007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f79db9d4d56311%3A0x69ad97566dc9bd76!2z2YXYs9iq2LTZgdmJINin2YTYrtmK2LE!5e0!3m2!1sar!2seg!4v1597910005047!5m2!1sar!2seg" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>


            </div>
        </div>


@endsection


