@extends('layouts.dashboard.app_master')
@section('page_title')
    Settings
@endsection

@section('content')

    <section class="container">
        <div class="card">
            <div class="card-header text-center">
                <h3>All Settings </h3>
            </div><!-- card-header -->


            @if ($settings)
                <div class="card-body">


                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            <h3>{{ session('success') }}</h3>
                        </div>
                    @endif



                    <table class="table table-responsive  text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>About App Text</th>
                                <th>About Us Text</th>
                                <th>Contact Phone</th>
                                <th>Contact Email</th>
                                <th>Contact Fax</th>
                                <th>Intro Text</th>
                                <th>Market Text For Apps</th>
                                <th>Notification Setting Text</th>

                                <th>Facebook Link</th>
                                <th>Instagram Link</th>
                                <th>Twitter Link</th>
                                <th>Youtube Link</th>
                                <th>Whatsapp Link</th>
                                <th>App Store Link</th>
                                <th>Google Play Link</th>

                                <th>Edit</th>
                                {{-- <th>Delete</th> --}}
                            </tr>
                        </thead>
                        <tbody>

                            {{-- @php($index=1) --}}
                            {{-- @foreach ($settings as $setting) --}}

                            <tr>
                                <td>{{ $settings->id }}</td>
                                <td>{{ $settings->about_app_text }}</td>
                                <td>{{ $settings->about_us_text }}</td>
                                <td>{{ $settings->contact_phone }}</td>
                                <td>{{ $settings->contact_email }}</td>
                                <td>{{ $settings->contact_fax }}</td>
                                <td>{{ $settings->intro_text }}</td>
                                <td>{{ $settings->market_text }}</td>
                                <td>{{ $settings->notification_setting_text }}</td>

                                <td>{{ $settings->fb_link }}</td>
                                <td>{{ $settings->insta_link }}</td>
                                <td>{{ $settings->tw_link }}</td>
                                <td>{{ $settings->youtube_link }}</td>
                                <td>{{ $settings->whatsapp_link }}</td>
                                <td>{{ $settings->app_store_link }}</td>
                                <td>{{ $settings->google_play_link }}</td>

                                <td><a href="{{ route('settings.edit', ['id' => $settings->id]) }}"
                                        class="btn btn-sm btn-success">Edit</a></td>


                            </tr>


                        </tbody>
                    </table>


                </div><!-- card-body -->
            @else
                <div class="alert alert-dark text-center">
                    <h1>NO SETTING</h1>
                </div>
            @endif


            <div class="card-footer ">
            </div><!-- card-footer -->

        </div><!-- card -->




    </section><!-- container -->



@endsection
