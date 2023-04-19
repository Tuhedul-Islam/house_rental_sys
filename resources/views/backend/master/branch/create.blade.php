@extends('backend.layout.master')
@section('content')
    <div class="row" style="margin-top: 55px">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #DDDDDD">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="m-0">Branch Create</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('branch-list') }}" class="btn btn-sm btn-success">Back to List</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('branch-create') }}" method="post">
                        @CSRF
                        <div class="row">
                            <div class="col-md-12 px-4">
                                <div class="form-group row">
                                    <label for="name" class="col-form-label text-secondary">Branch Name <span class='required_star'> *</span></label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Branch Name" autofocus autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-12 px-4">
                                <div class="form-group row">
                                    <label for="name_bn" class="col-form-label text-secondary">Branch Name Bangla <span class='required_star'> *</span></label>
                                    <input type="text" class="form-control" name="name_bn" id="name_bn" placeholder="Branch Name in Bangla" autofocus autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-12 px-4">
                                <div class="form-group row">
                                    <label for="short_name" class="col-form-label text-secondary">Short Branch Name <span class='required_star'> *</span></label>
                                    <input type="text" class="form-control" name="short_name" id="short_name" placeholder="Short Branch Name" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-12 px-4">
                                <div class="form-group row">
                                    <label for="concern_id" class="col-form-label text-secondary">Concern <span class='required_star'> *</span></label>
                                    <select class="select2 form-control" name="concern_id" data-placeholder="Select a Concern" id="concern_id" required>
                                        <option value="">Select a Counter</option>
                                        @foreach($concerns as $concern)
                                            <option value="{{ $concern->id }}">{{ $concern->concern_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 px-4">
                                <div class="form-group row">
                                    <label for="address" class="col-form-label text-secondary">Address <span class='required_star'> *</span></label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Branch Address" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-12 px-4">
                                <div class="form-group row">
                                    <label for="mobile" class="col-form-label text-secondary">Mobile <span class='required_star'> *</span></label>
                                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile No" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-12 px-4">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-info float-right" accesskey="s">Submit</button>
                                    <button type="reset" class="btn btn-warning float-right text-white mr-1">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
