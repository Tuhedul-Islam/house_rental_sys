@extends('backend.layout.master')
@section('content')
    <div class="row" style="margin-top: 55px">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #DDDDDD">
                    <div class="row">
{{--                        <div class="col-md-6">--}}
{{--                            <h3 class="m-0">{{ ($user_type==1)?'User List':(($user_type==2)?'House owner List':'Customer List') }}</h3>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 text-right">--}}
{{--                            @if($user_type==1)--}}
{{--                            <a href="{{ asset('users/create') }}" class="btn btn-sm btn-success">Add New</a>--}}
{{--                            @endif--}}
{{--                        </div>--}}
                    </div>
                </div>

                <div class="row">
                    <div class="card-body">
                        <h3>House Owner Name: <u>{{ $house_owner->name }}</u></h3>
                        <h6>Phone No: {{ $house_owner->phone_no??'' }}</h6>
                        <h6>Total Houses: {{ $houses? count($houses):0 }}</h6>
                    </div>
                </div>

                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Location</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Rooms</th>
                            <th>Belcony</th>
                            <th>Service charge</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Booked By</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($houses as $key=>$house)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $house->location ?? '' }}</td>
                                <td>{{ $house->price ?? '' }}</td>
                                <td><img height="50px" src="{{asset($house->image)}}" alt=""></td>
                                <td>{{ $house->no_of_rooms ?? '' }}</td>
                                <td>{{ $house->no_of_belcony ?? '' }}</td>
                                <td>{{ $house->service_charge ?? '' }}</td>
                                <td>{{ $house->description ?? '' }}</td>
                                <td>{{ ($house->booked_status == 0 ? 'Not Booked' : 'Booked') ?? '' }}</td>
                                <td>
                                    {{ $house->bookedBy->name ?? '' }} <br>
                                    {{ $house->bookedBy->phone_no ?? '' }}
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


