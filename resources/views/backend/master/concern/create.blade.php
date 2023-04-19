@extends('backend.layout.master')
@section('content')
    <div class="row" style="margin-top: 55px">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #DDDDDD">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="m-0">Concern Create</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ url('concerns/') }}" class="btn btn-sm btn-success">Back to List</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('/concerns/store') }}" class="" method="POST" enctype='multipart/form-data'>
                        @CSRF
                        <div class="row">
                            <div class="col-md-12 px-4">
                                <div class="form-group row">
                                    <label for="concern_name" class="col-form-label text-secondary">Concern Name <span class='required_star'> *</span></label>
                                    <input type="text" class="form-control" name="concern_name" id="concern_name" placeholder="Concern Name" autofocus autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-12 px-4">
                                <div class="form-group row">
                                    <label for="concern_name_bn" class="col-form-label text-secondary">Concern Name Bangla <span class='required_star'> *</span></label>
                                    <input type="text" class="form-control" name="concern_name_bn" id="concern_name_bn" placeholder="Concern Name in Bangla" autofocus autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-12 px-4">
                                <div class="form-group row">
                                    <label for="concern_short_name" class="col-form-label text-secondary">Short Concern Name <span class='required_star'> *</span></label>
                                    <input type="text" class="form-control" name="concern_short_name" id="concern_short_name" placeholder="Short Concern Name" autofocus autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-12 px-4">
                                <div class="form-group row">
                                    <label for="address" class="col-form-label text-secondary">Address <span class='required_star'> *</span></label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Branch Address" autofocus autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-12 px-4">
                                <div class="form-group row">
                                    <label for="mobile" class="col-form-label text-secondary">Mobile <span class='required_star'> *</span></label>
                                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile No" autofocus autocomplete="off" required>
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
