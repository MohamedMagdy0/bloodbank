@extends('layouts.front.front-master',['pageClass'=>'articals'])
@section('page_title')
        Articals
@endsection

{{-- @inject('bloodTypes', 'App\Models\BloodType') --}}
{{-- @inject('posts', 'App\Models\Post') --}}
{{-- @inject('cities', 'App\Models\City')
@inject('donations', 'App\Models\DonationRequest')
@inject('contacts', 'App\Models\Contact') --}}

@section('content')

    <!--articles-->
    <div class="articles">
        <div class="container title">
            <div class="head-text">
                <h2>المقالات</h2>
            </div>
        </div>
        <div class="view">
            <div class="container">



                <div class="row">
                    <!-- Set up your HTML -->

                            @foreach ($posts as $post)

                            <div class="col-md-4 col-sm-12">


                            <div class="card ">
                                <div class="photo">
                                    <img src="{{ Storage::url($post->image) }}" class="card-img-top" alt="">
                                    {{-- <a href="{{ route('single_request',['id' => $post->id]) }}" class="click" target="_blank">المزيد</a> --}}
                                </div>
                                <a id="{{ $post->id }}" href="{{ route('article', ['id'=>$post->id]) }}" class="favourite">
                                    <i class="far fa-heart"></i>
                                </a>

                                <div class="card-body">
                                    <a href="{{ route('article', ['id'=>$post->id]) }}" class="click" target="_blank">
                                    <h5 class="card-title text-danger">{{ $post->name }}</h5>
                                    <p class="card-text">{{ $post->content }}</p>
                                      المزيد </a>
                                </div>
                            </div><!-- card posts-->
                            </div><!-- col-md-4 -->

                        @endforeach

                </div> <!-- row -->


            </div>
        </div>
    </div>
@endsection
