<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BackendController extends Controller
{

    public function logout()
    {
        Auth::logout();
        toastr()->info('تم تسجيل الخروج بنجاح');
        return redirect()->route('login');
    }  //  logout


    // public function update_Password(Request $request)
    // {
    //     $this->validate($request,[
    //         'current_password' => 'required',
    //         'password' => 'required|confirmed|min:8',
    //     ]);

    //     $user = auth()->user();
    //     if(Hash::check($request->current_password, $user->password))
    //     {
    //         $user->password = becrpt($request->password);
    //         $user->save();
    //     }



    //     User::where('current_password',$request->current_password)->update([
    //         'password'=>  $request->password ,
    //     ]);

    //     return view('clients.change-paaword');
    // }



    // clients folder

    public function changePassword()
    {
         return view('clients.change-paaword');
    }


    public function updatePassword(Request $request)
    {
            # Validation
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|confirmed',
            ]);

            $user = auth()->user();

            #Match The Old Password
            if(!Hash::check($request->old_password, $user->password)){
                return back()->with("error", "Old Password Doesn't match!");
            }

            #Update the new Password
            $user->whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);

            toastr()->warning('تم تغيير كلمة المرور بنجاح');
            return back();
    }


























    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

}
