@extends('backend.layout.master')
@section('content')
    <div class="row" style="margin-top: 55px">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #DDDDDD">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="m-0">Edit Permission</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ asset('permissions/') }}" class="btn btn-sm btn-success">Back to List</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('/permissions/update/'.$permission->id) }}" class="" method="POST" enctype='multipart/form-data'>
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-2 col-md-4 px-3">
                                <div class="form-group row">
                                    <label for="module_id" class="col-form-label text-secondary">Select Module {!! starSign() !!}</label>
                                    <select class="select2 form-control" name="module_id" id="module_id" required>
                                        <option value="">Select Module</option>
                                        @foreach($modules as $module)
                                            <option {{ ($module->id==$module_to_permission->module_id)?'selected':'' }} value="{{ $module->id }}">{{ $module->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 px-4">
                                <div class="form-group row">
                                    <label for="name" class="col-form-label text-secondary">Permission Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $permission->name }}" autofocus autocomplete="off">
                                    @if ($errors->has('name'))
                                        <span class="error_alert text-danger" role="alert">
                                            {{ $errors->first('name') }}
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

