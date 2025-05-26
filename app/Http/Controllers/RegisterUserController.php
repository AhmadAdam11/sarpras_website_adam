<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    // Tampilkan semua user
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Tambah user baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:users,name',
            'password' => 'required|min:6',
        ]);

        // Membuat user baru
        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        // Menghasilkan token untuk user baru
        $token = $user->createToken('YourAppName')->plainTextToken;

        // Bisa disimpan dalam session atau dikirim ke frontend
        // Misalnya, di sini kita bisa mengarahkan ke halaman dengan token
        return redirect()->back()->with('success', 'User di tambahkan!');
    }

    // Update user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|unique:users,name,' . $id,
            'password' => 'nullable|min:6',
        ]);

        $user->name = $request->name;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->back()->with('success', 'User berhasil diupdate!');
    }

    // Hapus user
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back()->with('success', 'User berhasil dihapus!');
    }
}
