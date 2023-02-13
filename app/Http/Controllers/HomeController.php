<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tool;
use App\Models\Experience;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tools = Tool::orderBy('name')->get();
       
        $users = User::orderBy ('email')->get();
        return view('home', compact ('users', 'tools'));
    }
    public function indexByTool(string $toolId)
    {
        $tools = Tool::orderBy('name')->get();

        // Recupero la herramienta por la que filtro
        $tool = Tool::find($toolId);

        //dd($tool);
        // Recupero las experiencias que contienen la herramienta (sin mirar usuario)
        $exps = $tool->experiences()->get();
        //dd($exps);
        // Recupero los usuarios de la colección de experiencias y elimino duplicados
        $users = $exps->map(function ($exp) {
            return $exp->user()->first();
        })->unique('id');
       // dd($users);
        
        return view('home', compact ('users', 'tools'));
    } 
}
