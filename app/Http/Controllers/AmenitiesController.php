<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AmenitiesController extends Controller
{
    public function index()
{
    return view('page.amenities');
}
}
