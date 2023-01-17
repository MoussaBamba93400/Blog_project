<?php

namespace App\Http\Controllers;

use Laravel\Sanctum\HasApiTokens;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;



class AuthController extends Controller
{




    public function login(UserRequest $request)
    {

        $credentials = $request->only('email', 'password');


        if (! Auth::attempt($credentials)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('Token Name')->plainTextToken;

        return response()->json([
                'status' => 'success',
                'user' => $user,
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);

    }

    public function register(Request $request){


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('Token Name')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ], 201);
    }



    public function index()
    {


        $users = User::all();

        return response()->json([
            'status' => 'success',
            'message' => 'All users',
            'users' => $users
        ], 200);

    }



    public function getUser(Request $request)
    {


        $user = User::find($request->id);


        if($user == null) {


          return response()->json([
            'status' => 'failed',
            'message' => 'user not found !'
          ]);

        } else {

        return response()->json([
            'status' => 'success',
            'content' => $user
        ]);

    }

    }



    public function modify(Request $request)
    {




    $user = User::find($request->id);

    $user->name = $request->name;
    $user->password = Hash::make($request->password);

    $user->save();
    return response()->json([
        'conten' => 'account successfuly updated'
    ], 200);

    }


    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

}
