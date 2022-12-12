@extends('layouts.front.front-master', ['bodyClass' => 'home'])
@section('page_title')
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Chnage Password') }}</div>



                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
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

                    <form action="{{ route('reset-client.update-pass-client') }}" method="post">
                        @csrf

                        <input type="hidden" name="email" value="{{ $email }}">

                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input name="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                placeholder="New Password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                            <input name="password_confirmation" type="password" class="form-control"
                                id="confirmNewPasswordInput" placeholder="Confirm New Password">
                        </div>

                </div>

                <div class="card-footer">
                    <button class="btn btn-success">Submit</button>
                </div>

                </form>
            </div>
        </div>
    </div>


@endsection
