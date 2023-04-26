<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Helper\helpers;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'refresh', 'register']]);
    }

    public function login()
    {

        $credentials = request(['email', 'password']);
        $token = auth()->attempt($credentials);
        // dd($token);
        // dd(auth()->user());
        if ($token) {
            ilog($credentials);
            $user = User::where('email', '=', $credentials['email'])->first();
            $token = $user->createToken('Laravel Personal Access Client');
            return $this->respondWithToken($token);
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function me()
    {
        return response()->json([auth()->user()]);
    }

    public function user()
    {
        $user = auth()->user();
        return response()->json(compact('user'));
    }

    public function logout()
    {
        $user = Auth::user()->token();
        $user->revoke();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->responedWithToken(auth()->refresh());
    }

    public function register(StoreUserRequest $request)
    {
        $data = $request->validated();
        $user = new User($data);
        $token = $user->createToken('Laravel Personal Access Client');
        $res = response()->json(['data' => ['message' => 'null']], 500);
        // dd($token);
        if (isset($token->accessToken)) {
            $user->save();
            $res = $this->respondWithToken($token);
        }
        return $res;
        //return $this->login();
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'token' => $token->accessToken,
            'token_type' => 'bearer',
            'user' => auth()->user(),
        ]);
    }
}
