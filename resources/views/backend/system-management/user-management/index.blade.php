@extends('backend.layout.master')
@section('content')
    <div class="row" style="margin-top: 55px">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #DDDDDD">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="m-0">{{ ($user_type==1)?'User List':(($user_type==2)?'House owner List':'Customer List') }}</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            @if($user_type==1)
                            <a href="{{ asset('users/create') }}" class="btn btn-sm btn-success">Add New</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Roles</th>
                            <th>Email</th>
                            <th>Phone No</th>
                            <th>Status(s)</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $key=>$user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name ?? '' }}</td>
                                <td>
                                    @foreach($user->getRoleNames() as $role)
                                        {{ $role ?? '' }}
                                        {{ ($loop->last)?'':',' }}
                                    @endforeach
                                </td>
                                <td>{{ $user->email ?? '' }}</td>
                                <td>{{ $user->phone_no ?? '' }}</td>
                                <td>{{ ($user->status == 0 ? 'Inactive' : 'Active') ?? '' }}</td>
                                <td class="text-right">
                                    @if($user->status === 0)
                                        <a href="{{ asset('/users/status/'.$user->id) }}" class="btn btn-sm btn-success action_btn" title="Active">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    @else
                                        <a href="{{ asset('/users/status/'.$user->id) }}" class="btn btn-sm btn-secondary action_btn" title="Inactive">
                                            <i class="fas fa-minus"></i>
                                        </a>
                                    @endif
                                    @if($user_type==1)
                                        <a href="{{ asset('/users/edit/'.$user->id) }}" class="btn btn-sm btn-warning action_btn" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ asset('/users/delete/'.$user->id) }}" class="btn btn-sm btn-danger action_btn" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    @endif
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


