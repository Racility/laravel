<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HitungController extends Controller
{
    public function daftar(){
        return view ('daftar');
    }
    public function kirim(Request $request){
        $name = $request->input('nama');
        $addres = $request->input('alamat');

        return view ('dashboard', ['name' => $name, 'addres'=> $addres]);
    }
}
