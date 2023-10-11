<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RombelController extends Controller
{
    public function index() {
        $rombel=Rombel::all();
        return view('rombel.index')->with('rombel',$rombel);
    }
}
