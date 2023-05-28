@extends('backend.layout.master')
@section('content')
    <div class="row" style="margin-top: 55px">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #DDDDDD">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="m-0">Slider</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ url('sliders') }}" class="btn btn-sm btn-success">Back to List</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('sliders/store') }}" method="post" enctype='multipart/form-data'>
                        @CSRF
                        <div class="row">
                            <div class="col-md-6 px-4">
                                <div class="form-group row">
                                    <label for="text_content" class="col-form-label text-secondary">Slider text content <span class='required_star'> *</span></label>
                                    <input type="text" class="form-control" name="text_content" id="text_content" autofocus autocomplete="off" required>
                                    @if ($errors->has('text_content'))
                                        <span class="error_alert text-danger" role="alert">
                                            {{ $errors->first('text_content') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 px-4">
                                <div class="form-group row">
                                    <label for="slider_img" class="col-form-label text-secondary">Slider Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="slider_img" id="slider_img">
                                            <label class="custom-file-label" for="slider_img">Choose file</label>
                                        </div>
                                    </div>
                                    @if ($errors->has('slider_img'))
                                        <span class="error_alert text-danger" role="alert">
                                            {{ $errors->first('slider_img') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12 px-4">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-info float-right" accesskey="s">Submit</button>
                                    <button type="reset" class="btn btn-warning float-right text-white mr-1">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
