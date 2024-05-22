<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;

class HotelController extends Controller
{
    public function index()
    {
        $all_hotels = Hotel::where('status', 0)
            ->orderBy('HotelID', 'desc')
            ->take(9)
            ->get();

        // Return JSON response with the fetched hotels
        return response()->json($all_hotels, 200);
    }
   
    public function search($name)
    {
        $hotels = Hotel::where('name', 'LIKE', '%' . $name . '%')->get();

        // Trả về danh sách khách sạn phù hợp với tên tìm kiếm
        return response()->json($hotels, 200);
    }

    public function getAllHotels()
    {
        $allHotels = Hotel::all();
        foreach ($allHotels as $hotel) {
            // $totalRooms = Room::where('HotelID', $hotel->id)->count();
            // $hotel->NumberOfRoom = $totalRooms;
            $hotel->save();
        }
        return view('hotels.allhotel', compact('allHotels'));
    }
    public function updateHotels($HotelID)
    {
        $editHotels = DB::table('products')->where('HotelID', $HotelID)->get();

        return view('hotels.edithotel', compact('editHotels'));
    }
    public function updatedHotels(Request $request)
    {
        $HotelID = $request->input('HotelID');
        $data = [
            'name' => $request->hotelName,
            'address' => $request->hotelAddress,
            'ImageHotel' => '',
        ];

        if ($request->hasFile('hotelImage')) {
            $image = $request->file('hotelImage');

            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $extension = $image->getClientOriginalExtension();

            if (!in_array(strtolower($extension), $allowedExtensions)) {
                return redirect()->back()->with('error', 'Invalid image format. Allowed formats: JPG, JPEG, PNG, GIF');
            }

            $nameWithoutExtension = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $newImageName = $nameWithoutExtension . '.' . $extension;

            $image->move('public/assets/images/cart', $newImageName);

            $data['ImageHotel'] = $newImageName;
        }

        DB::table('products')->where('HotelID', $HotelID)->update($data);
        Session::flash('success', 'updated successfully');
        return Redirect::to('/all-hotel');
    }
    public function deleteHotels(Request $request)
    {
        try {

            $hotelId = $request->HotelID;

            $deleted = Hotel::destroy($hotelId);

            if ($deleted) {

                Session::flash('success', 'Deleted successfully');
            } else {

                Session::flash('error', 'Không thể xóa khách sạn. Vui lòng thử lại sau.');
            }

            return redirect()->back();
        } catch (\Exception $e) {

            Session::flash('error', 'Xóa thất bại: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function updateNumberOfRooms(Request $request)
    {
        $hotelID = $request->input('hotelID');

        $numberOfRooms = Room::where('HotelID', $hotelID)->count();

        Hotel::where('HotelID', $hotelID)->update(['NumberOfRoom' => $numberOfRooms]);

        return response()->json(['numberOfRooms' => $numberOfRooms]);
    }
    public function detail($HotelID)
    {
        $sp = Hotel::where('status', 0)
            ->orderBy('HotelID', 'desc')
            ->get();
        $product = Hotel::where('HotelID', $HotelID)->first();
        // Sửa tên bảng trong truy vấn này từ 'rooms' thành 'room'
        $room = Room::where('HotelID', $HotelID)->where('room_status', 1)->get();
        return response([
            'sp' => $sp,
            'product' => $product,
            'room' => $room
        ], 200);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
