<?php

namespace App\Http\Controllers\Api;

use Response;

use App\Models\City;

use App\Models\Post;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\Category;

use App\Models\BloodType;
use App\Models\Governorate;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\magdy\myclasses\responseJson;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{

    public function cities(Request $request)  // updated
    {
        $cities = City::where(function($query) use($request){
            if($request->has('governorate_id')){
                $query->where('governorate_id' , $request->governorate_id);
            }
        })->with('governorate')->get();
        return responseJson(1,'success',$cities);

    }  // cities


    public function governorates()  // updated
    {
        $governorates = Governorate::with('cities')->get();
        return responseJson(1,'success',$governorates);

    }  // governorates



    public function bloodTypes(Request $request)  // updated
    {
        $bloodTypes = BloodType::where(function($query) use($request){
            if($request->blood_type_id){

                $query->where('blood_type_id',$request->blood_type_id) ;
            }
        })->get();
        return responseJson(1,'success',$bloodTypes);
    } // bloodTypes




    public function categories()  // updated
    {
        $categories = Category::with('posts')->get();
        return responseJson(1,'success',$categories);
    } // categories








    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
