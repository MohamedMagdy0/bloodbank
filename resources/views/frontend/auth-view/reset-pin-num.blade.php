@extends('layouts.front.front-master')
@section('page_title')
    Reset PIN
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

                            <form method="POST" action="{{ route('reset-client.pin-num-check') }}">
                                @csrf
                                {{-- <input type="hidden" name="{{ client_id }}" > --}}

                                <div class="row mb-3">
                                    <label for="pin_num"
                                        class="col-md-4 col-form-label text-md-end">{{ __('رمز التحقق') }}</label>

                                    <div class="col-md-6">
                                        <input id="pin_num" type="text"
                                            class="form-control @error('pin_num') is-invalid @enderror" name="pin_num"
                                            value="{{ old('pin_num') }}" required autocomplete="pin_num" autofocus>

                                        @error('pin_num')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><!-- pin_num -->


                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __(' البريد الالكتروني') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="text"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><!-- email -->


                                <div class="row mb-3">
                                    <label for="phone"
                                        class="col-md-4 col-form-label text-md-end">{{ __('الجوال ') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="text"
                                            class="form-control @error('phone') is-invalid @enderror" name="phone"
                                            value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><!-- phone -->



                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __(' ارسال البيانات') }}
                                        </button>
                                    </div>
                                </div>
                            </form>



                        </div>
                    </div>
                </div>
            </div>
        </div>



    @endsection
