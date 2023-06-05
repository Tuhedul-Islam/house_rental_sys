@extends('frontend.layout')
@section('navbar')
    @include('frontend.navbar')
@endsection
@section('footer')
    @include('frontend.footer')
@endsection
@section('content')
    <div class="offers">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="margin-bottom: 10px">
                    <div class="offers_grid">
                        <form method="post" action="{{url('new-house-store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="house_type">House Type</label>
                                    <select id="house_type" name="house_type" class="form-control">
                                        <option>Select Type</option>
                                        <option value="1">Small</option>
                                        <option value="2">Medium</option>
                                        <option value="3">Large</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="location">Location</label>
                                    <input type="text" name="location" class="form-control" id="location" placeholder="location">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" class="form-control" id="price" placeholder="price">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="image">House Image</label>
                                    <input type="file" name="image" class="form-control-file" id="image">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="no_of_rooms">Total Rooms</label>
                                    <input type="number" name="no_of_rooms" class="form-control" id="no_of_rooms" placeholder="no of rooms">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="no_of_belcony">Total Belcony</label>
                                    <input type="number" name="no_of_belcony" class="form-control" id="no_of_belcony" placeholder="no of belcony">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="service_charge">Service Charge (TK)</label>
                                    <input type="number" name="service_charge" class="form-control" id="service_charge" placeholder="service charge">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="gas_available">Gas Available</label>
                                    <select id="gas_available" name="gas_available" class="form-control">
                                        <option>Select</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="current_bill">Electricity Bill</label>
                                    <select id="current_bill" name="current_bill" class="form-control">
                                        <option>Select</option>
                                        <option value="1">Included</option>
                                        <option value="2">Not Included</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="generator">Generator Available</label>
                                    <select id="generator" name="generator" class="form-control">
                                        <option>Select</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

