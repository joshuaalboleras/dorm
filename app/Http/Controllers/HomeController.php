<?php

// In app/Http/Controllers/HomeController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        // Make sure the user is authenticated
        $this->middleware('auth');
    }

    public function index()
    {
        return redirect()->route('student.rooms');
    }
}
