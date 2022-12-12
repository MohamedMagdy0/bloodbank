<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Governorate;
use App\Http\Requests\GovernorateRequest;
use App\Http\Requests\GovernorateUpdateRequest;


class GovernorateController extends Controller
{

    public function index()
    {
        $governorates = Governorate::paginate(10);
        return view('governorates.index',compact('governorates')) ;
    } // index


    public function create()
    {
        return view('governorates.create') ;
    } //create


    public function store(GovernorateRequest $request)
    {
        $governorates = Governorate::create(['name'=>$request->name]);
        toastr()->success('تم حفظ البيانات بنجاح');
        return redirect()->route('governorates.index',compact('governorates'));
    }  //  store


    public function show($governorate)
    {
        //
    }


    public function edit($governorate)
    {
        $governorate = Governorate::findOrFail($governorate);
        return view('governorates.edit',compact('governorate')) ;
    }  //edit




    public function update(GovernorateUpdateRequest $request, $governorate)
    {
        $governorate = Governorate::findOrFail($governorate)->update(['name' => $request->name  ]);
        toastr()->warning('تم تحديث البيانات بنجاح');
        return redirect()->route('governorates.index');
    } // update






    // start softDelete

    public function softDelete($id)
    {
        $governorates = Governorate::findOrFail($id)->delete();
        toastr()->error('تم حذف البيانات بنجاح');
        return redirect()->route('governorates.index');
    }  //  softDelete


    public function governorateTrash()
    {
        $governorates = Governorate::onlyTrashed()->paginate(10);
        return view('governorates.trash',compact('governorates'));
    }  //  governorateTrash


    public function governorateRestore($id)
    {
        $governorate = Governorate::withTrashed()->findOrFail($id);
        $governorate->restore();
        toastr()->warning('تم ارجاع البيانات بنجاح');
        return redirect()->route('governorates.index');
    }  // governorateRestore


    public function destroy($governorate)
    {
        $governorate = Governorate::withTrashed()->FindOrFail($governorate);
        $governorate->forceDelete();
        toastr()->error('تم حذف البيانات بنجاح');
        return redirect()->route('governorates.index');
    } //  destroy
}
