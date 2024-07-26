<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class primarycontroller extends Controller
{
    //
    public function index(){
        return view("welcome");
    }
}
