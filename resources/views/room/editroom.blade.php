@extends('layouts.master')
@section('menu')
@extends('sidebar.editroom')
@endsection
@section('content')
    <style>
        .avatar {
            background-color: #aaa;
            border-radius: 50%;
            color: #fff;
            display: inline-block;
            font-weight: 500;
            height: 38px;
            line-height: 38px;
            margin: -38px 10px 0 0;
            text-align: center;
            text-decoration: none;
            text-transform: uppercase;
            vertical-align: middle;
            width: 38px;
            position: relative;
            white-space: nowrap;
            z-index: 2;
        }
    </style>
    {{-- message --}}
    
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Edit Room</h3> 
                    </div>
                </div>
            </div>
            @foreach ($editRoom as $room )
            <form action="{{ route('form/room/update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row formtype">
                            <input class="form-control" type="hidden" name="room_id" value="{{ $room->room_id }}" readonly>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>HotelID</label> <button type="button" onclick="getHotelInfo()" style="float: right;" >Find</button>
                                    <select class="form-control @error('name') is-invalid @enderror" id="hotelID" name="hotelID">
                                        <option disabled> --Select ID-- </option>
                                        <option value="{{ $room->HotelID }}">{{ $room->HotelID }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                   <div class="form-group">
                                        <label>Hotel Name</label>
                                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="hotelName" name="hotelName" value="{{ $room->hotel->name }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Number of Room</label>
                                        <input type="number" class="form-control @error('phone_number') is-invalid @enderror" id="numberOfRooms" name="numberOfRooms" value="{{ $room->hotel->NumberOfRoom }}" readonly>
                                    </div>
                                </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Room Number</label>
                                    <input type="number" class="form-control @error('phone_number') is-invalid @enderror" id="room_number" name="room_number" required value="{{ $room->room_no }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Room_Type</label>
                                    <select class="form-control @error('bed_count') is-invalid @enderror" id="room_type" name="room_type" required value="{{ $room->room_type }}">
                                        <option disabled>--Select--</option>
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
                                    <input type="number" class="form-control @error('phone_number') is-invalid @enderror" id="room_price" name="room_price" required value="{{ $room->room_price }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Room Image</label>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input @error('fileupload') is-invalid @enderror" id="room_Image" name="room_Image" multiple onchange="displaySelectedFiles()" value="{{ $room->room_Image }}">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit">Update</button>
            </form>
            @endforeach
        </div>
    </div>
    @section('script')
    <script>
        $(function() {
            $('#datetimepicker3').datetimepicker({
                format: 'LT'
            });
        });
        </script>
    @endsection
@endsection