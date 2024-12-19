<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function rooms(){
         // Get the currently authenticated user
         $user = auth()->user();

         // Get the rooms booked by the user using the 'rooms' relationship
         $rooms = $user->rooms;
         // Return the view with the rooms data
        return view('student.rooms',['rooms'=>$rooms]);
    }
}
