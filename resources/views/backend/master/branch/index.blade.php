@extends('backend.layout.master')
@section('content')
    <div class="row" style="margin-top: 55px">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #DDDDDD">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="m-0">Branch List</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('branch-create') }}" class="btn btn-sm btn-success">Add</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Branch Name(EN)</th>
                            <th>Branch Name (BN)</th>
                            <th>Concern</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($branches as $key=>$branch)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $branch->name ?? '' }}</td>
                                    <td>{{ $branch->name_bn ?? '' }}</td>
                                    <td>{{ $branch->getConcern->concern_name ?? '' }}</td>
                                    <td>{{ $branch->address ?? '' }}</td>
                                    <td>{{ $branch->mobile ?? '' }}</td>
                                    <td>{{ ($branch->status == 0 ? 'Inactive' : 'Active') ?? '' }}</td>
                                    <td class="text-right">
                                        @if($branch->status === 0)
                                        <a href="{{ route('branch-status', $branch->id ?? 0) }}" class="btn btn-sm btn-success action_btn" title="Active">
                                            <i class="fas fa-check"></i>
                                        </a>
                                        @else
                                            <a href="{{ route('branch-status', $branch->id ?? 0) }}" class="btn btn-sm btn-secondary action_btn" title="Inactive">
                                                <i class="fas fa-minus"></i>
                                            </a>
                                        @endif
                                        <a href="{{ route('branch-edit', $branch->id ?? 0) }}" class="btn btn-sm btn-warning action_btn" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('branch-delete', $branch->id ?? 0) }}" class="btn btn-sm btn-danger action_btn" title="Remove">
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
