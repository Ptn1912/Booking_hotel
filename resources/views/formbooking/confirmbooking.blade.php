@extends('layouts.master')
@section('menu')
@extends('sidebar.bookingadd')
@endsection
@section('content')
    {{-- message --}}

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Add Booking</h3>
                    </div>
                </div>
            </div>
            <form action="" method="POST">
                @csrf
                @if(isset($bookingsToConfirm) && $bookingsToConfirm->count() > 0)
                
                <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body booking_card">
                            <div class="table-responsive">
                                <table class="datatable table table-stripped table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Client Information</th>
                                            <th>Hotel Name</th>
                                            <th>Room Information</th>
                                            <th>Booking Information</th>
                                            <th>Confirm</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bookingsToConfirm as $booking)
                                        <tr>
                                            <td hidden class="id">{{$booking->book_details_id}}</td>
                                            <td>{{$booking->book_details_id}}</td>
                                            <td><b>Book Code:</b> {{$booking->book_code}} <br>
                                                 <b>Name:</b> {{$booking->booking->reservation->reservate_name}} <br>
                                                  <b>Phone number:</b> {{$booking->booking->reservation->reservate_phone}}   
                                            </td>
                                            <td>{{$booking->room->hotel->name}}</td>
                                            <td>
                                                  <b>Room type:</b> {{$booking->room->room_type}} <br>
                                                  <b>Price:</b> {{$booking->room->room_price}} VND
                                            </td>
                                            <td>
                                                 <b>Checkin day:</b> {{$booking->created_at}} <br>
                                                 <b>Checkout day:</b> {{$booking->checkout_date}} <br>
                                                 
                                            </td>
                                            <td>
                                            <div><a href="{{URL::to('/booking-confirmed/'.$booking->book_details_id)}}" class="btn btn-sm bg-success-light mr-2 "><i class="fa-solid fa-square-check"></i> Confirm</a></div> <br>

                                            <div><a href="{{URL::to('/booking-not-confirmed/'.$booking->book_details_id)}}" class="btn btn-sm bg-danger-light mr-2"><i class="fa-sharp fa-solid fa-circle-xmark"></i> Not confirm</a></div>
                                            </td>                          
                                        </tr>
                                   @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
    <p>No bookings to confirm</p>
            @endif
            </form>
        </div>
    </div>
    @section('script')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <script>
        $(function() {
            $('#datetimepicker3').datetimepicker({
                format: 'LT'
            });
        });
        </script>
    @endsection
@endsection