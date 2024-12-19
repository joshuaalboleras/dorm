<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home'; // Default redirection if no role is set

    /**
     * Determine where to redirect users after login.
     *
     * @return string
     */
    public function redirectTo()
    {
        // Redirect based on the user's role
        if (auth()->user()->role->name == 'admin') {
            return route('admin.index'); // Correct route name with prefix
        }

        if (auth()->user()->role->name == 'staff') {
            return route('staff.index'); // Correct route name with prefix
        }

        if (auth()->user()->role->name == 'student') {
            return route('student.index'); // Correct route name with prefix
        }

        return $this->redirectTo; // Default redirection if no matching role
    }
}
