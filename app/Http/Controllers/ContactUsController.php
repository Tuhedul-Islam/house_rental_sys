<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Http\Request;

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
}
