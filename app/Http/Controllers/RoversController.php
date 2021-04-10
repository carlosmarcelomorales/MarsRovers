<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoversController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}
