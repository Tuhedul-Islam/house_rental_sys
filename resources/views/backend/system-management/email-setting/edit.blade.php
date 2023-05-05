@extends('backend.layout.master')
@section('content')
    <div class="row" style="margin-top: 55px">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #DDDDDD">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="m-0">Email Settings</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('/settings/email-setting-store') }}" class="" method="POST" enctype='multipart/form-data'>
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 mb-2 col-md-4 px-3">
                                <div class="form-group row">
                                    <label for="mail_driver" class="col-form-label text-secondary">Mail Driver {!! starSign() !!}</label>
                                    <select class="select2 form-control" name="mail_driver" id="mail_driver" required>
                                        <option value="">Select Driver</option>
                                        <option {{ ($email_setting->mail_driver=='smtp')?'selected':'' }} value="smtp">SMTP</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2 col-md-4">
                                <div class="form-group">
                                    <label for="mail_driver" class="col-form-label text-secondary">Mail Host {!! starSign() !!}</label>
                                    <input type="text" name="mail_host" class="form-control" id="mail_driver" value="{{ $email_setting->mail_host }}" required="">
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2 col-md-4">
                                <div class="form-group">
                                    <label for="mail_port" class="col-form-label text-secondary">Mail Port {!! starSign() !!}</label>
                                    <input type="number" name="mail_port" class="form-control" id="mail_port" value="{{ $email_setting->mail_port }}" required="">
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2 col-md-4">
                                <div class="form-group">
                                    <label for="mail_encryption" class="col-form-label text-secondary">Mail Encryption {!! starSign() !!}</label>
                                    <input type="text" name="mail_encryption" class="form-control" id="mail_encryption" value="{{ $email_setting->mail_encryption }}" required="">
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2 col-md-4">
                                <div class="form-group">
                                    <label for="mail_username" class="col-form-label text-secondary">Mail Username {!! starSign() !!}</label>
                                    <input type="email" name="mail_username" class="form-control" id="mail_username" value="{{ $email_setting->mail_username }}" required="">
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2 col-md-4">
                                <div class="form-group">
                                    <label for="mail_password" class="col-form-label text-secondary">Mail Password {!! starSign() !!}</label>
                                    <input type="text" name="mail_password" class="form-control" id="mail_password" value="{{ $email_setting->mail_password }}" required="">
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2 col-md-4">
                                <div class="form-group">
                                    <label for="mail_from" class="col-form-label text-secondary">Mail From {!! starSign() !!}</label>
                                    <input type="email" name="mail_from" class="form-control" id="mail_from" value="{{ $email_setting->mail_from }}" required="">
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2 col-md-4">
                                <div class="form-group">
                                    <label for="mail_fromname" class="col-form-label text-secondary">From Name {!! starSign() !!}</label>
                                    <input type="text" name="mail_fromname" class="form-control" id="mail_fromname" value="{{ $email_setting->mail_fromname }}" required="">
                                </div>
                            </div>
                            <div class="col-md-12 px-4">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-info float-right" accesskey="s">Submit</button>
                                    <button type="reset" class="btn btn-warning float-right text-white mr-1">Reset</button>
                                    <button type="button" class="btn btn-default float-right mr-1">
                                        <a href="{{ url()->previous() }}">Back</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


