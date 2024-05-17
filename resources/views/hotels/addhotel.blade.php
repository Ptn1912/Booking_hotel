@extends('layouts.master')
@section('menu')
@extends('sidebar.addhotel')
@endsection
@section('content')
    {{-- message --}}
    
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Add Hotel</h3>
                    </div>
                </div>
            </div>
            <form action="{{URL::to('save-Hotel')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                <?php 
							$message = Session::get('message');
							if($message)
							echo $message;
						    Session::flash('message', null);
							?>
                    <div class="col-lg-12">
                        <div class=" formtype">
                            <div class="hotel-row col-md-4">
                                <div class="form-group">
                                    <label>Hotel Name</label>
                                    <input type="text" class="form-control @error('rent') is-invalid @enderror" id="hotelName" name="hotelName" required>
                                </div>
                            </div>
                            <div class="hotel-row col-md-4">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control @error('rent') is-invalid @enderror" id="hotelAddress" name="hotelAddress" required>
                                </div>
                            </div>
                            <div class="hotel-row col-md-4">
                                <div class="form-group">
                                    <label>Hotel Image</label>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input @error('fileupload') is-invalid @enderror" id="hotelImage" name="hotelImage" multiple onchange="displaySelectedFiles()">
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
@endsection