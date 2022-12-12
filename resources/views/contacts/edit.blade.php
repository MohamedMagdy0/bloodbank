@extends('layouts.dashboard.app_master')
@section('page_title')
    Edit Contacts
@endsection
@section('content')

    <section class="container">
        <div class="card">

            <div class="card-header ">
                <h1 class="text-center">Edit Contacts</h1>
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
            <form action="{{ route('contacts.update', ['id'=>$contact->id]) }}" method="post">
                @csrf
                @method('PUT')


                <div class="City mb-3">
                    <label>Title Message</label>
                    <input type="text" name="title_message" class="form-control form-control-lg" value="{{ $contact->title_message }}">
                  </div><!-- contacts title_message -->

                  <div class="City mb-3">
                    <label>Message</label>
                    <input type="text" name="message" class="form-control form-control-lg" value="{{ $contact->message }}">
                  </div><!-- contacts message -->




                <div class="mx-auto text-center">
                    <button type="submit" class="btn btn-lg btn-dark text-white">Update contact</button>
                </div><!-- btn -->

              </form><!-- end form -->

            </div><!-- card-body -->

            <div class="card-footer ">
            </div><!-- card-footer  -->

        </div><!-- card -->
    </section><!-- container -->
@endsection
