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
                <div class="search" style="margin-top: 10px; margin-left: 15px; margin-right: 15px;">
                    <div class="container fill_height">
                        <div class="row fill_height">
                            <div class="col fill_height">
                                <u><h3 class="text-center text-capitalize" style="color: white">Logged In User Info</h3></u>
                                <h3 class="text-center text-capitalize" style="color: white"> Name: {!! \Illuminate\Support\Facades\Auth::user()->name !!}</h3>
                                <h3 class="text-center" style="color: white"> Email: {!! \Illuminate\Support\Facades\Auth::user()->email !!}</h3>
                            </div>
                            <div class="col fill_height">
                                <u><h3 class="text-center text-capitalize" style="color: white">Total Houses</h3></u>
                                <h3 class="text-center" style="color: white; margin-top: 30px"><span class="bg-info p-2">Amount: {!! isset($houses)? count($houses):0 !!}</span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12" style="margin-bottom: 10px">
                    <div class="offers_grid">
                        <form method="post" action="{{url('update-owner-password')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="n_pass">New Password</label>
                                    <input type="text" name="n_pass" class="form-control" id="n_pass" placeholder="New Password">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="c_pass">Confirm Password</label>
                                    <input type="text" name="c_pass" class="form-control" id="c_pass" placeholder="Confirm Password">
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

