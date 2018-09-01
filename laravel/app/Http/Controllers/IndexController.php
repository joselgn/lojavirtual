<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('guest');
    }//__constructor

    //Index
    public function index(){
        return view('welcome');
    }//index action

    //Registro controller
    public function novoRegistro(){
        return view('auth.register');
    }//novo registro Action
}//class
