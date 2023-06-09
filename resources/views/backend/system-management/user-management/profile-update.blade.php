@extends('backend.layout.master')
@section('content')
    <div class="row" style="margin-top: 55px">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #DDDDDD">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="m-0">Update User Profile</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ asset('users/') }}" class="btn btn-sm btn-success">Back to List</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('user-profile/update/') }}" class="" method="POST" enctype='multipart/form-data'>
                        @csrf
                        <div class="row">
                            <div class="col-md-6 px-4">
                                <div class="form-group row">
                                    <label for="name" class="col-form-label text-secondary">Name <span class='required_star'> *</span></label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" autofocus autocomplete="off">
                                    @if ($errors->has('name'))
                                        <span class="error_alert text-danger" role="alert">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 px-4">
                                <div class="form-group row">
                                    <label for="email" class="col-form-label text-secondary">Email <span class='required_star'> *</span></label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" autofocus autocomplete="off">
                                    @if ($errors->has('email'))
                                        <span class="error_alert text-danger" role="alert">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 px-4">
                                <div class="form-group row">
                                    <label for="phone_no" class="col-form-label text-secondary">Phone No <span class='required_star'></span></label>
                                    <input type="text" class="form-control" name="phone_no" id="phone_no" value="{{ $user->phone_no }}" autocomplete="off">
                                    @if ($errors->has('phone_no '))
                                        <span class="error_alert text-danger" role="alert">{{ $errors->first('phone_no ') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 px-4">
                                <div class="form-group row">
                                    <label for="password" class="col-form-label text-secondary">New Password <span class='required_star'></span></label>
                                    <input type="password" class="form-control" name="password" id="password" value="" min="8" autocomplete="off" >
                                    @if ($errors->has('password'))
                                        <span class="error_alert text-danger" role="alert">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 px-4">
                                <div class="form-group row">
                                    <label for="confirm_password" class="col-form-label text-secondary">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" value="" min="8" autocomplete="off" >
                                    @if ($errors->has('confirm_password'))
                                        <span class="error_alert text-danger" role="alert">{{ $errors->first('confirm_password') }}</span>
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

@push('js')
@endpush

