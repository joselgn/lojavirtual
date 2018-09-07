<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

//Models
use App\Models\Categoria;
use App\Models\Produto;

class Controller extends BaseController{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //Variaveis padrao
    public $_storagePath;

    public function __construct(){
        $this->_storagePath = 'img-up/';
    }//construct

    //Monta menu lateral
    public function _montaMenuLateral(){
        $modelCategorias = new Categoria();
        $listaCategoriasPai = $modelCategorias->where(['ativo'=>1,'tipo'=>1])->orderBy('nome')->get();

        $arrayMenu = [];
        foreach ($listaCategoriasPai as $menu) {
            $verifSubmenu = $modelCategorias->where(['ativo'=>1,'id_cat_pai'=>$menu->id])->orderBy('nome')->get();

            //Submenus
            $arrSubmenu = [];
            if($verifSubmenu->count()>0){
                foreach ($verifSubmenu as $submenu){
                    $arrSubmenu[$submenu->nome] = [
                        'id' => $submenu->id,
                        'nome'=> $submenu->nome,
                        'tipo'=> $submenu->tipo
                    ];//arr submenu
                }//foreach submenu
            }//if submenu

            //menu
            $arrayMenu[$menu->nome] = [
                'id' => $menu->id,
                'nome'=> $menu->nome,
                'tipo'=> $menu->tipo,
                'submenu' => $arrSubmenu
            ];//arr menu
        }//foreach

        return $arrayMenu;
    }//menu lateral

    //Últimos Produtos cadastrados
    public function _ultimosProdutos(){
        $modelProdutos = new Produto();
        $listaProds = $modelProdutos->where(['ativo'=>1])->orderBy('created_at','Desc')->take(8)->get();

        $arrayProds=[];
        foreach ($listaProds as $prod){
            $arrayProds[] =[
                'id'=> $prod->id,
                'nome'=> $prod->nome,
                'preco'=> 'R$ '.number_format($prod->preco,2,',','.'),
                'img'=>'img-up/'.$prod->url_imagem,
            ];
        }//foreach array prods

        return $arrayProds;
    }//ultimos produtos


    //Toda a lista de Prddutos ativos
    public function _listaProdutos(){
        $modelProdutos = new Produto();
        $listaProds = $modelProdutos->where(['ativo'=>1])->get();

        $arrayProds=[];
        foreach ($listaProds as $prod){
            $arrayProds[] =[
                'id'=> $prod->id,
                'nome'=> $prod->nome,
                'preco'=> 'R$ '.number_format($prod->preco,2,',','.'),
                'img'=>'img-up/'.$prod->url_imagem,
                'desc'=>$prod->descricao,
            ];
        }//foreach array prods

        return $arrayProds;
    }//lista produtos

}//class
