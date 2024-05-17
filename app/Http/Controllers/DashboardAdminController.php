<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Statistic;
use App\Models\Invoice;
use App\Models\Room;
use Carbon\Carbon;
use DB;
class DashboardAdminController extends Controller
{
   public function filter_by_date(Request $request)
   {
       $from_date = $request->input('from_date');
       $to_date = $request->input('to_date');
   
       $statistics = Statistic::whereBetween('order_date', [$from_date, $to_date])
                               ->orderBy('order_date', 'ASC')
                               ->get();
   
       $chartData = [];
       foreach ($statistics as $statistic) {
           $chartData[] = [
               'period' => $statistic->order_date,
               'total' => $statistic->total_order,
               'profit' => $statistic->profit
           ];
       }
   
       return response()->json($chartData); 
   }
   public function dashboard_filter(Request $request)
   {
       $data = $request->all();

      $dau_thangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
      $dau_thang_truoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
      $cuoi_thang_truoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
     
      $sub_7_days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
      $sub_365_days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();

      $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
      $chartData = [];

      if($data['dashboard_value'] == '7ngay'){
          $get = Statistic::whereBetween('order_date', [$sub_7_days, $now])->orderBy('order_date' , 'ASC')->get();
      }elseif($data['dashboard_value'] == 'thangtruoc'){
          $get = Statistic::whereBetween('order_date', [$dau_thang_truoc, $cuoi_thang_truoc])->orderBy('order_date' , 'ASC')->get();
      }elseif($data['dashboard_value'] == 'thangnay'){
          $get = Statistic::whereBetween('order_date', [$dau_thangnay, $now])->orderBy('order_date' , 'ASC')->get();
      }else{
          $get = Statistic::whereBetween('order_date', [$sub_365_days, $now])->orderBy('order_date' , 'ASC')->get();
      }
      foreach ($get as $statistic => $val) {
         $chartData[] = [
             'period' => $val->order_date,
             'total' => $val->total_order,
             'profit' => $val->profit
         ];
     }
     return response()->json($chartData); 
   }
   public function days_order(){
      $sub30day = Carbon::now('Asia/Ho_Chi_Minh')->subDays(30)->toDateString();
      $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
      $get = Statistic::whereBetween('order_date', [$sub30day,$now])->orderBy('order_date', 'ASC')->get();
      
      $chartData = [];
      foreach ($get as $statistic) {
          $chartData[] = [
              'period' => $statistic->order_date,
              'total' => $statistic->total_order,
              'profit' => $statistic->profit
          ];
      }
  
      return response()->json($chartData); 

   }
   public function statistic()
{
    $totalOrderSum = Statistic::sum('total_order');

    $totalHotel = Product::count();

    $totalRoomAvai = Room::where('room_status', 1)->count();

    $totalProfit = Statistic::sum('profit');

    return view('dashboard.home', compact('totalOrderSum', 'totalHotel', 'totalRoomAvai', 'totalProfit'));
}


}

