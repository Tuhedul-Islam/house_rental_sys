@extends('backend.layout.master')
@section('content')
    <div class="row" style="margin-top: 55px">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #DDDDDD">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="m-0">Edit Language {{ ($lang=='en')? '(English)':'(Bangla)' }}</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ asset('settings/language-setting') }}" class="btn btn-sm btn-success">Back to List</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('/settings/language/update/'.$lang) }}" class="" method="POST" enctype='multipart/form-data'>
                        @csrf
                        @foreach($data['contents'] as $key=>$value)
                            <div class="row px-3">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label text-secondary">Keyword</label>
                                        <input type="text" name="keywords[]" class="form-control" value="{{ $key }}" readonly autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label text-secondary">Value</label>
                                        <input type="text" name="values[]" class="form-control" value="{{ $value }}" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="row">
                            <div class="col-md-12 px-4">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-info float-right" accesskey="s">Submit</button>
                                    <button type="reset" class="btn btn-warning float-right text-white mr-1">Reset</button>
                                    <button type="submit" class="btn btn-default float-right mr-1">
                                        <a href="{{ url()->previous() }}">Back</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

