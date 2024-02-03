<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDivision;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

use function Laravel\Prompts\table;

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

        $user_division = UserDivision::join('users', 'user_divisions.idUser', '=', 'users.id')
        ->join('divisions', 'user_divisions.idDivisi', '=', 'divisions.id')
        ->where('user_divisions.idUser', $user->id)->get();

        $data = [
            "user" => $user,
            "user_division" => $user_division
            // "user" => json_decode(DB::table('user_division')
            // ->join('users', 'user_division.idUser', '=', 'users.id')
            // ->join('divisions', 'user_division.idDivisi', '=', 'divisions.id')
            // ->get(), true),
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

    public function addUserDivision(Request $request) {
        $request->validate([
            'idUser' => ['required'],
            'idDivisi' => ['required']
        ]);

        $data = [
            'idUser' => $request->idUser,
            'idDivisi' => $request->idDivisi,
        ];

        UserDivision::updateOrInsert(
            ['idUser' => $request->idUser],
            $data
        );

        return redirect()->back()->with('success', 'User division added successfully');


        // $userDivision = new UserDivision($request->all());

        // if ($userDivision->save()) {
        //     return redirect()->back()->with('success', 'User division added successfully');
        // }

        // return redirect()->back()->with('error', 'User division cant added, Try Again');

        
        // $data = [
        //     'idUser' => $request->input('idUser'),
        //     'idDivisi' => $request->input('idDivisi')
        // ];

        // DB::table('user_division')->insert($data);

        // return redirect()->back()->with('success', 'User division added successfully');
    } 
}
