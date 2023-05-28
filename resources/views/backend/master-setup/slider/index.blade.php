@extends('backend.layout.master')
@section('content')
    <div class="row" style="margin-top: 55px">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #DDDDDD">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="m-0">Slider List</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ url('sliders/create') }}" class="btn btn-sm btn-success">Add</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Image</th>
                            <th>Content Text</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($sliders as $key=>$slider)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img height="50px" src="{{ $slider->slider_img }}" alt="slider img"></td>
                                    <td>{{ $slider->text_content ?? '' }}</td>
                                    <td>{{ ($slider->status == 2 ? 'Inactive' : 'Active') ?? '' }}</td>
                                    <td class="text-right">
                                        @if($slider->status === 2)
                                        <a href="{{ url('sliders/status', $slider->id ?? 0) }}" class="btn btn-sm btn-success action_btn" title="Active">
                                            <i class="fas fa-check"></i>
                                        </a>
                                        @else
                                            <a href="{{ url('sliders/status', $slider->id ?? 0) }}" class="btn btn-sm btn-secondary action_btn" title="Inactive">
                                                <i class="fas fa-minus"></i>
                                            </a>
                                        @endif
                                        <a href="{{ url('sliders/edit', $slider->id ?? 0) }}" class="btn btn-sm btn-warning action_btn" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ url('sliders/delete', $slider->id ?? 0) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger action_btn" title="Remove">
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
