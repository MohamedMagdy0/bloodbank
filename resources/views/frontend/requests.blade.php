@extends('layouts.front.front-master',['pageClass'=>'articals'])
@section('page_title')
    Requests
@endsection
@inject('bloodTypes', 'App\Models\BloodType')
@inject('posts', 'App\Models\Post')
@inject('cities', 'App\Models\City')
@inject('donations', 'App\Models\DonationRequest')
@inject('contacts', 'App\Models\Contact')

@section('content')

    <!--inside-article-->
    <div class="all-requests">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">طلبات التبرع</li>
                    </ol>
                </nav>
            </div>

            <!--requests-->
            <div class="requests">
                <div class="head-text">
                    <h2>طلبات التبرع</h2>
                </div>
                <div class="content">
                        <!-- form -->
               <form method="get" action="{{ route('home-search') }}" class="row filter">

                        <div class="col-md-5 blood">
                            <div class="form-group">
                                <div class="inside-select">
                                    <select name="name" class="form-control" id="exampleFormControlSelect1">
                                        <option selected disabled>اختر فصيلة الدم</option>
                                        @foreach ($bloodTypes->get() as $bloodType)
                                            <option value="{{ $bloodType->id }}">{{ $bloodType->name }}</option>
                                        @endforeach
                                    </select>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div><!-- bloodtype -->
                        <div class="col-md-5 city">
                            <div class="form-group">
                                <div class="inside-select">
                                    <select name="name" class="form-control" id="exampleFormControlSelect1">
                                        <option selected disabled>اختر المدينة</option>
                                        @foreach ($cities->get() as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div><!-- city -->
                        <div class="col-md-1 search">
                            <button type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
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
                            <a href="{{ route('single_request', ['id'=>$donation->id]) }}">التفاصيل</a>
                        </div>

                      @endforeach
                    </div>
                    <div class="pages">
                        <nav aria-label="Page navigation example" dir="ltr">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">6</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- pages -->
                </div>
            </div>
        </div>
    </div>




@endsection
