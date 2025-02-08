<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;

class UserAuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();

        try {
            $user = User::create($validated);
            return response()->json(
                ['message' => 'User registered successfully', 'user' => new UserResource($user)],
                201
            );
            // return new UserResource($user);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function login(LoginRequest $request)
    {
        // dd($request);
        $request->only('email', 'password');
        $credentials = $request->validated();
        try {
            $user = User::where('email', $credentials['email'])->first();
            if (Hash::check($credentials['password'], $user->password)) {
                $token = $user->createToken('authToken')->plainTextToken;
                return response()->json([
                    'message' => 'User logged in successfully',
                    'user' => new UserResource($user),
                    'access_token' => $token,
                    'token_type' => 'Bearer'
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function logout()
    {

        try {
            /** @var User $user */

            $user = Auth::user();

            if (!$user) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            $user->tokens()->delete();

            return response()->json(['message' => 'Logged out successfully'], 200);
        } catch (\Exception $e) {
            Debugbar::addThrowable($e);

            return response()->json(['error' => 'Something went wrong', 'details' => $e->getMessage()], 500);
        }
    }

    public function refresh() {}
    public function me() {}
    public function updateProfile() {}
    public function updatePassword() {}
    public function sendResetLink() {}
    public function resetPassword() {}
    public function verifyEmail() {}
    public function resendVerificationEmail() {}
    public function sendVerificationEmailToAdmin() {}
}
