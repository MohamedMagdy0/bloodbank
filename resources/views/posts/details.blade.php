@extends('layouts.dashboard.app_master')
@section('page_title')
Post Details
@endsection
@section('content')

    <section class="container">
        <div class="card ">
            <div class="card-header text-center  ">

            </div><!-- card-header" -->

            <div class="card-body text-center">

                <div>
                    {{-- <img class="image img-fluid" src="{{ asset( Storage::url($post->image) ) }}" width="200" alt=""> --}}
                    <img class="image img-fluid" src="{{ asset( $post->image ) }}" width="300" alt="">
                </div> <!-- image -->

                <div class="text-center mt-2">
                    <h3>{{ $post->name }} </h3>
                    <h5 class="font-weight-lighter"> {{ $post->content }}</h5>
                    <h6>{{ $post->created_at }} </h6>


                </div>
            </div><!-- card-body" -->

            <div class="card-footer text-center bg-danger py-2 my-1">

            </div><!-- card-body" -->


        </div><!-- card -->
    </section><!-- container -->



@endsection
