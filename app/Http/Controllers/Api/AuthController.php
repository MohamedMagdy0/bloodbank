<?php

namespace App\Http\Controllers\Api;

use Response;

// use responseJson;



use App\Models\City;

use App\Models\Post;

use App\Models\Token;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Setting;

use App\Models\Category;
use App\Models\BloodType;
use App\Mail\ResetPassword;

use App\Models\Governorate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DonationRequest;



// use App\Models\BloodType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
// use App\magdy\myclasses\responseJson;
use Illuminate\Support\Facades\Mail;
use App\magdy\myclasses\responseJson;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:clients' ,
            'phone' => 'required|numeric' ,
            'password' => 'required|confirmed|min:8' ,
            'email' => 'required|unique:clients' ,
            'd_o_b' => 'required' ,
            'pin_num' => 'numeric' ,
            'last_donation_date' => 'required' ,
            'blood_type_id' => 'required' , //'required|in:O-,O+,A-,A+,B-,B+,AB-,AB+'
            'city_id' => 'required|exists:cities,id' ,
            // 'governorate_id' => 'required|exists:governorates,id' ,

        ]);

        if ($validator->fails()) {
            return responseJson(0,$validator->errors()->first(),$validator->errors());
        }

        $request-> merge(['password'=> bcrypt($request->password)]);
        $client = Client::create($request->all());
        $client->api_token = Str::random(60);
        $client->save();



        return responseJson(1,'success',[
        'api_token' => $client->api_token ,
        'client' => $client ,
        ]
    );

    } // register



    public function login(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'phone' => 'required|numeric' ,
            'password' => 'required|min:8' ,
        ]);

        if ($validator->fails()) {
            return responseJson(0,$validator->errors()->first(),$validator->errors());
        }

        // $auth = auth()->guard('api')->validate($request->all());
        $client = Client::where('phone',$request->phone)->first();

        if ($client){

                if (Hash::check( $request->password, $client->password))  {
                    return responseJson(1,'success',[
                        'api_token' => $client->api_token ,
                        'client' => $client,
                    ]);
                } else {
                    return responseJson(0,'برجاء ادخال البيانات صحيحة');
                }

        } else {
            return responseJson(0,'برجاء ادخال البيانات صحيحة');
        }


    } // login








    public function resetPassword(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'phone' => 'required' ,

        ]);

        if ($validator->fails()) {
            return responseJson(0,$validator->errors()->first(),$validator->errors());
        }
        $client = Client::where('phone',$request->phone)->first();

        if ($client){

            $pin_num = rand(1111,9999);
            $update = $client->update(['pin_num' => $pin_num]) ;


            // send email  // sending successfully
            Mail::to($client->email)
            // ->cc($moreUsers)    // carbon copy
            ->bcc("mohamedmagdii99@gmail.com")  // blind carbon copy
            ->send(new ResetPassword($pin_num));

            return responseJson(1,' برجاء فحص البريد الالكتروني',['email'=>$client->email,'pin_num_for_test' => $pin_num]);


        } else {
            return responseJson(0,'برجاء ادخال البيانات صحيحة');
        }


    } // resetPassword


    public function newPassword(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'pin_num' => 'required' ,
            'phone' => 'required' ,
            'password' => 'required|confirmed|min:8' ,
        ],[
            'pin_num.required' => 'رمز ادخال رمز التحقق ' ,
        ]);

        if ($validator->fails()) {
            return responseJson(0,$validator->errors()->first(),$validator->errors());
        }

        $client = Client::where('phone',$request->pin_num)->where('pin_num',$request->pin_num)->where('pin_num','!=',0)->first();

        if ($client){

            $client->password = bcrypt($request->password)  ;
            $client->pin_num = null ;
            $client->save();

            if($client->save()){
                return responseJson(1,"تم تغيير الرقم السري بنجاح ");
            } else {
                    return responseJson(0,'برجاء المحاولة مرة اخري');
            }

        } else {
            return responseJson(0,'رمز التحقق غير صالح');
        }


    } // newPassword




    public function contacts(Request $request) /// updated
    {
        // validation
        $validator = Validator::make($request->all(),[
            'title_message' => 'required|string' ,
            'message' => 'required' ,
            'client_id' => 'exists:clients' ,
        ]);

        if ($validator->fails()){
            return responseJson(0,$validator->errors()->first(),$validator->errors());
        }

        // store contact us data
        $contacts = new Contact ;

        $contacts->title_message = $request->title_message ;
        $contacts->message = $request->message ;
        $contacts->client_id = auth()->user()->id;
        $contacts->save();

        return responseJson(1,'success',$contacts);
    } // Contact





    public function profile(Request $request)  // updated
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'min:11' ,
            'email' => 'email' ,
            'password' => 'confirmed|min:8' ,
        ]);

        if ($validator->fails()) {
            $data = $validator->errors();
            return responseJson(0,$validator->errors()->first(),$data);
        }

        // if user is auth he can update his profile data   Auth::user() = user()
        $loginUser = $request->user() ;
        $loginUser->update($request->all());

        // after updating password = bcrypt(password)
        if ($request->has('password')) {
            $loginUser->password = bcrypt($request->password);
        }

        return responseJson(1,'success',$loginUser);
    }  //  profile










    public function settings() // updated
    {
        $settings = Setting::first();
        return responseJson(1,'success',$settings);
    } // settings




    public function settingCreate(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'about_app_text' => 'string|required|unique:settings,about_app_text' ,
            'notification_setting_text' => 'string|required' ,
            'fb_link' => 'string|nullable' ,
            'insta_link' => 'string|nullable' ,
            'tw_link' => 'string|nullable' ,
            'youtube_link' => 'string|nullable' ,
        ]);

        if ($validator->fails()){
            return responseJson(0,$validator->errors()->first(),$validator->errors());
        }

        $settingCreate =Setting::create($request->all()) ;

        // $settingCreate = new Setting ;
        // $settingCreate->about_app_text = $request->about_app_text;
        // $settingCreate->notification_setting_text = $request->notification_setting_text;
        // $settingCreate->save();

        return responseJson(1,'success',$settingCreate);
    } // about_app_text




    // updated but there is error nothing updated(null) after updating values in post man

    public function settingUpdate(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'about_app_text' => 'string' ,
            'notification_setting_text' => 'string' ,
            'fb_link' => 'string|nullable' ,
            'insta_link' => 'string|nullable' ,
            'tw_link' => 'string|nullable' ,
            'youtube_link' => 'string|nullable' ,
        ]);
        if ($validator->fails()){
            return responseJson(0,$validator->errors()->first(),$validator->errors());
        }
        // $settingUpdate = Setting::update($request->all()) ;
        $settingUpdate =  Setting::first() ;
        $settingUpdate->about_app_text = $request->about_app_text;
        $settingUpdate->notification_setting_text = $request->notification_setting_text;
        $settingUpdate->fb_link = $request->fb_link;
        $settingUpdate->insta_link = $request->insta_link;
        $settingUpdate->tw_link = $request->tw_link;
        $settingUpdate->youtube_link = $request->youtube_link;
        $settingUpdate->update() ;

        return responseJson(1,'setting updated successfully',$settingUpdate);
    } // aboutAppUpdate




    public function posts(Request $request)  // updated
    {
        $posts = Post::where(function($query) use($request){

            if($request->has('category_id')){
                $query->where('category_id',$request->category_id) ;
            }
        })->with('category')->paginate(10);
        return responseJson(1,'success',$posts);
    } // posts



    public function post(Request $request)  // updated
    {
        // $post = Post::where(function($query){
        //     $query->where(function($query){
        //         $query->where('title','like','%test%');
        //         $query->orWhere('content','like','%test%');
        //     });

        //         $query->where('category_id',1);
        // })->toSql();
        // dd($post);
        $post = Post::where(function($query) use($request){

            if($request->has('category_id')){
                $query->where('category_id',$request->category_id) ;
            }
        })->first();


        return responseJson(1,'success',$post);
    } // post





    public function notificationSettings(Request $request) // updated
    {
        $notificationSetting = $request->user();
        $notificationSetting->update($request->all());

        if ($request->has('governorate_id')) {
            $loginUser = Governorate::where('governorate_id',$request->governorate_id)->first();

            $loginUser->governorates()->detach($request->governorate_id);
            $loginUser->governorates()->attach($request->governorate_id);
        }
        $loginUser =  responseJson(1,'success','Governorate Updated Successfully');


        if ($request->has('blood_type')) {
            $bloodType = BloodType::where('blood_type_id',$request->blood_type_id)->first();

            $bloodType = bloodTypes()->detach($request->blood_type_id);
            $bloodType = bloodTypes()->attach($request->blood_type_id);
        }
        $bloodType =  responseJson(1,'success','BloodTypes Updated Successfully');

        return responseJson(1,'success',[$loginUser,$bloodType]);
    } // notificationSettings




    public function postFavourite(Request $request) // updated
    {
        // validation must be of array cause array of favourit [1,2,4,9] -> detach || atach || sync
        $rules = ["post_id" => "required|exists:posts"];
        $validator = Validator::make($request->all(),[$rules]);
        // $validator = Validator::make($request->all(),["post_id" => "required|exists:posts"]);


        if ($validator->fails()) {
            return responseJson(0,$validator->errors()->first(),$validator->errors());
        }

        // detach || atach || sync --> post from postFavourite
        $toggle = $request->user()->posts()->toggle($request->post_id);
        return responseJson(1,'success',$toggle);

    }  // postFavourite



    public function myFavourite(Request $request) //  updated
    {
        $posts = $request->user()->posts()->latest()->paginate(20);
       return responseJson(1,'loaded...........',$posts);
    } //  myFavourite






    public function tokens(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'token' => 'required' ,
            'type' => 'required|in:ios,android' ,
        ]);

        if ($validator->fails()) {
            return responseJson(0,$request->$validator->errors()->first(),$validator->errors()) ;
        }

        // delete old token and create new one
        Token::where('token',$request->token)->delete();

        $tokens = $request->user()->tokens()->create($request->all());

        return responseJson(1,'success',$tokens) ;
    } //  tokens




    public function removeToken(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required' ,
        ]);

        if ($validator->fails()) {
            return responseJson(0,$validator->errors()->first(),$validator->errors()) ;
        }

        // delete old token
        Token::where('token',$request->token)->delete();

        return responseJson(1,'token deleted successfully') ;
    } //  removeToken



    public function notifications(Request $request)
    {
        // ('title', 'content', 'donation_request_id');
        $validator = Validator::make($request->all());

        if ($validator->fails()) {
            return responseJson(0,$validator->errors()->first(),$validator->errors()) ;
        }

        $notifications = Notification::donationRequest()->where('donation_request_id',$request->donation_request_id)->create($request->all()) ;

        return responseJson(1, 'notifications created successfully',$notifications) ;

    }   //  notifications




    public function donationRequest()
    {
        $donationRequests = DonationRequest::orderBy('id','DESC')->get();
        // dd($donationRequests);

        return responseJson(1,'success',$donationRequests) ;
    }  //  donationRequest





    public function donationRequestCreate(Request $request) {
        // 1 - validation
          $validator = Validator::make($request->all(),[
            'patient_name' => 'required|string|unique:donation_requests,patient_name' ,//
            'hospital_name' => 'required|string' ,
            'hospital_address' => 'required|string' ,
            'patient_phone' => 'required|string' ,

            'patient_age' => 'required|integer' ,
            'bags_num' => 'required|integer' ,
            'latitude' => 'nullable|string' ,
            'longitude' => 'nullable|string' ,
            'notes' => 'nullable|string' ,

            'blood_type_id' => 'required' ,
            'governorate_id' => 'required' ,

        ]) ;

        if ($validator->fails()) {
            return responseJson(0,$validator->errors()->first(),$validator->errors()) ;
        }

        // 2 - store data
        $donationRequest =  $request->user()->donationRequests()->create($request->all()) ;
        // return responseJson(1,'success',$donationRequest) ;


        // get  donationRequest -> clients_id
        $donationRequestIds = $donationRequest->governorate->client()
            ->whereHas('bloodType',
                 function($q) use($request){
                    $q->where('blood_type_id',$request->blood_type_id) ;
        })->pluck('clients.id')->toArray() ;
        //return responseJson(1,'success',$donationRequestIds) ;



        // if has clients with same donationRequest & bloodtype , governorate create notification
        if (count($donationRequestIds)) {
            $notification = $donationRequest->notification()->create([
                'title' => 'تبرع الأن',
                'content' => $donationRequest->bloodType->name.'حالة تبرع',
            ]) ;
        }

        $not = $notification->clients()->attach($donationRequestIds) ;
        // return responseJson(1,'success',$not) ;



        $tokens = Token::whereIn('client_id',$donationRequestIds)->where('client_id','!=',null)->pluck('token')->toArray() ;

        if (count($tokens)) {
            $title = $notification->title ;
            $body = $notification->content ;
            $data =  [
                $donation_request_id = $donationRequest->id
            ];

            $send = NotifyByFireBase($title,$body,$tokens,$data) ;
        }


        return responseJson(1,'success',$send) ;

    }  //  donationRequest





}
