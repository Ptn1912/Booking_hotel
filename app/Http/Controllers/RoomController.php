<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Hotel;
use App\Models\Book;
use App\Models\Room;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\BookingController;

class RoomController extends Controller
{
    public function allRooms(){
        $data = DB::table('products')->get();

      return view('room.allroom',compact('data'));
    }
    public function addRooms(){
      $data = DB::table('hotels')->get();
      return view('room.addroom',compact('data'));
      }
      public function getHotelInfo($hotelID) {
        $hotel = Hotel::find($hotelID);

        if ($hotel) {
            $data = [
                'hotelName' => $hotel->name,
                'numberOfRooms' => $hotel->NumberOfRoom,
            ];
            return response()->json($data);
        } else {
            return response()->json(['error' => 'Không tìm thấy thông tin khách sạn'], 404);
        }
    }
      public function saveRooms(Request $request)
      {

        $data = [
          'HotelID' => $request->hotelID,
          'room_type' => $request->room_type,
          'room_no' => $request->room_number,
          'room_price' => $request->room_price,
          'room_Image' => '',
      ];
      if ($request->hasFile('room_Image')) {
        $image = $request->file('room_Image');

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $extension = $image->getClientOriginalExtension();

        if (!in_array(strtolower($extension), $allowedExtensions)) {
            return redirect()->back()->with('error', 'Invalid image format. Allowed formats: JPG, JPEG, PNG, GIF');
        }

        $nameWithoutExtension = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $newImageName = $nameWithoutExtension . '.' . $extension;

        $image->move('public/room', $newImageName);

        $data['room_Image'] = $newImageName;
    }


    if ($data['room_Image'] !== '') {
        DB::table('room')->insert($data);
        Session::flash('success', 'Created successfully');
    } else {
        Session::flash('error', 'Failed to upload image');
    }
          return Redirect::to('/all-room');

      }


      protected $bookingController;

    public function __construct(BookingController $bookingController)
    {
        $this->bookingController = $bookingController;
    }

    public function getAllRooms()
    {
        $rooms = Room::all();
        $hotels = Hotel::all();
        // $this->bookingController->updateRoomStatus();

        return view('room.allroom', compact('rooms','hotels'));

    }
    public function updateRooms($room_id){
        $editRoom = Room::with('hotel')->where('room_id', $room_id)->get();
        return view('room.editroom', compact('editRoom'));
    }
    public function updatedRooms(Request $request){
        $roomID = $request->input('room_id');
        $data = [
            'HotelID' => $request->hotelID,
            'room_type' => $request->room_type,
            'room_Image' => '',
            'room_no' => $request->room_number,
            'room_price' => $request->room_price,
        ];
        if ($request->hasFile('room_Image')) {
            $image = $request->file('room_Image');

            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $extension = $image->getClientOriginalExtension();

            if (!in_array(strtolower($extension), $allowedExtensions)) {
                return redirect()->back()->with('error', 'Invalid image format. Allowed formats: JPG, JPEG, PNG, GIF');
            }

            $nameWithoutExtension = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $newImageName = $nameWithoutExtension . '.' . $extension;

            $image->move('public/room', $newImageName);

            $data['room_Image'] = $newImageName;
        }

        DB::table('room')->where('room_id', $roomID)->update($data);
        Session::flash('success', 'updated successfully');
        return Redirect::to('/all-room');
    }
    public function deleteRooms(Request $request){
      try {

          $roomId = $request->room_id;

          $deleted = Room::destroy($roomId);

          if ($deleted) {
              // Nếu xóa thành công
              Session::flash('success', 'Deleted successfully');
          } else {
              // Nếu không xóa được
              Session::flash('error', 'Không thể xóa phòng. Vui lòng thử lại sau.');
          }

          return redirect()->back();
      } catch(\Exception $e) {
          // Xử lý nếu có lỗi xảy ra trong quá trình xóa
          Session::flash('error', 'Xóa thất bại: ' . $e->getMessage());
          return redirect()->back();
      }
  }
  public function room_status_active($roomID){
   DB::table('rooms')->where('room_id',$roomID)->update(['room_status'=>0]);
   Session::flash('success', 'Inactive');
   return Redirect::to('/all-room');
}
public function room_status_inactive($roomID){
    DB::table('rooms')->where('room_id',$roomID)->update(['room_status'=>1]);
   Session::flash('success', 'Active');
   return Redirect::to('/all-room');
}
public function search(Request $request)
{
    $hotelId = $request->input('hotel_id');
    $hotels = Hotel::all();
    $rooms = Room::where('HotelID', $hotelId)->with('hotels')->get();
    return view('room.allroom', ['rooms' => $rooms, 'hotels'=> $hotels]);
}
}
