@extends('backend.layout.master')
@section('content')
    <div class="row" style="margin-top: 55px">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #DDDDDD">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="m-0">Counter Update</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('counter') }}" class="btn btn-sm btn-success">Back to List</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('counter_update', $data->id ?? 0) }}" method="post">
                        @CSRF
                        <div class="row">
                            <div class="col-md-6 px-4">
                                <div class="form-group">
                                    <label for="branch_id">Branch <span class='required_star'> *</span></label>
                                    <select class="form-control select2" id="branch_id" name="branch_id" style="width: 100%;">
                                        <option value="">Select Branch</option>
                                        @forelse($items as $key=>$item)
                                            <option value="{{ $item->id ?? '' }}" {{ $item->id == $data->branch_id ? 'selected' : '' }}>{{ $item->name ?? '' }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 px-4">
                                <div class="form-group row">
                                    <label for="name" class="col-form-label text-secondary">Name <span class='required_star'> *</span></label>
                                    <input type="name" class="form-control" name="name" id="name" value="{{ $data->name ?? '' }}" autofocus autocomplete="off" required>
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