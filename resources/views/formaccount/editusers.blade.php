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
                        <h3 class="page-title mt-5">Edit User</h3> 
                    </div>
                </div>
            </div>
            @foreach ($editUsers as $users)
            <form action="{{ route('Updated-Users') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class=" formtype">
                        <input class="form-control" type="hidden" name="id" value="{{ $users->id }}">
                        <div class="hotel-row col-md-4">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control @error('rent') is-invalid @enderror" id="username" name="username" value="{{$users->name}}">
                                </div>
                            </div>
                            <div class="hotel-row col-md-4">
                                <div class="form-group">
                                    <label>email</label>
                                    <input type="text" class="form-control @error('rent') is-invalid @enderror" id="useremail" name="useremail" value="{{ $users->email }}">
                                </div>
                            </div>
                            <div class="hotel-row col-md-4">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control @error('rent') is-invalid @enderror" id="userpassword" name="userpassword"  value="{{ $users->password }}">
                                </div>
                            </div>
                            <div class="hotel-row col-md-4">
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="select2 form-control @error('name') is-invalid @enderror" id="userrole" name="userrole"  value="{{ $users->role }}">
                                        <option disabled> --Select Role-- </option>
                                        <option value="0">User</option>    
                                        <option value="1">Admin</option>                                       
                                    </select>
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