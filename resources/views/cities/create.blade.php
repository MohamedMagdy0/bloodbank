@extends('layouts.dashboard.app_master')
@section('page_title')
    Create City
@endsection
@section('content')

    <section class="container">
        <div class="card ">

            <div class="card-header ">
                <h1 class="text-center">Create City</h1>
            </div><!-- card-header -->

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


             <!-- form start -->
            <form action="{{ route('cities.store') }}" method="post">
                @csrf
                  <div class="City mb-3">
                    <label>City Name</label>
                    <input type="text" name="name" class="form-control form-control-lg"  placeholder="City Name">
                  </div><!-- City Name -->

                  <div class="governorate_id mb-3">
                    <label>Governorate Name</label>
                        <select class="form-control form-control-lg" name="governorate_id">
                            <option>Select Governorate</option>

                            @foreach ($governorates as $governorate)
                                <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>
                            @endforeach

                        </select>
                    </div><!-- governorate_id -->

                <div class="mx-auto text-center">
                    <button type="submit" class="btn btn-lg btn-dark text-white">Create City</button>
                </div><!-- btn -->

              </form><!-- end form -->

            </div><!-- card-body -->

            <div class="card-footer ">
            </div><!-- card-footer  -->

        </div><!-- card -->
    </section><!-- container -->
@endsection
