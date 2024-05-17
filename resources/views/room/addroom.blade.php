@extends('layouts.master')
@section('menu')
@extends('sidebar.addroom')
@endsection
@section('content')
    {{-- message --}}
    
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Add Room</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('form/room/save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>HotelID</label> <button type="button" onclick="getHotelInfo()" style="float: right;" >Find</button>
                                    <select class="select2 form-control @error('name') is-invalid @enderror" id="hotelID" name="hotelID">
                                        <option selected disabled> --Select ID-- </option>
                                        @foreach ($data as $hotels )
                                        <option value="{{ $hotels->HotelID }}">{{ $hotels->HotelID }}</option>                                       
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                   <div class="form-group">
                                        <label>Hotel Name</label>
                                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="hotelName" name="hotelName" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Number of Room</label>
                                        <input type="number" class="form-control @error('phone_number') is-invalid @enderror" id="numberOfRooms" name="numberOfRooms" readonly>
                                    </div>
                                </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Room Number</label>
                                    <input type="number" class="form-control @error('phone_number') is-invalid @enderror" id="room_number" name="room_number" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Room_Type</label>
                                    <select class="form-control @error('bed_count') is-invalid @enderror" id="room_type" name="room_type" required>
                                        <option disabled selected>--Select--</option>
                                        <option value="Phòng bình dân">Phòng bình dân</option>
                                        <option value="Phòng Vip 1">Vip 1</option>
                                        <option value="Phòng Vip 2">Vip 2</option>
                                        <option value="Phòng gia đình">Phòng gia đình</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" class="form-control @error('phone_number') is-invalid @enderror" id="room_price" name="room_price" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Room Image</label>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input @error('fileupload') is-invalid @enderror" id="room_Image" name="room_Image" multiple onchange="displaySelectedFiles()">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit ml-2">Save</button>
                <button type="button" class="btn btn-primary buttonedit">Cancel</button>
            </form>
        </div>
    </div>
    @section('script')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    @endsection
@endsection