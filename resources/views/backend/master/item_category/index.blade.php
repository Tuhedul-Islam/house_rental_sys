@extends('backend.layout.master')
@section('content')
    <div class="row" style="margin-top: 55px">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #DDDDDD">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="m-0">Item Category</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('item_category_create') }}" class="btn btn-sm btn-success">Add New</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Status(s)</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($items as $key=>$item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name ?? '' }}</td>
                                    <td>{{ ($item->status == 0 ? 'Inactive' : 'Active') ?? '' }}</td>
                                    <td class="text-right">
                                        @if($item->status === 0)
                                        <a href="{{ route('item_category_status', $item->id ?? 0) }}" class="btn btn-sm btn-success action_btn" title="Active">
                                            <i class="fas fa-check"></i>
                                        </a>
                                        @else
                                            <a href="{{ route('item_category_status', $item->id ?? 0) }}" class="btn btn-sm btn-secondary action_btn" title="Inactive">
                                                <i class="fas fa-minus"></i>
                                            </a>
                                        @endif
                                        <a href="{{ route('item_category_edit', $item->id ?? 0) }}" class="btn btn-sm btn-warning action_btn" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('item_category_remove', $item->id ?? 0) }}" class="btn btn-sm btn-danger action_btn" title="Remove">
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
