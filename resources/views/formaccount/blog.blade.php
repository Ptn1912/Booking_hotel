@extends('layouts.master')
@section('menu')
@extends('sidebar.blog')
@endsection
@section('content')
    {{-- message --}}
    
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="card-title float-left mt-2">All Blog</h4>  </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card ">
                            <div class="card-body booking_card">
                                <div class="table-responsive">
                                 
                                    <table class="datatable table table-stripped table table-hover table-center mb-0 text-center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Hotel Name</th>
                                                <th>Image</th>
                                                <th>Review</th>
                                                <th>Date</th>
                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($allblog as $blog)
                                        <tr id="tr_{{$blog->id}}">
                                            <td hidden class="id">{{$blog->id}}</td>
                                   
                                            <td class="text-center">{{$blog->id}}</td>
                                            <td>
                                            {{$blog->user->name}}
                                            </td>
                                            <td class="text-center">{{$blog->user->email}}</td>
                                            <td>{{$blog->HotelName}}</td>
                                            <td class="text-center">
                                            <img src="assets/images/blog/{{$blog->image}}" height="100px" width="100px"></td>
                                            <td class="" style="max-width: 250px;">{{$blog->review}}</td>
                                            <td class="" style="max-width: 250px;">{{$blog->created_at}}</td>
                                            <td class="text-right">
                                                        <a class="dropdown-item delete_asset bg-danger-light " href="javascript:void(0)" onclick="deleteBlog({{$blog->id}})" data-toggle="modal" data-target="#delete_asset">
                                                             <i class="fas fa-trash-alt m-r-5"></i> Delete 
                                                        </a> 
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
       function deleteBlog(id) {
    if (confirm("Are you sure want to delete this Blog?")) {
        $.ajax({
            url: '/delete-blog/' + id,
            type: 'DELETE', 
            data: {
                _token: $('meta[name="csrf-token"]').attr('content') // Gửi token CSRF
            },
            success: function(result) {
                $("#" + result.tr).slideUp("slow"); 
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); 
            }
        });
    }
}

    </script>

@endsection

@endsection