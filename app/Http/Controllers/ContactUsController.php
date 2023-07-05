<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class ContactUsController extends Controller
{
    public function index(){
        try {
            $contact_us = ContactUs::latest()->get();
            return view('backend.master-setup.contact-us.index', compact('contact_us'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|max:200',
            'message' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $contact_us = new ContactUs();
            $contact_us->name = $request->name;
            $contact_us->email = $request->email;
            $contact_us->subject = $request->subject;
            $contact_us->message = $request->message;
            $contact_us->seen_status = 2;
            $contact_us->save();

            DB::commit();
            toastr()->success('Your Message has been sent successfully!');
            return redirect()->back();
        }catch (Exception $e){
            DB::rollBack();
            toastr()->error('Something went wrong. Please try again. Thanks');
            return back();
        }
    }

    public function view($id){
        try {
            $contact_us = ContactUs::find($id);
            $contact_us->seen_status = 1;
            $contact_us->save();
            return view('backend.master-setup.contact-us.view', compact('contact_us'));
        }catch(RecordsNotFoundException $exception){
            return back()->withErrors($exception->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $contact_us = ContactUs::find($id);
            if ($contact_us) {
                $contact_us->delete();
                toastr()->success('Data Deleted Successfully.');
                return redirect()->back();
            } else {
                toastr()->error('Something went wrong. Please try again. Thanks');
                return redirect()->back();
            }
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }
}
