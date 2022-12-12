@extends('layouts.dashboard.app_master')
@section('page_title')
    Edit Setting
@endsection
@section('content')

    <section class="container">
        <div class="card">

            <div class="card-header ">
                <h1 class="text-center">Edit Setting</h1>
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
            <form action="{{ route('settings.update') }}" method="post">
                @csrf
                @method('PUT')
                

                  <div class="mb-3">
                    <label>About App Text</label>
                    <input type="text" name="about_app_text" class="form-control form-control-lg" value="{{ $setting->about_app_text }}">
                  </div><!-- about_app_text -->

                  <div class="mb-3">
                    <label>About Us Text</label>
                    <input type="text" name="about_us_text" class="form-control form-control-lg" value="{{ $setting->about_us_text }}">
                  </div><!-- about_us_text -->

                  <div class="mb-3">
                    <label>Contact Phone</label>
                    <input type="text" name="contact_phone" class="form-control form-control-lg"  value="{{ $setting->contact_phone }}">
                  </div><!-- contact_phone -->

                  <div class="mb-3">
                    <label>Contact Email</label>
                    <input type="email" name="contact_email" class="form-control form-control-lg"  value="{{ $setting->contact_email }}">
                  </div><!-- contact_email -->

                    <div class="mb-3">
                      <label>Contact Fax</label>
                      <input type="text" name="contact_fax" class="form-control form-control-lg"  value="{{ $setting->contact_fax }}">
                    </div><!-- contact_fax -->
                    <div class="mb-3">

                      <label>intro Text</label>
                      <input type="text" name="intro_text" class="form-control form-control-lg"  value="{{ $setting->intro_text }}">
                    </div><!-- intro_text -->

                      <label>marketing Text For Apps</label>
                      <input type="text" name="market_text" class="form-control form-control-lg"  value="{{ $setting->market_text }}">
                    </div><!-- market_text -->


                  <div class="mb-3">
                    <label>Notification Setting Text</label>
                    <input type="text" name="notification_setting_text" class="form-control form-control-lg"  value="{{ $setting->notification_setting_text }}">
                  </div><!-- notification_setting_text -->

                  <div class="mb-3">
                    <label>Facebook Link</label>
                    <input type="text" name="fb_link" class="form-control form-control-lg"  value="{{ $setting->fb_link }}">
                  </div><!-- fb_link -->

                  <div class="mb-3">
                    <label>Instagram Link</label>
                    <input type="text" name="insta_link" class="form-control form-control-lg"  value="{{ $setting->insta_link }}">
                  </div><!-- insta_link -->

                  <div class="mb-3">
                    <label>Twitter Link</label>
                    <input type="text" name="tw_link" class="form-control form-control-lg"  value="{{ $setting->tw_link }}">
                  </div><!-- tw_link -->

                  <div class="mb-3">
                    <label>Youtube Link</label>
                    <input type="text" name="youtube_link" class="form-control form-control-lg"  value="{{ $setting->youtube_link }}">
                  </div><!-- youtube_link -->

                  <div class="mb-3">
                    <label>Whatsapp Link</label>
                    <input type="text" name="whatsapp_link" class="form-control form-control-lg"  value="{{ $setting->whatsapp_link }}">
                  </div><!-- whatsapp_link -->

                  <div class="mb-3">
                    <label>App Store  Link</label>
                    <input type="text" name="app_store_link" class="form-control form-control-lg"  value="{{ $setting->app_store_link }}">
                  </div><!-- app_store_link -->

                  <div class="mb-3">
                    <label>Google Play Link</label>
                    <input type="text" name="google_play_link" class="form-control form-control-lg"  value="{{ $setting->app_store_link }}">
                  </div><!-- google_play_link -->


                <div class="mx-auto text-center">
                    <button type="submit" class="btn btn-lg btn-dark text-white">Update Setting</button>
                </div><!-- btn -->

              </form><!-- end form -->

            </div><!-- card-body -->

            <div class="card-footer ">
            </div><!-- card-footer  -->

        </div><!-- card -->
    </section><!-- container -->
@endsection
