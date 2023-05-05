@extends('backend.layout.master')
@section('content')
    <div class="row" style="margin-top: 55px">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #DDDDDD">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="m-0">Language List</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            {{--<a href="{{ asset('users/create') }}" class="btn btn-sm btn-success">Add New</a>--}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse(range(1,2) as $i)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ ($i==1)? "English":"Bangla" }}</td>
                                <td class="text-right">
                                    <a href="{{ url('/settings/language/edit/'.(($i==1)? "en":"bn")) }}" class="btn btn-sm btn-warning action_btn" title="Edit">
                                        <i class="fas fa-edit"></i>
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


