@extends('backend.layout.master')
@section('content')
    <div class="row" style="margin-top: 55px">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #DDDDDD">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="m-0">Edit Role</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ asset('roles/') }}" class="btn btn-sm btn-success">Back to List</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('/roles/update/'.$role->id) }}" class="" method="POST" enctype='multipart/form-data'>
                        @csrf
                        <div class="row">
                            <div class="col-md-6 px-4">
                                <div class="form-group row">
                                    <label for="name" class="col-form-label text-secondary">Name {!! starSign() !!}</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $role->name }}" autofocus autocomplete="off">
                                    @if ($errors->has('name'))
                                        <span class="error_alert text-danger" role="alert">
                                            {{ $errors->first('name') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            @php( $getPermissionNames = $role->getPermissionNames()->toArray())
                            <div class="col-md-6 mb-2 col-md-4 px-3">
                                <div class="form-group row">
                                    <label for="roles" class="col-form-label text-secondary">Permission {!! starSign() !!}</label>
                                    <select class="select2 form-control" name="permission[]" id="roles" required multiple>
                                        @foreach($permissions as $permission)
                                            <option {{ (in_array($permission->name, $getPermissionNames))? 'selected':'' }} value="{{ $permission->id }}">{{ $permission->name }}</option>
                                        @endforeach
                                    </select>
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

