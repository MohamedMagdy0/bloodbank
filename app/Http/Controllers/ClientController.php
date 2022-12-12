<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{


    public function index(Request $request)
    {
        $clients = Client::where(function ($query) use ($request,) {

            $query->where('name', 'like', '%'.$request->keyword.'%');
            $query->orWhere('email', 'like', '%'.$request->keyword.'%');

        })->latest('id')->paginate(10);
        return view('clients.index', compact('clients'));
    }   // index




    public function create()
    {
        return view('clients.create');
    }   // create




    // start softDelete

    public function softDelete($id)
    {
        $clients = Client::findOrFail($id)->delete();
        toastr()->erroe('تم حذف البيانات بنجاح');
        return redirect()->route('clients.index');
    }  //  softDelete


    public function clientTrash()
    {
        $clients = Client::onlyTrashed()->paginate(10);
        return view('clients.trash', compact('clients'));
    }  //  clientTrash


    public function clientRestore($id)
    {
        $client = Client::withTrashed()->findOrFail($id);
        $client->restore();
        toastr()->warning('تم ارجاع البيانات بنجاح');
        return redirect()->route('clients.index')->with('success', 'Client Restored Successfully');
    }  // clientRestore


    public function destroy($client)
    {
        $client = Client::withTrashed()->FindOrFail($client);
        $client->forceDelete();
        toastr()->erroe('تم حذف البيانات بنجاح');
        return redirect()->route('clients.index')->with('success', 'Client Deleted Successfully');
    } //  destroy




        public function isActive(Request $request, $id)
        {
            $user = Client::findOrFail($id) ;
            if ($request->id) {
                $user->where('id', $request->id)->update(['is_active' => $request->is_active]) ;
                return back() ;
            }
        }  // isActive



}
