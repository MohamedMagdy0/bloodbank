<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon ;
use App\Models\City;
use App\Models\Client;
use App\Mail\ResetPassword;
use App\Models\Governorate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function registerClient(Request $request)
    {
        $governorates = Governorate::pluck('id', 'name')->toArray();
        $cities = City::get();

        return view('frontend.auth-view.create-account', compact('cities'))->with('governorates', Governorate::get());
    }// registerClient



    public function registerClientStore(Request $request)
    {
        $request->validate([
                    'name' => 'required|unique:clients' ,
                    'phone' => 'required|unique:clients,phone' ,
                    'password' => 'required|confirmed|min:8' ,
                    'email' => 'required|unique:clients,email' ,
                    'd_o_b' => 'required' ,
                    'pin_num' => 'numeric' ,
                    'last_donation_date' => 'required' ,
                    'blood_type_id' => 'required' , //'required|in:O-,O+,A-,A+,B-,B+,AB-,AB+'
                    'city_id' => 'required|exists:cities,id' ,
                ]);

                // return $request ;

        $request-> merge(['password'=> bcrypt($request->password)]);
        $client = Client::create($request->all());
        // $client->save();
        auth('client-web')->login($client);

        toastr()->success('تم انشاء الحساب بنجاح');
        return redirect()->route('home');
    }   // registerClientStore



  public function loginClient()
  {
      return view('frontend.auth-view.signin-account');
  }// loginClient





    public function loginClientStore(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required|exists:clients,phone' ,
            'password' => 'required|min:8' ,
        ]);
        $password = Hash::make($request->password);
        // dd($password);

        if (auth('client-web')->attempt($request->only('phone', 'password'))) {
            toastr()->success('تم تسجيل الدخول بنجاح');
            return redirect()->route('home');
        } else {
            return back();
        }
    }// loginClientStore




    public function resetClient()
    {
        return view('frontend.auth-view.reset-client');
    }// loginClient




    public function resetClientLink(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:clients,email',
        ],[
            'email.required' => 'برجاء ادخال ادخال البريد الالكتروني',
            'email.exists' => 'برجاء ادخال البيانات صحيحة ',
        ]) ;

         $client = Client::where('email',$request->email)->first();

        if ($client){

            $pin_num = rand(1111,9999);
            $update = $client->update(['pin_num' => $pin_num]) ;


            // send email  // sending successfully
            Mail::to($client->email)
            // ->cc($moreUsers)    // carbon copy
            ->bcc("mohamedmagdii99@gmail.com")  // blind carbon copy
            ->send(new ResetPassword($pin_num));
            // return $client ;

            toastr()->info(' تم ارسال رمز التحقق برجاء فحص البريد الالكتروني');
            return redirect()->route('reset-client.pin-num');
        }else {
            toastr()->info('برجاء ادخال البيانات صحيحة ');
            return back();
        }
    }// loginClient




    public function resetPinNum()
    {
        return view('frontend.auth-view.reset-pin-num');
    } // resertPinNum



    public function resetPinNumCheck(Request $request)
    {
        $request->validate([
            'pin_num' => 'required|string|exists:clients,pin_num',
            'email' => 'required|exists:clients,email',
            'phone' => 'required|exists:clients,phone',
        ],[
            'pin_num.required' => 'برجاء ادخال ادخال رمز التحقق',
            'pin_num.exists' => 'برجاء ادخال ادخال رمز التحقق صحيح',

            'email.required' => 'برجاء ادخال ادخال البريد الالكتروني',
            'email.exists' => 'برجاء ادخال بريد الالكتروني صحيح ',

            'phone.required' => 'برجاء ادخال ادخال رقم الهاتف  ',
            'phone.exists' => 'برجاء ادخال رقم الهاتف صحيح ',
        ]) ;

        $client = Client::where([
            'pin_num'=>$request->pin_num,
            'email'=>$request->email,
            'phone'=>$request->phone,
            ])->first();
            // return $client ;
        $email = $request->email;

        toastr()->info('تم ارسال البيانات بنجاح');
        return redirect()->route('client.change-password',['email'=>$request->email]);
    } // resetPinNumCheck




    public function updateClientPage(Request $request)
    {
        $client = Client::where('email',$request->email)->first();
        // return $client->email ;

        return view('frontend.auth-view.change-password-front-client',['email'=>$client->email]);
    } // updateClientPassword




    public function UpdateClientPassword(Request $request)
    {
        $request->validate([
            'password'=>'required|confirmed|min:8'
        ],[
            'password.required' => 'برجاء ادخال كلمة المرور الجديدة',
            'password.confirmed' => 'كلمة المرور غير متطابقة',
            'password.min' => 'كلمة المرور مكونة من 8 احرف او ارقام',
        ]);
        // $client = $request->client ;
        //  $client = Client::where('email', $request->email)->first();

        $client = Client::where('email',$request->email)->update([
            'password' => bcrypt($request->password),
        ]);
        $client->pin_num = null;
        if($client){
            toastr()->info('تم تغيير كلمة المرور بنجاح');
            return back();
        }
    }// UpdateClientPassword


    public function logOut()
    {
        Auth::guard('client-web')->logout();
        toastr()->success('تم تسجيل الخروج بنجاح');
        return redirect()->route('login-client');
    }// logOut

}
