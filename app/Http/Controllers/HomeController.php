<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index() {
        if(Auth::id()) {
            $role = Auth()->user()->role;

            if($role == 'karyawan') {
                return view('dashboard');
            }
            else if($role == 'kahrd') {
                return view('kahrd.home');
            }
            else if($role == 'kadepartemen') {
                return view('kadepartemen.home');
            }
            else if($role == 'superadmin') {
                return view('admin.home');
            }
            else {
                return redirect()->back();
            }
        }
    }
}
