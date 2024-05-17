@extends('layouts.master')
@section('menu')
@extends('sidebar.allroom')
@endsection
@section('content')
    {{-- message --}}

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="card-title float-left text-center mt-2">All Rooms</h4>
                            <a href="{{URL::to('/add-room')}}" class="btn btn-primary float-right veiwbutton">Add Room</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body booking_card">
                            <div class="table-responsive">
                                <table class="datatable table table-stripped table table-hover table-center mb-0 text-center">
                                    <form action="{{ route('room/search') }}" method="GET">
                                        <div style="display: flex">
                                      <select name="hotel_id" class="form-select select2 form-control" style="max-width: 300px;">
                                      <option value="" selected>Select Hotel</option>
                                         @foreach($hotels as $hotel)
                                      <option value="{{ $hotel->HotelID }}">{{ $hotel->name }}</option>
                                          @endforeach
                                        </select>
                                      <button type="submit" class="btn btn-primary">Search</button></div>
                                    </form>
                                    <thead>
                                        <tr>
                                            <th class="text-center">Room ID</th>
                                            <th class="text-center">Hotel Name</th>
                                            <!-- <th class="text-center">Room Number</th> -->
                                            <th class="text-center">Room Type</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Room Image</th>
                                            <th class="text-center">Status</th>

                                            <th class="text-right text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rooms as $room)
                                        <tr>
                                            <td hidden class="id">{{$room->room_id}}</td>
                                            <td class="text-center">{{$room->room_id}}</td>
                                            <td>{{$room->hotel->name}}</td>
                                            <!-- <td class="text-center">{{$room->room_no}}</td> -->
                                            <td>{{$room->room_type}}</td>
                                            <td class="text-center">{{$room->room_price}}</td>
                                            <td><img src="room/{{$room->room_Image}}" height="100px" width="100px"></td>
                                            <td class="text-center">
                                               <?php
                                               if($room->room_status==1)
                                               {
                                               ?>
                                                <div class="actions text-center"> <a href="{{URL::to('/active/'.$room->room_id)}}" class="btn btn-sm bg-success-light mr-2 text-center">Active</a> </div>
                                                <?php
                                               }elseif($room->room_status==0){
                                                ?>
                                                <div class="actions"> <a href="{{URL::to('/inactive/'.$room->room_id)}}" class="btn btn-sm bg-danger-light mr-2">Inactive</a> </div>
                                                <?php
                                               }else{
                                                ?>
                                                <div class="actions"> <a href="" class="btn btn-sm bg-warning-light mr-2">Working</a> </div>
                                     <?php
                                               }
                                                ?>
                                            </td>

                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v ellipse_color"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{URL::to('/edit-room/'.$room->room_id)}}">
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
                    <div class="modal-body text-center">
                    <form action="{{ route('form/room/delete') }}" method="POST">
                        @csrf
                        <div class="modal-body text-center"> <img src="{{asset('assets_admin/img/sent.png') }}" alt="" width="50" height="46">
                            <h3 class="delete_class">Are you sure want to delete this Asset?</h3>
                            <div class="m-t-20">
                                <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                                <input class="form-control" type="hidden" id="e_id" name="room_id" value="">
                                <input class="form-control" type="hidden" id="e_fileupload" name="image" value="">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- end delete model --}}
    </div>
    @section('script')

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
