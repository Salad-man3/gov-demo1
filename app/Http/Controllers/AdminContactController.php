<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function index()
    {
        return view('admin.contact.index');
    }
}
