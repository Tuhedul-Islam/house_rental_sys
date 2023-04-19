@extends('backend.layout.master')
@section('content')
    <div class="row" style="margin-top: 55px">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #DDDDDD">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="m-0">Counter/Unit/Desk List</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ url('counter-desks/create') }}" class="btn btn-sm btn-success">Add New</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Counter Name(EN)</th>
                            <th>Counter Name(BN)</th>
                            <th>Branch Name</th>
                            <th>Concern Name</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th class="text-right" width="15%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($counter_desks as $key=>$counter_desk)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $counter_desk->counter_name ?? '' }}</td>
                                <td>{{ $counter_desk->counter_name_bn ?? '' }}</td>
                                <td>{{ $counter_desk->getBranches->name ?? '' }}</td>
                                <td>{{ $counter_desk->getConcerns->concern_name ?? '' }}</td>
                                <td>{{ $counter_desk->mobile ?? '' }}</td>
                                <td>{{ ($counter_desk->status == 0 ? 'Inactive' : 'Active') ?? '' }}</td>
                                <td class="text-right">
                                    @if($counter_desk->status === 0)
                                        <a href="{{ url('counter-desks/status/'.$counter_desk->id ?? 0) }}" class="btn btn-sm btn-success action_btn" title="Active">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    @else
                                        <a href="{{ url('counter-desks/status', $counter_desk->id ?? 0) }}" class="btn btn-sm btn-secondary action_btn" title="Inactive">
                                            <i class="fas fa-minus"></i>
                                        </a>
                                    @endif
                                    <a href="{{ url('counter-desks/edit/'.$counter_desk->id ?? 0) }}" class="btn btn-sm btn-warning action_btn" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ url('counter-desks/delete/'.$counter_desk->id ?? 0) }}" class="btn btn-sm btn-danger action_btn" title="Remove">
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


