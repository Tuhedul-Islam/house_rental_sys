@extends('backend.layout.master')
@section('content')
    <div class="row" style="margin-top: 55px">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #DDDDDD">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="m-0">Concern List</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ url('concerns/create') }}" class="btn btn-sm btn-success">Add New</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Concern Name(EN)</th>
                            <th>Concern Name(BN)</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th class="text-right" width="15%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($concerns as $key=>$concern)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $concern->concern_name ?? '' }}</td>
                                <td>{{ $concern->concern_name_bn ?? '' }}</td>
                                <td>{{ $concern->address ?? '' }}</td>
                                <td>{{ $concern->mobile ?? '' }}</td>
                                <td>{{ ($concern->status == 0 ? 'Inactive' : 'Active') ?? '' }}</td>
                                <td class="text-right">
                                    @if($concern->status === 0)
                                        <a href="{{ url('concerns/status/'.$concern->id ?? 0) }}" class="btn btn-sm btn-success action_btn" title="Active">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    @else
                                        <a href="{{ url('concerns/status', $concern->id ?? 0) }}" class="btn btn-sm btn-secondary action_btn" title="Inactive">
                                            <i class="fas fa-minus"></i>
                                        </a>
                                    @endif
                                    <a href="{{ url('concerns/edit/'.$concern->id ?? 0) }}" class="btn btn-sm btn-warning action_btn" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ url('concerns/delete/'.$concern->id ?? 0) }}" class="btn btn-sm btn-danger action_btn" title="Remove">
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


