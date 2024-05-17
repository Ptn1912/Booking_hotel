@extends('layouts.master')
@section('menu')
@extends('sidebar.edithotel')
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
            <?php 
							$message = Session::get('message');
							if($message)
							echo $message;
						    Session::put('message', null);
							?>
            @foreach ($editHotels as $hotels)
            <form action="{{ route('Updated-Hotels') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class=" formtype">
                        <input class="form-control" type="hidden" name="HotelID" value="{{ $hotels->HotelID }}" readonly>
                        <div class="hotel-row col-md-4">
                                <div class="form-group">
                                    <label>Hotel Name</label>
                                    <input type="text" class="form-control @error('rent') is-invalid @enderror" id="hotelName" name="hotelName" value="{{$hotels->name}}">
                                </div>
                            </div>
                            <div class="hotel-row col-md-4">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control @error('rent') is-invalid @enderror" id="hotelAddress" name="hotelAddress" value="{{ $hotels->address }}">
                                </div>
                            </div>
                            <div class="hotel-row col-md-4">
                                <div class="form-group">
                                    <label>Hotel Image</label>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input @error('fileupload') is-invalid @enderror" id="hotelImage" name="hotelImage" onchange="displaySelectedFiles()" multiple value="{{ $hotels->ImageHotel }}">
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