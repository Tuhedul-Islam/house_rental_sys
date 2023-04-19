@extends('backend.layout.master')
@section('content')
    <div class="row" style="margin-top: 55px">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #DDDDDD">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="m-0">Role List</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ asset('roles/create') }}" class="btn btn-sm btn-success">Add New</a>
                            {{--<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-lg">Add New</button>--}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($roles as $key=>$role)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role->name ?? '' }}</td>
                                <td class="text-right">
                                    <a href="{{ asset('/roles/edit/'.$role->id) }}" class="btn btn-sm btn-warning action_btn" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ asset('/roles/delete/'.$role->id) }}" class="btn btn-sm btn-danger action_btn" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


