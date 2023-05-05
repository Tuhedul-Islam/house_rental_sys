@extends('backend.layout.master')
@section('content')
    <div class="row" style="margin-top: 55px">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #DDDDDD">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="m-0">System Settings</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('/settings/system-setting-store') }}" class="" method="POST" enctype='multipart/form-data'>
                        @csrf
                        <div class="row">
                            <div class="col-md-4 px-4">
                                <div class="form-group row">
                                    <label for="title" class="col-form-label text-secondary">Site Title <span class='required_star'> *</span></label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ $system_setting->title ?? '' }}" autofocus autocomplete="off" required>
                                    @if ($errors->has('title'))
                                        <span class="error_alert text-danger" role="alert">
                                            {{ $errors->first('title') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 px-4">
                                <div class="form-group row">
                                    <label for="email" class="col-form-label text-secondary">Email <span class='required_star'> *</span></label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ $system_setting->email ?? '' }}" autocomplete="off" required>
                                    @if ($errors->has('email'))
                                        <span class="error_alert text-danger" role="alert">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 px-4">
                                <div class="form-group row">
                                    <label for="phn_no" class="col-form-label text-secondary">Phone No <span class='required_star'> *</span></label>
                                    <input type="text" class="form-control" name="phn_no" id="phn_no" value="{{ $system_setting->phn_no ?? "" }}" autocomplete="off" required>
                                    @if ($errors->has('phn_no'))
                                        <span class="error_alert text-danger" role="alert">
                                            {{ $errors->first('phn_no') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 px-4">
                                <div class="form-group row">
                                    <label for="site_logo" class="col-form-label text-secondary">Site Logo</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="site_logo" id="site_logo">
                                            <label class="custom-file-label" for="site_logo">Choose file</label>
                                        </div>
                                    </div>
                                    @if ($errors->has('site_logo'))
                                        <span class="error_alert text-danger" role="alert">
                                            {{ $errors->first('site_logo') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 px-4">
                                <div class="form-group row">
                                    <label for="site_favicon" class="col-form-label text-secondary">Site Favicon</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="site_favicon" id="site_favicon">
                                            <label class="custom-file-label" for="site_favicon">Choose file</label>
                                        </div>
                                    </div>
                                    @if ($errors->has('site_favicon'))
                                        <span class="error_alert text-danger" role="alert">
                                            {{ $errors->first('site_favicon') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 px-4">
                                <div class="form-group row">
                                    <label for="location" class="col-form-label text-secondary">Location/Address <span class='required_star'> *</span></label>
                                    <textarea class="form-control" name="location" id="location" autocomplete="off" required>{{ $system_setting->location ?? "" }}</textarea>
                                    @if ($errors->has('location'))
                                        <span class="error_alert text-danger" role="alert">
                                            {{ $errors->first('location') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 px-4">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-info float-right" accesskey="s">Submit</button>
                                    <button type="reset" class="btn btn-warning float-right text-white mr-1">Reset</button>
                                    <button type="submit" class="btn btn-default float-right mr-1">
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


