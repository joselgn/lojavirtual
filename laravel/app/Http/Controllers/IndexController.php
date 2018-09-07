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

    //Inicia o carregamento padrao de layout
    public function _initLayout(){
        return [
            'menu' => $this->_montaMenuLateral(),
            'lastProds' => $this->_ultimosProdutos(),
            'allProds' =>$this->_listaProdutos(),
        ];
    }//init layout


    //Index
    public function index(){
        return view('inicio',[
            'layout'=>$this->_initLayout()
        ]);
    }//index action

    //Registro controller
    public function novoRegistro(){
        return view('auth.register');
    }//novo registro Action
}//class
