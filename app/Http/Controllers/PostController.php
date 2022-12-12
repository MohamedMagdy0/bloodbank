<?php

namespace App\Http\Controllers;
// use  Illuminate\Validation\Validator;
use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostUpdateRequest;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::paginate(10) ;
        return view('posts.index',compact('posts')) ;
    } //  index


    public function create()
    {
      $posts = Post::get();
      return view('posts.create',compact('posts'))->with('categories',Category::get()) ;
    }  //  create



    public function store(PostRequest $request)
    {
        // validation

        // image
        $path = $request->image->store('/public/images/posts') ;

        // store
        $post = new Post ;
        $post->name =  $request->name ;
        $post->image =$path ;
        $post->content = $request->content ;
        $post->category_id = $request->category_id ;
        $post->save() ;

        // return
        toastr()->success('تم حفظ البيانات بنجاح');
        return redirect()->route('posts.index');

    }  //  store


    public function show($post)
    {
        $post = Post::findOrFail($post);
        return view('posts.details',compact('post'));
    }  // show



    public function edit($post)
    {
        $post = Post::findOrFail($post);
        return view('posts.edit',compact('post'))->with('categories',Category::get()) ;
    } // edit




    public function update(PostUpdateRequest $request, $post)
    {
        $post = Post::findOrFail($post);

        // image
        $oldImage = $post->image ;

        if ($request->file('image')) {
            $path = $request->image->store('/public/images/posts') ;

        $oldImage = $post->image ;
        if (Storage::exists($oldImage)) {
            Storage::delete($oldImage);
        };

        } else {
            $path = $post->image ;
        }

        // store
        $post->image = $path ;
        $post->name = $request->name ;
        $post->content = $request->content ;
        $post->category_id = $request->category_id ;
        $post->save();

        // return
        toastr()->warning('تم تحديث البيانات بنجاح');
        return redirect()->route('posts.index');
    } //  update





 // start softDelete

    public function softDelete($id)
    {
        $posts = Post::findOrFail($id)->delete();
        toastr()->error('تم حذف البيانات بنجاح');
        return redirect()->route('posts.index');
    }  //  softDelete


    public function postTrash()
    {
        $posts = Post::onlyTrashed()->paginate(10);
        return view('posts.trash',compact('posts'));
    }  //  postTrash


    public function postRestore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();
        toastr()->warning('تم ارجاع البيانات بنجاح');
        return redirect()->route('posts.index');
    }  // postRestore


    public function destroy($post)
    {
        $post = Post::withTrashed()->FindOrFail($post);
        $post->forceDelete();

         $oldImage = $post->image ;
        if (Storage::exists($oldImage)) {
            Storage::delete(($oldImage));
        };

        toastr()->warning('تم حذف البيانات بنجاح');
        return redirect()->route('posts.index');
    } //  destroy
}
