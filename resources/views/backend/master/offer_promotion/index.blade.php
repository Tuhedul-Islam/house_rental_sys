@extends('backend.layout.master')
@section('content')
    <div class="row" style="margin-top: 55px">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #DDDDDD">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="m-0">Offer & Promotion List</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ url('/offer-promotion/create') }}" class="btn btn-sm btn-success">Add New</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Offer Name</th>
                            <th>Description</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status(s)</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($offer_promotions as $key=>$offer_promotion)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $offer_promotion->offer_promotion_name ?? '' }}</td>
                                    <td>{{ $offer_promotion->description ?? '' }}</td>
                                    <td>{{ $offer_promotion->start_date ?? '' }}</td>
                                    <td>{{ $offer_promotion->end_date ?? '' }}</td>
                                    <td>{{ ($offer_promotion->status == 0 ? 'Inactive' : 'Active') ?? '' }}</td>
                                    <td class="text-right">
                                        @if($offer_promotion->status === 0)
                                        <a href="{{ url('/offer-promotion/status', $offer_promotion->id ?? 0) }}" class="btn btn-sm btn-success action_btn" title="Active">
                                            <i class="fas fa-check"></i>
                                        </a>
                                        @else
                                            <a href="{{ url('/offer-promotion/status', $offer_promotion->id ?? 0) }}" class="btn btn-sm btn-secondary action_btn" title="Inactive">
                                                <i class="fas fa-minus"></i>
                                            </a>
                                        @endif
                                        <a href="{{ url('/offer-promotion/edit', $offer_promotion->id ?? 0) }}" class="btn btn-sm btn-warning action_btn" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ url('/offer-promotion/delete', $offer_promotion->id ?? 0) }}" class="btn btn-sm btn-danger action_btn" title="Remove">
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
