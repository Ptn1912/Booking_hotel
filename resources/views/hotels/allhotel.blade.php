@extends('layouts.master')
@section('menu')
@extends('sidebar.allhotel')
@endsection
@section('content')
    {{-- message --}}

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="card-title float-left mt-2">All Hotels</h4>
                            <a href="{{URL::to('/add-hotel')}}" class="btn btn-primary float-right veiwbutton">Add Hotel</a>
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
                                    <thead>
                                        <tr>
                                            <th>Hotel ID</th>
                                            <th>Hotel Name</th>
                                            <th>Address</th>
                                            <th>Image of Hotel</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($allHotels as $hotels)
                                        <tr>
                                            <td hidden class="id">{{ $hotels->HotelID }}</td>
                                            <td class="text-center">{{ $hotels->HotelID }}</td>
                                            <td>{{ $hotels->name }}</td>
                                            <td>{{ $hotels->address }}</td>

                                            <td><img src="{{url('assets/images/cart') }}/{{ $hotels->ImageHotel}}" height="100px" width="100px"></td>


                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v ellipse_color"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{URL::to('/edit-hotel/'.$hotels->HotelID)}}">
                                                            <i class="fas fa-pencil-alt m-r-5"></i> Edit
                                                        </a>
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

        {{-- delete model --}}
        <div id="delete_asset" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('Delete-Hotels') }}" method="POST">
                        @csrf
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <div class="modal-body text-center"> <img src="{{asset('assets_admin/img/sent.png') }}" alt="" width="50" height="46">
                            <h3 class="delete_class">Are you sure want to delete this Asset?</h3>
                            <div class="m-t-20">
                                <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                                <input class="form-control" type="hidden" id="e_id" name="HotelID" value="">
                                <input class="form-control" type="hidden" id="e_fileupload" name="image" value="">
                                <button type="submit" class="btn btn-danger delete-hotel-btn">Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- end delete model --}}
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
