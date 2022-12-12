<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // if (! auth()->user()->can('users-list') ) {
        //     abort(403) ;
        // }

        $users = User::paginate(10);
        return view('users.index', compact('users'))->with('roles', Role::get());
            //
    } // end of index



    public function create()
    {
        $roles = Role::get();
        return view('users.create', compact('roles'));
        // ->with('users',User::get())
    } // end of create


    public function store(Request $request)
    {
        // return $request ;
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed',
            'roles_list' => 'required|array',
        ]);

        $request->merge(['password'=> bcrypt($request->password)])  ;

        $user = User::create($request->except('roles_list'));

        $user->attachRoles($request->roles_list) ;

        toastr()->success('تم حفظ البيانات بنجاح');
        return redirect()->route('users.index');
    } // end of store


    public function show($user)
    {
        //
    } // show


    public function edit($user)
    {
        $user = User::find($user) ;
        return view('users.edit', compact('user'))->with('roles', Role::get());
    } //  edit



    public function update(Request $request, $user)
    {
        $request->validate([
            'name' => 'required',
            // 'email' => 'required|unique:users,email',
            // 'password' => 'required|confirmed',
            'roles_list' => 'required|array',
        ]);

        $request->merge(['password'=> bcrypt($request->password)])  ;

        $user = User::findOrFail($user) ;

        $user->syncRoles($request->roles_list) ;
        $user->update($request->except(['roles_list','email']));

        toastr()->warning('تم تحديث البيانات بنجاح');
        return redirect()->route('users.index');
    } // end of store



    public function destroy($user)
    {
        $user = User::findOrFail($user);
        $user->delete();
         toastr()->error('تم حذف البيانات بنجاح');
        return redirect()->route('users.index') ;
    }// destroy
}
