<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    public $loginAfterSignUp = true;

    public function register(Request $request)
    {
      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
      ]);

      $token = auth()->login($user);

      return $this->respondWithToken($token);
    }

    public function login(Request $request)
    {
      $credentials = $request->only(['email', 'password']);

      if (!$token = auth()->attempt($credentials)) {
        return response()->json([
          'status' => 'error',
          'error' => 'Unauthorized',
          'msg' => 'Invalid Credentials' ], 401);
      }

      return response([
        'status' => 'success'
    ])
    ->header('Authorization', $token);
    }
    public function getAuthUser(Request $request)
    {
        return response()->json(auth()->user());
    }
    public function user(Request $request)
    {
      $user = User::find(Auth::user()->id);
      return response([
        'status' => 'success',
        'data' => $user
      ]);
    }
      //checks that the current token is still valid
       public function refresh()
      {
        return response([
          'status' => 'success'
        ]);
      }
    public function logout()
    {
      JWTAuth::invalidate();
      return response([
              'status' => 'success',
              'msg' => 'Logged out Successfully.'
          ], 200);
    }
    protected function respondWithToken($token)
    {
      return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => auth()->factory()->getTTL() * 60
      ]);
    }
}
