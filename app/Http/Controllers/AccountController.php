<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Log;
class AccountController extends Controller
{
    public function UpdateAccount(UserRequest $request, $id)
    {
        $request->validated();
            $user = User::findOrFail($id);
            $user->username = $request->input('username');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->password = bcrypt($request->input('password'));

            // Check for null values and assign default values if necessary
            if ($user->phone === null) {
                $user->phone = ''; // Or any other default value you prefer
            }
            if ($user->address === null) {
                $user->address = ''; // Or any other default value you prefer
            }

            $user->save();

            return response()->json([
                'message' => 'Account updated successfully',
                'user' => $user
            ], 201);
    }

    public function allUsers(){
        $users = DB::table('users')->get();
        return view('formaccount.allusers', compact('users'));
    }
    public function allinvoices(){
        return view('formaccount.invoices');
    }
    public function addUsers(){
        return view('formaccount.addusers');
    }

     public function showUser($id){
    // Sửa tên bảng trong truy vấn này từ 'rooms' thành 'room'
    $user_detail = User::where('id', $id)->get();
    return response([
        'user_detail'=>$user_detail
    ],200);
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
