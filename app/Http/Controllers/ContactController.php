<?php

namespace App\Http\Controllers;

use App\Models\Contact;

use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index(Request $request)
    {
        $contacts = Contact::where(function ($query) use ($request) {
            if($request->keyword) {
                $query->where('title_message', 'like', '%'.$request->keyword.'%');
                $query->orWhere('message', 'like', '%'.$request->keyword.'%');
            }
        })->get();
        return view('contacts.index',compact('contacts'));
    } //  index



    // public function contactSearch(Request $request)
    // {
    //     $keyword= $request->keyword;

    //     $contacts = Contact::where(function ($query) use ($keyword) {
    //         if($keyword) {
    //             $query->where('title_message', 'like', '%'.$keyword.'%');
    //             $query->orWhere('message', 'like', '%'.$keyword.'%');
    //         }
    //     })->get();
    //     return $contacts ;

    //  //})->toSql();

    //     return redirect('contacts')->with(compact('contacts'));
    // } // client




    // public function create()
    // {
    //     return view('contacts.create') ;
    // } //create


    public function store(Request $request)
    {
        $this->validate($request->all());

        $contact = Contact::create($request->all());
        toastr()->success('تم حفظ البيانات بنجاح');
        return redirect()->route('contacts.home');
    }  //  store


    public function show($contact)
    {
        //
    }


    public function edit($contact)
    {
        $contact = Contact::findOrFail($contact);
        return view('contacts.edit',compact('contact')) ;
    }  //edit


    public function update(Request $request,$contact)
    {
        $request->validate([
            'title_message' => 'string',
            'message' => 'string|max:2000',
        ]);

        $contact = Contact::FindOrFail($contact)->update($request->all());
        toastr()->warning('تم تحديث البيانات بنجاح');
        return redirect()->route('contacts.home');
    } // update




    // start softDelete

    public function softDelete($id)
    {
        $contact = Contact::findOrFail($id)->delete();
        toastr()->error('تم حذف البيانات بنجاح');

        return redirect()->route('contacts.home');
    }  //  softDelete


    public function contactTrash()
    {
        $contacts = Contact::onlyTrashed()->paginate(10);
        return view('contacts.trash',compact('contacts'));
    }  //  contactTrash


    public function contactRestore($id)
    {
        $contact = Contact::withTrashed()->findOrFail($id);
        $contact->restore();
        toastr()->warning('تم ارجاع البيانات بنجاح');
        return redirect()->route('contacts.home');
    }  // contactRestore


    public function destroy($id)
    {
        $contact = Contact::withTrashed()->FindOrFail($id);
        $contact->forceDelete();
        toastr()->error('تم حذف البيانات بنجاح');
        return redirect()->route('contacts.home');
    } //  destroy


}
