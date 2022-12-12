@extends('layouts.dashboard.app_master')
@section('page_title')
Donations Details
@endsection
@section('content')

    <section class="container">
        <div class="card ">
            <div class="card-header text-center  ">

            </div><!-- card-header" -->

            <div class="card-body text-center">



                <div class="text-center mt-2">

                    <h3>{{ $donation->patient_name }} </h3>
                    <h3 > {{ $donation->patient_phone }}</h3>
                    <h3>{{ $donation->patient_age }} </h3>

                    <h3>{{ $donation->hospital_name }} </h3>
                    <h3>{{ $donation->hospital_address }} </h3>

                    <h5 > {{ $donation->bags_num }}</h5>

                    <h5 > {{ $donation->latitude }}</h5>
                    <h5 > {{ $donation->longitude }}</h5>
                    <h5 > {{ $donation->notes }}</h5>

                    <h6>{{ $donation->governorate_id }} </h6>
                    <h6>{{ $donation->city_id }} </h6>
                    <h6>{{ $donation->blood_type_id }} </h6>
                    <h6>{{ $donation->client_id }} </h6>

                    <h6>{{ $donation->created_at }} </h6>


                </div>
            </div><!-- card-body" -->

            <div class="card-footer text-center bg-danger py-2 my-1">

            </div><!-- card-body" -->


        </div><!-- card -->
    </section><!-- container -->



@endsection
