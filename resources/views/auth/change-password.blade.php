@extends('backend.layout.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">{{ trans('index.change_password') }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <form action="{{ url('/update-password') }}" class="needs-validation" novalidate method="POST" enctype='multipart/form-data'>
                                @csrf
                                <div class="form-group row">
                                    <label for="old_password" class="col-sm-3 col-form-label text-secondary">Old Password <span class='required_star'> *</span></label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="old_password" id="old_password" value="" autofocus autocomplete="off" data-toggle="tooltip" data-placement="top" title="Please enter old password" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 col-form-label text-secondary">New Password <span class='required_star'> *</span></label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="password" id="password" value="" min="8" autocomplete="off" data-toggle="tooltip" data-placement="top" title="Please enter minimum 8 character" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="confirm_password" class="col-sm-3 col-form-label text-secondary">Confirm Password <span class='required_star'> *</span></label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" value="" min="8" autocomplete="off" data-toggle="tooltip" data-placement="top" title="Please enter password same as new password" required>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-info float-right" accesskey="s">Submit</button>
                                    <button type="reset" class="btn btn-warning float-right text-white mr-1">Reset</button>
                                    <button type="submit" class="btn btn-default float-right mr-1">
                                        <a href="{{ url()->previous() }}">Back</a>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
