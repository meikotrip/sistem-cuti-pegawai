<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function dashboard(): View {

        $data = [
            "users" => User::where('role', '!=', 'superadmin')->get(),
        ];

        return view('admin.user.dashboard', $data);
    }

    public function form($id): View {
        $user = User::where('id', $id)->firstOrFail();

        $data = [
            "user" => $user,
        ];

        return view('admin.user.form', $data);
    }

    public function edit(Request $request, $id)
    {
        $user = User::where('id', $id)->firstOrFail();
    
        if ($user) {
            $request->validate([
                "name" => ["required", "string"],
            ]);
    
            if ($request->filled('email') && $request->email != $user->email) {
                $request->validate([
                    "email" => ["required", "email:dns", "unique:users"],
                ]);
    
                $user->update([
                    'email' => $request->email,
                    'email_verified_at' => null,
                ]);
            }
    
            // Tambahkan validasi untuk "role" secara terpisah
            if ($request->filled('role') && !in_array($request->role, ['karyawan', 'kadepartemen', 'kahrd', 'superadmin'])) {
                return redirect()->back()->with('error', 'Invalid role selected');
            }
    
            // Update "name" dan "role"
            $user->update([
                'name' => $request->name,
                'role' => $request->role,
            ]);
    
            return redirect()->back()->with('success', 'User updated');
        }
    }
    

    public function delete($id) {
        $user = User::where('id', $id)->firstOrFail();

        if ($user->delete()) {
            return redirect()->back()->with('success', 'User deleted');
        }
    }
}
