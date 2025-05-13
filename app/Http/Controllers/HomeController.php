<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;

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
    public function index(Request $request, User $user)
    {
        $user = Auth::user();
        $name = $user->name;
        $avatar = $user->avatar; // Nếu cột avatar tồn tại trong database

        return view('home', compact('name', 'avatar'));
    }
}
