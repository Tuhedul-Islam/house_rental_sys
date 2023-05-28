@extends('backend.layout.master')
@section('content')
    <div class="row" style="margin-top: 55px">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #DDDDDD">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="m-0">About Us Update</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ url('about-us') }}" class="btn btn-sm btn-success">Back to List</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('about-us/update/'.$about_us->id) }}" method="post" enctype='multipart/form-data'>
                        @CSRF
                        <div class="row">
                            <div class="col-md-6 px-4">
                                <div class="form-group row">
                                    <label for="title" class="col-form-label text-secondary">Title <span class='required_star'> *</span></label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ $about_us->title }}" autofocus autocomplete="off" required>
                                    @if ($errors->has('title'))
                                        <span class="error_alert text-danger" role="alert">
                                            {{ $errors->first('title') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 px-4">
                                <div class="form-group row">
                                    <label for="about_img" class="col-form-label text-secondary">About Us Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="about_img" id="about_img">
                                            <label class="custom-file-label" for="about_img">Choose file</label>
                                        </div>
                                    </div>
                                    @if ($errors->has('about_img'))
                                        <span class="error_alert text-danger" role="alert">
                                            {{ $errors->first('about_img') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 px-4">
                                <div class="form-group row">
                                    <label for="desc" class="col-form-label text-secondary">Description <span class='required_star'> *</span></label>
                                    <textarea class="form-control" name="desc" rows="3">{{ $about_us->desc }}</textarea>
                                    @if ($errors->has('desc'))
                                        <span class="error_alert text-danger" role="alert">
                                            {{ $errors->first('desc') }}
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
