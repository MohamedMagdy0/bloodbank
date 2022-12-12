<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{


     public function index()
    {
        $settings = Setting::first();
        return view('settings.index',compact('settings'));
    } //  index


    // public function create()
    // {
    //     return view('settings.create') ;
    // } //create


    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'fb_link' => 'url',
    //         'insta_link' => 'url',
    //         'tw_link' => 'url',
    //         'youtube_link' => 'url',
    //     ]);

    //     $setting = Setting::create($request->all());
    //     return redirect()->back()->with('success','Setting Inserted Successfully');
    // }  //  store


    // public function show($id)
    // {
    //     //
    // }


    public function edit()
    {
        $setting = Setting::first();
        return view('settings.edit',compact('setting')) ;
    }  //edit



    public function update(Request $request )
    {
        $request->validate([
            'fb_link' => 'url',
            'insta_link' => 'url',
            'tw_link' => 'url',
            'youtube_link' => 'url',
        ]);

        $setting = Setting::first();
        $setting->update($request->all());
        
        toastr()->warning('تم تحديث البيانات بنجاح');
        return redirect()->route('settings.edit');
    } // update




    // start softDelete

    // public function softDelete($id)
    // {
    //     $setting = Setting::findOrFail($id)->delete();
    //     return redirect()->route('settings.home')->with('success','Setting Deleted Successfully');
    // }  //  softDelete


    // public function settingTrash()
    // {
    //     $settings = Setting::onlyTrashed()->paginate(10);
    //     return view('settings.trash',compact('settings'));
    // }  //  settingTrash


    // public function settingRestore($id)
    // {
    //     $setting = Setting::withTrashed()->findOrFail($id);
    //     $setting->restore();
    //     return redirect()->route('settings.home')->with('success','Setting Restored Successfully');
    // }  // settingRestore


    // public function destroy($setting)
    // {
    //     $setting = Setting::withTrashed()->FindOrFail($setting);
    //     $setting->forceDelete();
    //     return redirect()->route('settings.home')->with('success','Setting Deleted Successfully');
    // } //  destroy
}
