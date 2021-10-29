<?php

namespace App\Http\Controllers;

use App\Shows;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'signup']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    protected function credentials(Request $request)
    {

    }

    public function login(Request $request)
    {
        $user = null;
        $arrData = new Shows();
        $arrData->status = 400;
        $arrData->data = $user;
        $credentials = request(['email', 'password']);
        if(is_numeric($request->get('email'))){
            $user = User::where('phone', $request->get('email'))->first();
            if (! $token = auth('api')->attempt(['phone' => request('email'), 'password' => request('password')])) {
                $arrData->message = "Unauthorized";
                return response()->json($arrData, 401);
            }
        }
        elseif (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $request->get('email'))->first();
            if (! $token = auth('api')->attempt(['email' => request('email'), 'password' => request('password')])) {
            //if(!$user){
                $arrData->message = "Unauthorized";
                return response()->json($arrData, 401);
            }
            if($user == null){
                $arrData->message = "invalid_credentials";
                return response()->json($arrData, 401);
            }
            $token = JWTAuth::fromUser($user);

            try {
            // attempt to verify the credentials and create a token for the user
                if (!$token = JWTAuth::fromUser($user)) {
                    $arrData->message = "invalid_credentials";
                    return response()->json($arrData, 401);
                }
            } catch (JWTException $e) {
            // something went wrong whilst attempting to en
                $arrData->message = "could_not_create_token";
                return response()->json($arrData, 401);
            }

//            if (! $token = auth('api')->attempt(['email' => request('email'), 'password' => request('password')])) {
//                return response()->json(['error' => 'Unauthorized'], 401);
//            }
        }
        $user_id = 3694*$user->id;
        //$user->referral_link = 'http://AffiliateNg.com/invite/register?referrer='.$user_id;
        $user->token = $token;
        $user->version = "2";

        $arrData = new Shows();
        $arrData->status = 200;
        $arrData->data = $user;
        $arrData->message = "Success";
        return $arrData;
        return $this->respondWithToken($token);
    }
    public function signup(Request $request)
    {
        $newUser = [
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'name' => $request->get('name'),
            'lastname' => $request->get('lastname'),
            'password' => bcrypt($request->get('password'))
        ];
        $users = User::where('phone', $request->get('phone'))->get();
        //return response()->json($users);
        if(count($users) > 0){
            return response()->json(['error' => 'Phone number already in use'], 401);
        }
        $users = User::where('email', $request->get('email'))->get();
        if(count($users) > 0){
            return response()->json(['error' => 'Email already in use'], 401);
        }
        $user = User::create($newUser);
        $user->save();
        return $this->login($request);

    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth('api')->user());
    }
    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}