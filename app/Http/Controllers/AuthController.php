<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        // Logic & Database
        $data = Siswa::all();

        // Return View (HTML/Blade)
        return view('welcome', compact('data'));
    }
}
