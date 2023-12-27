<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index() {
        return view('admin');
    }

    function karyawan() {
        return view('admin');
    }

    function kadepartemen() {
        return view('admin');
    }

    function kahrd() {
        return view('admin');
    }
}
