@extends('backend.layout.master')
@section('content')
    <div class="row" style="margin-top: 55px">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #DDDDDD">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="m-0">Permission List</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ asset('permissions/create') }}" class="btn btn-sm btn-success">Add New</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Permission Name</th>
                            <th>Module Name</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($permissions as $key=>$permission)
                            <?php
                                if (isset($permission)){
                                    $module_to_permission = \App\Models\ModuleToPermission::with('module', 'permission')->where('permission_id', $permission->id)->first();
                                }
                            ?>
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $permission->name ?? '' }}</td>
                                <td>{{ $module_to_permission->module->name ?? '' }}</td>
                                <td class="text-right">
                                    <a href="{{ asset('/permissions/edit/'.$permission->id) }}" class="btn btn-sm btn-warning action_btn" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ asset('/permissions/delete/'.$permission->id) }}" class="btn btn-sm btn-danger action_btn" title="Delete">
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


