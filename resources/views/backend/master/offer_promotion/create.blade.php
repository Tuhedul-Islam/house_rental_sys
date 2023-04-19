@extends('backend.layout.master')
@section('content')
    <div class="row" style="margin-top: 55px">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #DDDDDD">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="m-0">Create Offer & Promotion</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ url('/offer-promotion') }}" class="btn btn-sm btn-success">Back to List</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('/offer-promotion/store') }}" class="" method="POST" enctype='multipart/form-data'>
                        @CSRF
                        <div class="row">
                            <div class="col-md-12 px-4">
                                <div class="form-group row">
                                    <label for="offer_promotion_name" class="col-form-label text-secondary">Offer Name <span class='required_star'> *</span></label>
                                    <input type="text" class="form-control" name="offer_promotion_name" id="offer_promotion_name" placeholder="Offer Name" autofocus autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-12 px-4">
                                <div class="form-group row">
                                    <label for="description" class="col-form-label text-secondary">Offer Description <span class='required_star'> *</span></label>
                                    <textarea class="form-control" rows="3" name="description" id="description" placeholder="Description"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 px-4">
                                <div class="form-group row">
                                    <label for="start_date" class="col-form-label text-secondary">Start Date <span class='required_star'> *</span></label>
                                    <input type="date" class="form-control" name="start_date" id="start_date" placeholder="Start Date" autofocus autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-12 px-4">
                                <div class="form-group row">
                                    <label for="end_date" class="col-form-label text-secondary">End date <span class='required_star'> *</span></label>
                                    <input type="date" class="form-control" name="end_date" id="end_date" placeholder="End Date" autofocus autocomplete="off" required>
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
