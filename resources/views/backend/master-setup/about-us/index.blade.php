@extends('backend.layout.master')
@section('content')
    <div class="row" style="margin-top: 55px">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #DDDDDD">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="m-0">About Us</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            {{--<a href="{{ url('sliders/create') }}" class="btn btn-sm btn-success">Add</a>--}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                    <td>{{ '1' }}</td>
                                    <td><img height="50px" src="{{ $about_us->about_img }}" alt="About Us img"></td>
                                    <td>{{ $about_us->title ?? '' }}</td>
                                    <td>{{ $about_us->desc ?? '' }}</td>
                                    <td class="text-right">
                                        <a href="{{ url('about-us/edit', $about_us->id ?? 0) }}" class="btn btn-sm btn-warning action_btn" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
