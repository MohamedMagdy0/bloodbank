<?php

namespace App\Http\Controllers\Frontend;

// use auth;
use App\Models\Post;
use App\Models\Client;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\DonationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class FrontController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth:client-web', ['Except' => 'logout']);
    // }


    public function index(Request $request)
    {
        // dd($request->user());
        // $client = Client::first();
        // auth('client-web')->login($client);

        return view('index');
    } // index


    public function home(Request $request)
    {
        // dd($request->user());
        $client = Client::first();
        auth('client-web')->login($client);

        return view('frontend.home');
    } // home



    public function about()
    {
        return view('frontend.about');
    }// about


    // public function index(Request $request)
    // {
    //     $project = Project::query();
    //     if (request('term')) {
    //         $project->where('name', 'Like', '%' . request('term') . '%');
    //     }

    //     return $project->orderBy('id', 'DESC')->paginate(10);
    // }



    public function search(Request $request)
    {
        // dd( $request)     ;
        $city_id = $request->city_id ;
        $bloodType_id = $request->blood_type_id ;

        $donations = DonationRequest::where(function ($query) use ($city_id, $bloodType_id) {
            if ($city_id) {
                $query->where('city_id', 'like', '%'.$city_id.'%');
            }elseif($bloodType_id) {
                $query->where('blood_type_id', 'like', '%'.$bloodType_id.'%');
            }else{

            }
        })->get();
        // })->toSql();

        // return ($donations);
        return view('frontend.search', compact('donations'));
    } //  search



    public function articles()
    {
        $posts = Post::all();
        return view('frontend.articles',compact('posts'));
    }// articles


    public function article($id)
    {
        $post = Post::findOrFail($id);
        return view('frontend.article-details',compact('post'));
    }// article




    public function donationRequests()
    {
        return view('frontend.requests');
    }// donationRequests


    public function donationReq($id)
    {
        $donation = DonationRequest::findOrFail($id);
        return view('frontend.request', compact('donation'));
    }// donationReq


    public function contactUs()
    {
        $contacts = Contact::get();
        return view('frontend.contactUs', compact('contacts'));
    }// contactUs


    public function contactUsStore(Request $request)
    {
        $request->validate([
         'title_message' => 'required' ,
         'message' => 'required',
        //  'client_id' => 'required' ,
        ]);


    //    , [ 'client_id' => auth('client-web')->id ,]

    $contacts = auth('client-web')->user()->contacts()->create($request->all());

    toastr()->success('تم ارسال البيانات بنجاح');
    return redirect()->route('home');
    }// contactUs





    public function toggleFavourite(Request $request)
    {
        $toggle = auth('client-web')->user()->posts()->toggle($request->post_id);
        return responseJson(1, 'success', $toggle) ;
    }// toggleFavourte




}
