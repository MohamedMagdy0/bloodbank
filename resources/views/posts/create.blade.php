@extends('layouts.dashboard.app_master')
@section('page_title')
    Create Post
@endsection
@section('content')

    <section class="container">
        <div class="card ">

            <div class="card-header ">
                <h1 class="text-center">Create Post</h1>
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
            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                  <div class=" mb-3">
                    <label>Name </label>
                    <input type="text" name="name" class="form-control form-control-lg"  placeholder="Name">
                  </div><!-- Post name -->

                  <div class=" mb-3">
                    <label> Content </label>
                    <textarea type="text" name="content" rows="3" class="form-control form-control-lg"  placeholder="Content"></textarea>
                  </div><!-- Post content -->


                  <div class="image mb-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control form-control-lg"  placeholder="Image">
                  </div><!-- Post image -->


                  <div class="Category mb-3">
                    <label>Category Name</label>
                        <select class="form-control form-control-lg" name="category_id">

                            <option>Select Category</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                        </select>
                    </div><!-- category_id -->



                <div class="mx-auto text-center">
                    <button type="submit" class="btn btn-lg btn-dark text-white">Create Category</button>
                </div><!-- btn -->

              </form><!-- end form -->

            </div><!-- card-body -->

            <div class="card-footer ">
            </div><!-- card-footer  -->

        </div><!-- card -->
    </section><!-- container -->
@endsection
