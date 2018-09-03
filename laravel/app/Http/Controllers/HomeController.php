<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $authInstance = Auth::user();
        $modelUsuario = new User();



        return view('home',[
            'perfil' => $authInstance->perfil,
            'dadosPessoais' => ['nome'=>$authInstance->nome,'email'=>$authInstance->email,'endereco'=>$authInstance->email],
        ]);
    }//index
}//class
