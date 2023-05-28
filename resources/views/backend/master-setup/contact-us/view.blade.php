@extends('backend.layout.master')
@section('content')
    <div class="row" style="margin-top: 55px">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #DDDDDD">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="m-0">Contact View</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ url('contact-us') }}" class="btn btn-sm btn-success">Back to List</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <p><b>Name:</b> {!! $contact_us->name !!}</p>
                    <p><b>Email:</b> {!! $contact_us->email !!}</p>
                    <p><b>Subject:</b> {!! $contact_us->subject !!}</p>
                    <p><b>Message:</b> {!! $contact_us->message !!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
