@extends('layouts.dashboard.app_master')
@section('page_title')
    Edit Governorate
@endsection
@section('content')

    <section class="container">
        <div class="card ">

            <div class="card-header ">
                <h1 class="text-center">Edit Governorate</h1>
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
            <form action="{{ route('governorates.update', ['governorate'=>$governorate->id]) }}" method="post">
                @csrf
                @method('PUT')
                  <div class="Governorate mb-3">
                    <label>Governorate Name</label>
                    <input type="text" name="name" class="form-control form-control-lg" value="{{ $governorate->name }}">
                  </div><!-- Governorate -->

                <div class="mx-auto text-center">
                    <button type="submit" class="btn btn-lg btn-dark text-white">Update Governorate</button>
                </div><!-- btn -->

              </form><!-- end form -->

            </div><!-- card-body -->

            <div class="card-footer ">
            </div><!-- card-footer  -->

        </div><!-- card -->
    </section><!-- container -->
@endsection
