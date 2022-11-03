<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            // return view('home');
            $user = Auth::user();
        
            $role = $user->user_type_id;
            
            switch ($role) {
                case '1':
                    return redirect()->to('/admin');
                    break;
                case '2':
                    return redirect()->to('/');
                    break;
                default:
                    return '/404';
                    break;
            }
        } else {
            return view('login');
        }
    }
}
