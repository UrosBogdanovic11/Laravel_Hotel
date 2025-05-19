<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiningController extends Controller
{
    public function index()
    {
        return view('page.dining');
    }
}
