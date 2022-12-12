<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Http\Requests\CityRequest; 
use App\Http\Requests\CityUpdateRequest;

class CityController extends Controller
{

    public function index()
    {
        $cities = City::paginate(10);
        return view('cities.index',compact('cities')) ;
    } // index


    public function create()
    {
        $cities = City::get();
        return view('cities.create',compact('cities'))->with('governorates',Governorate::get()) ;
    } //create


    public function store(CityRequest $request)
    {
        $city = City::create($request->all());
        toastr()->success('تم حفظ البيانات بنجاح');
        return redirect()->route('cities.index');
    }  //  store


    public function show($governorate)
    {
        //
    }


    public function edit($city)
    {
        $city = City::findOrFail($city);
        return view('cities.edit',compact('city'))->with('governorates',Governorate::get()) ;
    }  //edit


    public function update(CityUpdateRequest $request,$city)
    {
        $city = City::findOrFail($city)->update($request->all());
        toastr()->warning('تم تحديث البيانات بنجاح');
        return redirect()->route('cities.index');
    } // update





    // start softDelete

    public function softDelete($id)
    {
        $cities = City::findOrFail($id)->delete();
        toastr()->error('تم حذف البيانات بنجاح');
        return redirect()->route('cities.index')->with('success','City Deleted Successfully');
    }  //  softDelete


    public function cityTrash()
    {
        $cities = City::onlyTrashed()->paginate(10);
        return view('cities.trash',compact('cities'));
    }  //  cityTrash


    public function cityRestore($id)
    {
        $city = City::withTrashed()->findOrFail($id);
        $city->restore();
        toastr()->warning('تم ارجاع البيانات بنجاح');
        return redirect()->route('cities.index');
    }  // cityRestore


    public function destroy($city)
    {
        $city = City::withTrashed()->FindOrFail($city);
        $city->forceDelete();
        toastr()->error('تم حذف البيانات بنجاح');
        return redirect()->route('cities.index');
    } //  destroy
}
