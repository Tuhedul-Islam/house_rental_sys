@extends('backend.layout.master')
@section('content')
    <div class="row" style="margin-top: 55px">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #DDDDDD">
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Review User Info</th>
                            <th>House Info</th>
                            <th>House Img</th>
                            <th>Review</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($reviews as $key=>$review)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $review->reviewBy->name ?? '' }} <br>
                                    {{ $review->reviewBy->email ?? '' }} <br>
                                    {{ $review->reviewBy->phone_no ?? '' }}
                                </td>
                                <td>
                                    location: {{ $review->reviewedHouse->location ?? '' }} <br>
                                    price: {{ $review->reviewedHouse->price ?? '' }} <br>
                                    no_of_rooms: {{ $review->reviewedHouse->no_of_rooms ?? '' }}
                                </td>
                                <td><img height="50px" src="{{ asset($review->reviewedHouse->image) }}" alt="img"> </td>
                                <td>{{ $review->review ?? '' }}</td>
                                <td class="text-right">
                                    <a href="{{ asset('settings/house-review-delete/'.$review->id) }}" onclick="return confirm('Are you sure?');" class="btn btn-sm btn-danger action_btn" title="Delete">
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


