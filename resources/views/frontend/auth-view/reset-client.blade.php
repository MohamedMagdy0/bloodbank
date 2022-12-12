@extends('layouts.front.front-master',['bodyClass' => 'home'])
@section('page_title')
    Reset Password
@endsection

@section('content')


    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('نسيت كلمة المرور') }}</div>

                    <div class="card-body">


                        <div class="card-body">

                            @if (session('success'))
                                <div class="alert alert-success text-center">
                                    <h3>{{ session('success') }}</h3>
                                </div>
                            @endif

                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                            <form method="POST" action="{{ route('reset-client.link') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            required autocomplete="email" autofocus placeholder="البريد الالكتروني">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('ارسال رمز التحقق') }}
                                        </button>
                                    </div>
                                </div>
                            </form>



                        </div>
                    </div><!-- card-body -->
                </div>
            </div>
        </div>



    @endsection
