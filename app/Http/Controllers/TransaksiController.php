<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function menabung(){
        return view('menabung');
    }

    public function tarikTabungan(){
        return view('tarik-tabungan');
    }
}
