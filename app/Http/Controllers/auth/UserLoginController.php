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
        // Validasi input
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        // Mencari user berdasarkan name
        $user = User::where('name', $request->name)->first();

        // Cek apakah user ada dan passwordnya cocok
        if ($user && Hash::check($request->password, $user->password)) {
            // Jika login berhasil, buatkan token
            $token = $user->createToken('YourAppName')->plainTextToken;

            //   token dalam response JSON
            return response()->json([
                'message' => 'Login berhasil!',
                'token' => $token
            ]);
        }

        // Jika login gagal, return error
        return response()->json([
            'error' => 'Unauthorized', 
            'message' => 'Nama atau password salah!'
        ], 401);
    }
}

