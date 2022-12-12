<?php

namespace App\Http\Controllers;
// use  Illuminate\Validation\Validator;
use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;
use App\Models\DonationRequest;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostUpdateRequest;

class DonationRequestController extends Controller
{

    public function index()
    {
        $donations = DonationRequest::paginate(10) ;
        return view('donations.index',compact('donations')) ;
    } //  index


    // public function create()
    // {
    //   $donations = DonationRequest::get();
    //   return view('donations.create',compact('donations'));
    // }  //  create



    public function store(Request $request)
    {
        // validation
        $this->validate($request->all());

        // store
        $donation = new DonationRequest ;
        $donation->patient_name =  $request->patient_name ;
        $donation->hospital_name = $request->hospital_name ;
        $donation->hospital_address = $request->hospital_address ;

        $donation->patient_age = $request->patient_age ;
        $donation->bags_num = $request->bags_num ;
        $donation->patient_phone = $request->patient_phone ;

        $donation->latitude = $request->latitude ;
        $donation->longitude = $request->longitude ;
        $donation->notes = $request->notes ;

        $donation->governorate_id = $request->governorate_id ;
        $donation->city_id = $request->city_id ;
        $donation->blood_type_id = $request->blood_type_id ;
        $donation->client_id = $request->client_id ;
        $donation->save() ;

        // return
        toastr()->success('تم حفظ البيانات بنجاح');
        return redirect()->route('donations.index') ;

    }  //  store


    public function show($donation)
    {
        $donation = DonationRequest::findOrFail($donation);
        return view('donations.edit',compact('donation'));
    }  // show



    // public function edit($donation)
    // {
    //     $donation = DonationRequest::findOrFail($donation);
    //     return view('donations.edit',compact('donation')) ;
    // } // edit







    // public function update(Request $request, $donation)
    // {
    //     // validation
    //     $this->validate($request->all());

    //     $donation = DonationRequest::findOrFail($donation);


    //     // update
    //     $donation->update([
    //         'patient_name' =>  $request->patient_name ,
    //         'hospital_name' => $request->hospital_name ,
    //         'hospital_address' => $request->hospital_address ,

    //         'patient_age' => $request->patient_age ,
    //         'bags_num' => $request->bags_num ,
    //         'patient_phone' => $request->patient_phone ,

    //         'latitude' => $request->latitude ,
    //         'longitude' => $request->longitude ,
    //         'notes' => $request->notes ,

    //         'governorate_id' => $request->governorate_id ,
    //         'city_id' => $request->city_id ,
    //         'blood_type_id' => $request->blood_type_id ,
    //         'client_id' => $request->client_id ,
    //     ]);

    //     // return
    //     return redirect()->route('donations.index')->with('success','Donation Added Successfully') ;
    // } //  update






 // start softDelete

    public function softDelete($id)
    {
        $donation = DonationRequest::findOrFail($id)->delete();
        toastr()->error('تم حذف البيانات بنجاح');
        return redirect()->route('donations.index');
    }  //  softDelete


    public function donationTrash()
    {
        $donation = DonationRequest::onlyTrashed()->paginate(10);
        return view('donations.trash',compact('donation'));
    }  //  donationTrash


    public function donationRestore($id)
    {
        $donation = DonationRequest::withTrashed()->findOrFail($id);
        $donation->restore();
        toastr()->warning('تم ارجاع البيانات بنجاح');
        return redirect()->route('donations.index');
    }  // donationRestore


    public function destroy($donation)
    {
        $donation = DonationRequest::withTrashed()->FindOrFail($donation);
        $donation->forceDelete();
        toastr()->error('تم حذف البيانات بنجاح');
        return redirect()->route('donations.index');
    } //  destroy
}
