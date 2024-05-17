@extends('layouts.master')
@section('menu')
@extends('sidebar.invoices')
@endsection
@section('content')
    {{-- message --}}
    
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5"><b>Edit Invoice</b></h3>
                    </div>
                </div>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                            <h6 class="page-title mt-5 text-center logoclass">Client Information</h6>
                                <div class="row formtype">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control @error('total_numbers') is-invalid @enderror"name="clientname" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Phone number</label>
                                            <input type="number" class="form-control @error('total_numbers') is-invalid @enderror"name="phone" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control @error('total_numbers') is-invalid @enderror"name="address" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    <hr width="90%">
                                <div class="col-lg-12">
                                    <h6 class="page-title mt-5 text-center logoclass">Booking Information</h6>
                                <div class="row formtype">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Room Type</label>
                                            <select class="form-control @error('room_type') is-invalid @enderror" id="room_tyoe" name="room_tyoe">
                                                <option selected disabled> --Select Room Type-- </option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Price</label>
                                            <div>
                                                <input type="number" class="form-control @error('arrival_date') is-invalid @enderror" name="room_price" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <div>
                                                <input type="number" class="form-control @error('arrival_date') is-invalid @enderror" name="quantity" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1">Save</button>
            </form>
        </div>
    </div>
@endsection