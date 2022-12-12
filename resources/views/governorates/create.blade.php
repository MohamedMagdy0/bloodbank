@extends('layouts.dashboard.app_master')
@section('page_title')
    Create Governorate
@endsection
@section('content')

    <section class="container">
        <div class="card ">

            <div class="card-header ">
                <h1 class="text-center">Create Governorate</h1>
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
            <form action="{{ route('governorates.store') }}" method="post">
                @csrf
                  <div class="Governorate mb-3">
                    <label>Governorate Name</label>
                    <input type="text" name="name" class="form-control form-control-lg"  placeholder="Governorate Name">
                  </div><!-- Governorate -->

                <div class="mx-auto text-center">
                    <button type="submit" class="btn btn-lg btn-dark text-white">Create Governorate</button>
                </div><!-- btn -->

              </form><!-- end form -->

            </div><!-- card-body -->

            <div class="card-footer ">
            </div><!-- card-footer  -->

        </div><!-- card -->
    </section><!-- container -->
@endsection
