@extends('layouts.dashboard.app_master')
@section('page_title')
    Create Settings
@endsection
@section('content')

    <section class="container">
        <div class="card ">

            <div class="card-header">
                <h1 class="text-center">Create Settings</h1>
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
            <form action="{{ route('settings.store') }}" method="post">
                @csrf


                  <div class="mb-3">
                    <label>About App Text</label>
                    <input type="text" name="about_app_text" class="form-control form-control-lg"  placeholder="about_app_text">
                  </div><!-- about_app_text -->

                  <div class="mb-3">
                    <label>Contact Phone</label>
                    <input type="text" name="contact_phone" class="form-control form-control-lg"  placeholder="Contact Phone">
                  </div><!-- contact_phone -->

                  <div class="mb-3">
                    <label>Contact Email</label>
                    <input type="text" name="contact_email" class="form-control form-control-lg"  placeholder="Contact Email">
                  </div><!-- contact_email -->

                  <div class="mb-3">
                    <label>Notification Setting Text</label>
                    <input type="text" name="notification_setting_text" class="form-control form-control-lg"  placeholder="Notification Setting Text">
                  </div><!-- notification_setting_text -->

                  <div class="mb-3">
                    <label>Facebook Link</label>
                    <input type="text" name="fb_link" class="form-control form-control-lg"  placeholder="Facebook Link">
                  </div><!-- fb_link -->

                  <div class="mb-3">
                    <label>Instagram Link</label>
                    <input type="text" name="insta_link" class="form-control form-control-lg"  placeholder="Instagram Link">
                  </div><!-- insta_link -->

                  <div class="mb-3">
                    <label>Twitter Link</label>
                    <input type="text" name="tw_link" class="form-control form-control-lg"  placeholder="Twitter Link">
                  </div><!-- tw_link -->

                  <div class="mb-3">
                    <label>Youtube Link</label>
                    <input type="text" name="youtube_link" class="form-control form-control-lg"  placeholder="Youtube Link">
                  </div><!-- youtube_link -->



                <div class="mx-auto text-center">
                    <button type="submit" class="btn btn-lg btn-dark text-white">Create Setting</button>
                </div><!-- btn -->

              </form><!-- end form -->

            </div><!-- card-body -->

            <div class="card-footer">
            </div><!-- card-footer  -->

        </div><!-- card -->
    </section><!-- container -->
@endsection
