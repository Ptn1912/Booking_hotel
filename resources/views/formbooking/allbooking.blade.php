@extends('layouts.master')
@section('menu')
@extends('sidebar.allbooking')
@endsection
@section('content')
    {{-- message --}}

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="card-title float-left mt-2 logoclass">All Booking</h4>
                            <!-- <a href="" class="btn btn-primary float-right veiwbutton ">Add Booking</a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body booking_card">
                            <div class="table-responsive">
                                <table class="datatable table table-stripped table table-hover table-center mb-0">
                                    <form action="{{ route('booking/search') }}" method="GET">
                                        <div style="display:flex;">
                                       <input type="text" name="keyword" placeholder="Search by client name..." class="form-control" style="max-width:300px">
                                       <button type="submit" class="btn btn-primary">Search</button></div>
                                   </form>
                                    <thead>
                                        <tr>
                                            <th>Booking ID</th>
                                            <th>Client Information</th>
                                            <th>Hotel Name</th>
                                            <th>Room Information</th>
                                            <th>Booking Information</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($invoices as $bookingdetails)
                                        <tr>
                                            <td hidden class="id">{{$bookingdetails->invoice_id}}</td>
                                            <td class="text-center">{{$bookingdetails->bookingdetails_id}}</td>
                                            <td>
                                                <b>Book Code:</b> {{ $bookingdetails->bookingDetail->book_code ?? 'N/A' }} <br>
                                            {{-- <b>Name:</b> {{$bookingdetails->bookingDetail->booking->reservation->reservate_name}} <br>
                                            <b>Phone number:</b> {{$bookingdetails->bookingDetail->booking->reservation->reservate_phone}} <br>
                                            <b>Address:</b> {{$bookingdetails->bookingDetail->booking->reservation->reservate_address}} --}}
                                            </td>
                                            {{-- <td>{{$bookingdetails->bookingDetail->room->hotel->name}}</td>
                                            <td>
                                                <b>Room type:</b>  {{$bookingdetails->bookingDetail->room_type}} <br>
                                                  <b>Price:</b> {{$bookingdetails->bookingDetail->room->room_price}} <b>VNĐ</b>

                                            </td>
                                            <td>
                                                 <b>Checkin Date:</b> {{$bookingdetails->bookingDetail->created_at}} <br>
                                                 <b>Quantity:</b> {{$bookingdetails->bookingDetail->quantity}} <br>
                                                 <b>Checkout Date:</b> {{$bookingdetails->checkout_date}} <br>
                                                 <b>Total:</b> {{$bookingdetails->total}} <b>VNĐ</b> --}}
                                            </td>
                                            <td style="text-align: center">
                                                <a target="_blank" href="{{URL::to('/print-order/'.$bookingdetails->invoice_id)}}" class="btn btn-sm bg-success-light mr-2"><i class="fa-solid fa-print" style="font-size: 25px;"></i></a>
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v ellipse_color"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item delete_asset" href="#" data-toggle="modal" data-target="#delete_asset">
                                                            <i class="fas fa-trash-alt m-r-5"></i> Delete
                                                        </a>
                                                    </div>
                                                </div>
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
        </div>
        {{-- Model delete --}}
        <div id="delete_asset" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{Route('Delete/Invoice')}}" method="POST">
                        @csrf
                        <div class="modal-body text-center"> <img src="{{asset('assets_admin/img/sent.png') }}" alt="" width="50" height="46">
                            <h3 class="delete_class">Are you sure want to delete this Asset?</h3>
                            <div class="m-t-20">
                                <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                                <input class="form-control" type="hidden" id="e_id" name="invoice_id" value="">
                                <input class="form-control" type="hidden" id="e_fileupload" name="fileupload" value="">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End Model delete --}}
    </div>
    @section('script')
    {{-- delete model --}}
    <script>
            $(document).on('click','.delete_asset',function()
            {
                var _this = $(this).parents('tr');
                $('#e_id').val(_this.find('.id').text());
                $('#e_fileupload').val(_this.find('.fileupload').text());
            });
        </script>

    @endsection
@endsection
