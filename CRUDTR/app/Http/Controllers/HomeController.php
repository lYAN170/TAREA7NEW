<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\CursoController;


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
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        return view('home', compact('widget'));
    }
}
