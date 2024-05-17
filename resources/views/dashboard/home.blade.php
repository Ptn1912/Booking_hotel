@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')
    {{-- message --}}

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12 mt-5">
                        <h3 class="page-title mt-3">Good Morning !</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card board1 fill">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <div>
                                    <h3 class="card_widget_header"> 
                                    @if(isset($totalOrderSum))
                                                <p>{{ $totalOrderSum }}</p>
                                    @endif
                                        </h3>
                                    <h6 class="text-muted">Total Booking</h6> </div>
                                <div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="8.5" cy="7" r="4"></circle>
                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                <line x1="23" y1="11" x2="17" y2="11"></line>
                                </svg></span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card board1 fill">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <div>
                                    <h3 class="card_widget_header">
                                    @if(isset($totalRoomAvai))
                                                <p>{{ $totalRoomAvai }}</p>
                                    @endif
                                    </h3>
                                    <h6 class="text-muted">Available Rooms</h6> </div>
                                <div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bed">
    <rect x="4" y="8" width="16" height="10" rx="2" ry="2"></rect>
    <line x1="12" y1="8" x2="12" y2="18"></line>
    <line x1="6" y1="8" x2="6" y2="18"></line>
    <line x1="18" y1="8" x2="18" y2="18"></line>
</svg></span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card board1 fill">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <div>
                                    <h3 class="card_widget_header">
                                    @if(isset($totalHotel))
                                                <p>{{ $totalHotel }}</p>
                                    @endif
                                    </h3>
                                    <h6 class="text-muted">Hotel</h6> </div>
                                <div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                </path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="12" y1="18" x2="12" y2="12"></line>
                                <line x1="9" y1="15" x2="15" y2="15"></line>
                                </svg></span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card board1 fill">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <div>
                                    <h3 class="card_widget_header">
                                    @if(isset($totalProfit))
                                                <p>{{ $totalProfit }}</p> 
                                    @endif
                                    </h3>
                                    <h6 class="text-muted">Total Profit</h6> </div>
                                <div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><h3>VNĐ</h3></span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form autocomplete="off" method="post">
                @csrf  <div class="card" style=" margin: 10px auto;">
                        <div class="card-body" style="   display: flex; justify-content: space-between;">
       
                                        <div class="form-group" style=" width: 100%; padding: 8px;">
                                            <label>From</label>
                                            <div class="cal-icon">
                                                <input type="text" class="form-control datetimepicker" id="datetimepicker1" name="from_date">
                                            </div>
                                        </div>
                                  
                                
                                        <div class="form-group" style=" width: 100%; padding: 8px;">

                                            <label>To</label>
                                            <div class="cal-icon">
                                                <input type="text" class="form-control datetimepicker" id="datetimepicker2" name="from_date"> 
                                            </div>
                                        </div>
                                        <div class="form-group" style=" width: 100%; padding: 8px;">

                                            <label>To</label>
                                            <select class="select2 form-control dashboard-filter">
                                             <option selected disabled> --Select-- </option>
                                             <option value="7ngay">Last 7 days</option>    
                                             <option value="thangtruoc">Last month</option>     
                                             <option value="thangnay">This month</option> 
                                             <option value="365ngay">Last 365 days</option>                                   
                                    </select>
                                        </div>
                    
                    </div>
                    <div class="form-group" style="margin: 0px auto 10px" ><input type="button" class="btn btn-primary" id="btn-filter" value="Filter"></div>
                </div>
             
                    <div class="card card-chart">
                        <div class="card-header">
                            <h4 class="card-title">VISITORS</h4> </div>
                        <div class="card-body col-md-12">
                            <div id="myfirstchart" style="height: 250px;"></div>
                        </div>
                    </div>
                
            </div>
                
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('script')
    <script>
        $(function() {
    $('.datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD'
        // Other options specific to your datetimepicker
    });
});
    $(document).ready(function(){
        chart30day();
       var chart = new Morris.Area({

      element: 'myfirstchart',
      lineColors: ['#329ca8','#a8323e','#32a885'],
      pointsFillColors: ['#ffffff'],
      parseTime: false,
      xkey: 'period',

      ykeys: ['total', 'profit'],
  
      labels: ['Order', 'profit']
});

$('#btn-filter').click(function(){
       
       var _token = $('input[name="_token"]').val();
       var from_date = $('#datetimepicker1').val();
       var to_date = $('#datetimepicker2').val();
       $.ajax({
           url: "{{url('/filter-by-date')}}",
           type: 'POST', 
           dataType: "JSON",
           data: {
               from_date:from_date , to_date:to_date, _token:_token
           },
           success: function(data) {
              chart.setData(data);
           }
       });
   });
   $('.dashboard-filter').change(function(){
    var dashboard_value = $(this).val();
       var _token = $('input[name="_token"]').val();
       $.ajax({
           url: "{{url('/dashboard-filter')}}",
           type: 'POST', 
           dataType: "JSON",
           data: {
            dashboard_value:dashboard_value , _token:_token
           },
           success: function(data) {
              chart.setData(data);
           }
       });
   });
   function chart30day(){
       var _token = $('input[name="_token"]').val();
       $.ajax({
           url: "{{url('/days-order')}}",
           type: 'POST', 
           dataType: "JSON",
           data: {
            _token:_token
           },
           success: function(data) {
              chart.setData(data);
           }
       });
   }
    });

   
        </script>
    @endsection
@endsection