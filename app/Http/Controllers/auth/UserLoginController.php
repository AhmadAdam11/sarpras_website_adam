<?php
namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserLoginController extends Controller
{
    /**
     * Handle the user login request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
        public function login(Request $request)
        {
            $request->validate([
                'name' => 'required|string',
                'password' => 'required|string',
            ]);

            $user = User::where('name', $request->name)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                $token = $user->createToken('YourAppName')->plainTextToken;

                return response()->json([
                    'message' => 'Login berhasil!',
                    'token' => $token,
                    'user' => [
                        'id' => $user->id,
                        'name' => $user->name,
                    ]
                ]);
            }

            return response()->json([
                'error' => 'Unauthorized',
                'message' => 'Nama atau password salah!'
            ], 401);
        }

}

