@extends('layouts.front.front-master')
@section('page_title')
    Search
@endsection

@inject('bloodTypes', 'App\Models\BloodType')
@inject('posts', 'App\Models\Post')
@inject('cities', 'App\Models\City')

@inject('contacts', 'App\Models\Contact')

@section('content')






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
                    @csrf

                    <div class="col-md-5 blood">
                        <div class="form-group">
                            <div class="inside-select">
                                <select name="blood_type_id" class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>اختر فصيلة الدم</option>
                                    @foreach ($donations as $bloodType)
                                        <option value="{{ $bloodType->blood_type_id }}">{{ $bloodType->bloodType->name }}</option>
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
                                    @foreach ($donations as $city)
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
                            <!-- hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhere -->
                        </div><!-- details patient -->
                    @endforeach

                    <div class="more">
                        <a href="{{ route('requests') }}" target="_blank">المزيد</a>
                        <!-- hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhere -->
                    </div>
                </div>
            </div>
        </div>



        <!-- footer -->
        {{-- @include('layouts.front.master-footer') --}}

@endsection
