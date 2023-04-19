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
                            <a href="{{ url('counter-desks/') }}" class="btn btn-sm btn-success">Back to List</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('/counter-desks/update/'.$data->id) }}" class="" method="POST" enctype='multipart/form-data'>
                        @CSRF
                        <div class="row">
                            <div class="col-md-12 px-4">
                                <div class="form-group row">
                                    <label for="counter_name" class="col-form-label text-secondary">Counter/Unit/Desk Name <span class='required_star'> *</span></label>
                                    <input type="text" class="form-control" name="counter_name" id="counter_name" value="{{ $data->counter_name }}" autofocus autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-12 px-4">
                                <div class="form-group row">
                                    <label for="counter_name_bn" class="col-form-label text-secondary">Concern Name Bangla <span class='required_star'> *</span></label>
                                    <input type="text" class="form-control" name="counter_name_bn" id="counter_name_bn" value="{{ $data->counter_name_bn }}" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-12 px-4">
                                <div class="form-group row">
                                    <label for="counter_short_name" class="col-form-label text-secondary">Short Concern Name <span class='required_star'> *</span></label>
                                    <input type="text" class="form-control" name="counter_short_name" id="counter_short_name" value="{{ $data->counter_short_name }}" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-12 px-4">
                                <div class="form-group row">
                                    <label for="concern_id" class="col-form-label text-secondary">Concern <span class='required_star'> *</span></label>
                                    <select class="select2 form-control" name="concern_id" data-placeholder="Select a Concern" id="concern_id" required>
                                        <option value="">Select a Concern</option>
                                        @foreach($concerns as $concern)
                                            <option {{ ($concern->id==$data->concern_id)?'selected':'' }} value="{{ $concern->id }}">{{ $concern->concern_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 px-4">
                                <div class="form-group row">
                                    <label for="branch_id" class="col-form-label text-secondary">Branch/Outlet/Office setup <span class='required_star'> *</span></label>
                                    <select class="select2 form-control" name="branch_id" data-placeholder="Select a Branch" id="branch_id" required>
                                        <option value="">Select a Branch</option>
                                        @foreach($branches as $branch)
                                            <option {{ ($branch->id==$data->branch_id)?'selected':'' }} value="{{ $branch->id }}">{{ $branch->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 px-4">
                                <div class="form-group row">
                                    <label for="mobile" class="col-form-label text-secondary">Mobile <span class='required_star'> *</span></label>
                                    <input type="text" class="form-control" name="mobile" id="mobile" value="{{ $data->mobile }}" autocomplete="off" required>
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
