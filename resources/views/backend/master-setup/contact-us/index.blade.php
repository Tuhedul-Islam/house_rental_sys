@extends('backend.layout.master')
@push('css')
    <style>
        .truncate {
            max-width:400px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
@endpush
@section('content')
    <div class="row" style="margin-top: 55px">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #DDDDDD">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="m-0">Contact Us</h3>
                        </div>
                        <div class="col-md-6 text-right">
{{--                            <a href="{{ url('contact-us/create') }}" class="btn btn-sm btn-success">Add</a>--}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($contact_us as $key=>$contact)
                            <tr class="{{ ($contact->seen_status == 2)? 'font-weight-bold':'' }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $contact->name ?? '' }}</td>
                                <td>{{ $contact->email ?? '' }}</td>
                                <td>{{ $contact->subject ?? '' }}</td>
                                <td>
                                    <span class="d-inline-block truncate">{!! $contact->message ?? "" !!}</span>
                                </td>
                                <td>{{ ($contact->seen_status == 2 ? 'Unseen' : 'Seen') ?? '' }}</td>
                                <td class="text-right">
                                    <a href="{{ url('contact-us/view', $contact->id ?? 0) }}" class="btn btn-sm btn-info action_btn" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ url('contact-us/delete', $contact->id ?? 0) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger action_btn" title="Remove">
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
