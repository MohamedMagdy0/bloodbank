<?php

namespace App\Http\Controllers;

use App\Models\BloodType;
use Illuminate\Http\Request;

class BloodTypeController extends Controller
{

    public function index()
    {
        $bloodTypes = BloodType::paginate(10);
        return view('blood_types.index',compact('bloodTypes'));
    } //  index


    public function create()
    {
        return view('blood_types.create') ;
    } //create


    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|unique:blood_types,name' ,
        ]);

        $bloodTypes = BloodType::create(['name'=>$request->name]);
        toastr()->success('تم حفظ البيانات بنجاح');
        return redirect()->route('blood-types.index');
    }  //  store



    public function edit($blood_type)
    {
        $bloodType = BloodType::findOrFail($blood_type);
        return view('blood_types.edit',compact('bloodType')) ;
    }  //edit


    public function update(Request $request,$blood_type)
    {
        $this->validate($request,[
            'name' => 'required|string' ,
        ]);

        $bloodType = BloodType::FindOrFail($blood_type)->update([
             'name' => $request->name ,
        ]);

        toastr()->warning('تم تحديث البيانات بنجاح');
        return redirect()->route('blood-types.index');
    } // update




    // start softDelete

    public function softDelete($id)
    {
        $bloodType = BloodType::findOrFail($id)->delete();
        toastr()->error('تم حذف البيانات بنجاح');
        return redirect()->route('blood-types.index');
    }  //  softDelete


    public function bloodTypeTrash()
    {
        $bloodTypes = BloodType::onlyTrashed()->paginate(10);
        return view('blood_types.trash',compact('bloodTypes'));
    }  //  bloodTypeTrash


    public function bloodTypeRestore($id)
    {
        $bloodType = BloodType::withTrashed()->findOrFail($id);
        $bloodType->restore();
        toastr()->warning('تم ارجاع البيانات بنجاح');
        return redirect()->route('blood-types.index');
    }  // bloodTypeRestore


    public function destroy($blood_type)
    {
        $bloodType = BloodType::withTrashed()->FindOrFail($blood_type);
        $bloodType->forceDelete();
        toastr()->error('تم حذف البيانات بنجاح');
        return redirect()->route('blood-types.index');
    } //  destroy
}
