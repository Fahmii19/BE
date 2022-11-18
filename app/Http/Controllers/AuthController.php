<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Fitur Register
        // Ambil input name, email, password
        // input data ke database menggunakan model

        $input = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ];
        User::create($input);

        $data = ["message" => "Register berhasil"];

        return response()->json($data, 200);
    }

    function login(Request $request)
    {
        // Fitur Login
        // ambil input email dan password
        // ambil input email dari database dari database berdasarkan email
        // bandingkan password yang diinput dengan password yang ada di database
        $input = [
            "email" => $request->email,
            "password" => $request->password
        ];


        if (Auth::attempt($input)) {

            $user = User::where("email", $input["email"])->first();

            $token = $user->createToken("auth_token");

            $data = [
                "message" => "Login berhasil",
                "token" => $token->plainTextToken
            ];
            return response()->json($data, 200);
        } else {
            $data = ["message" => "Login gagal"];
            return response()->json($data, 401);
        }
    }
}
