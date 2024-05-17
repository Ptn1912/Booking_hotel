@extends('layouts.master')
@section('menu')
@extends('sidebar.allusers')
@endsection
@section('content')
    {{-- message --}}

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="card-title float-left mt-2">All Users</h4> <a href="{{route('Add-Users')}}" class="btn btn-primary float-right veiwbutton">Add User</a> </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body booking_card">
                                <div class="table-responsive">
                                    <table class="datatable table table-stripped table table-hover table-center mb-0 text-center">
                                        <form action="{{ route('user/search') }}" method="GET">
                                            <div style="display:flex;">
                                           <input type="text" name="keyword" placeholder="Search by email..." class="form-control" style="max-width:300px">
                                           <button type="submit" class="btn btn-primary">Search</button></div>
                                       </form>
                                        <thead>
                                            <tr>
                                                <th>User ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Role</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($users as $user)
                                        <tr id="tr_{{$user->id}}">
                                            <td hidden class="id">{{$user->id}}</td>

                                            <td class="text-center">{{$user->id}}</td>
                                            <td>
                                                 {{$user->username}}
                                            </td>
                                            <td class="text-center">{{$user->email}}</td>
                                            <td>{{$user->password}}</td>
                                            <td class="text-center">
                                               <?php
                                               if($user->role==1)
                                               {
                                               ?>
                                                <div class="actions text-center" style="color: red"> Admin </div>
                                                <?php
                                               }else{
                                                ?>
                                                <div class="actions" style="color: green">User </div>
                                                <?php
                                               }
                                                ?>
                                            </td>
                                            <td>
                                            @if($user->role == 0)
                                              <a href="#" class="btn btn-sm bg-danger-light mr-2 change-role" data-user-id="{{ $user->id }}" data-role="{{ $user->role }}">Disable</a>
                                        @elseif($user->role == 3)
                                              <a href="#" class="btn btn-sm bg-success-light mr-2 change-role" data-user-id="{{ $user->id }}" data-role="{{ $user->role }}">Activated</a>
                                            @endif
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v ellipse_color"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{URL::to('/edit-users/'.$user->id)}}">
                                                            <i class="fas fa-pencil-alt m-r-5"></i> Edit
                                                        </a>
                                                        <a class="dropdown-item delete_asset" href="javascript:void(0)" onclick="deleteUser({{$user->id}})" data-toggle="modal" data-target="#delete_asset">
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
        </div>
        @section('script')
    <script type="text/javascript">
       function deleteUser(id) {
    if (confirm("Are you sure want to delete this user?")) {
        $.ajax({
            url: '/delete-user/' + id,
            type: 'DELETE', // Sử dụng phương thức DELETE
            data: {
                _token: $('meta[name="csrf-token"]').attr('content') // Gửi token CSRF
            },
            success: function(result) {
                $("#" + result.tr).slideUp("slow"); // Ẩn phần tử tr của người dùng đã bị xóa
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // In ra lỗi trong trường hợp có lỗi xảy ra
            }
        });
    }
}
$(document).ready(function () {
        $('.change-role').on('click', function (e) {
            e.preventDefault();

            var userId = $(this).data('user-id');
            var currentRole = $(this).data('role');

            // Toggle the role value
            var newRole = (currentRole == 0) ? 3 : 0;

            $.ajax({
                type: 'POST',
                url: '/updateUserRole/' + userId,
                data: {
                    _token: '{{ csrf_token() }}',
                    role: newRole
                },
                success: function (response) {
                    if (response.success) {
                        if (newRole == 0) {
                            $('.change-role[data-user-id="' + userId + '"]').text('Disable').removeClass('bg-success-light').addClass('bg-danger-light').data('role', 0);
                            alert('successfully disabled');
                        } else {
                            $('.change-role[data-user-id="' + userId + '"]').text('Activated').removeClass('bg-danger-light').addClass('bg-success-light').data('role', 3);
                            alert('activated successfully');
                        }
                    } else {
                        alert('Failed to update user role');
                    }
                },
                error: function () {
                    alert('Failed to update user role');
                }
            });
        });
    });
    </script>

@endsection

@endsection
