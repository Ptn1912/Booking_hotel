<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthenticationController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $request->validated();

        $userData = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        $user = User::create($userData);
        $token = $user->createToken('booking_hotel')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ], 201);
    }
    public function login(LoginRequest $request)
    {
        $request->validated();

        $user = User::whereEmail($request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'Invalid credentials'
            ], 422);
        }

        $token = $user->createToken('booking_hotel')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ], 200);
    }
    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return response([
            'message' => 'Logout success'
        ], 200);
    }

    public function user(Request $request){
        return response([
            'user' => $request->user()
        ], 200);
    }
    public function postUpdateAccount(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string',
            'address' => 'required|string|max:255',
            'password' => 'required|min:6',
        ]);

        $email = $request->input('email'); // Lấy email từ yêu cầu
        $user = User::where('email', $email)->first(); // Tìm người dùng dựa trên email

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->password = bcrypt($request->input('password')); // Mã hóa mật khẩu mới
        $user->save();


        return response()->json(['user' => $user], 201);
    }

    }
    // $attrs=$request->validate([
    //     'email'=>'required|email',
    //     'password'=>'required|min:6'
    // ]);
    // if(!Auth::attempt($attrs)){
    //     return response([
    //                 'message' => 'Invalid credentials'
    //             ], 422);
    // }


    // return response([
    //     'user' => auth()->user(),
    //     'token' => auth()->user()->createToken('secret')->plainTextToken
    // ],200);


