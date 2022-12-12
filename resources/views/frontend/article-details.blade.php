@extends('layouts.front.front-master',['pageClass'=>'article-details'])
@section('page_title')
    Artical Details
@endsection


@section('content')

    <!--inside-article-->
        <div class="inside-article">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('articles') }}">المقالات</a></li>
                            <li class="breadcrumb-item active" aria-current="page">الوقاية من الأمراض</li>
                        </ol>
                    </nav>
                </div>
                <div class="article-image">
                    <img src="{{ Storage::url($post->image) }}">
                </div>
                <div class="article-title col-12">
                    <div class="h-text col-6">
                        <h4>{{ $post->name }}</h4>
                    </div>
                    <div class="icon col-6">
                        {{-- <button type="button"><i class="far fa-heart"></i></button> --}}
                    </div>
                </div>

                <!--text-->
                <div class="text">
                    <p>{{ $post->content }}</p> <br>

                </div>

                <!--articles-->
                {{-- <div class="articles">
                    <div class="title">
                        <div class="head-text">
                            <h2>مقالات ذات صلة</h2>
                        </div>
                    </div>
                    <div class="view">
                        <div class="row">
                            <!-- Set up your HTML -->
                            <div class="owl-carousel articles-carousel">
                                <div class="card">
                                    <div class="photo">
                                        <img src="{{ $post->content }}" class="card-img-top" alt="...">
                                        <a href="{{ route('article', ['id'=>$post->id]) }}" class="click">المزيد</a>
                                    </div>
                                    <a href="#" class="favourite">
                                        <i class="far fa-heart"></i>
                                    </a>

                                    <div class="card-body">
                                        <h5 class="card-title">{{ $post->name }}</h5>
                                        <p class="card-text">{{ $post->content }}</p>
                                    </div>
                                </div><!-- 1 -->
                                <div class="card">
                                    <div class="photo">
                                        <img src="imgs/p2.jpg" class="card-img-top" alt="...">
                                        <a href="article-details.html" class="click">المزيد</a>
                                    </div>
                                    <a href="#" class="favourite">
                                        <i class="far fa-heart"></i>
                                    </a>

                                    <div class="card-body">
                                        <h5 class="card-title">طريقة الوقاية من الأمراض</h5>
                                        <p class="card-text">
                                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                                        </p>
                                    </div>
                                </div><!-- 2 -->

                            </div>
                        </div>
                    </div>
                </div><!-- up selles --> --}}

            </div>
        </div>
@endsection
