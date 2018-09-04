<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome','ativo','preco','url_imagem','descricao'
    ];

    //Status
    public $_dscStatus = [1=>'Ativo', 2=>'Inativo'];

    //Cadastra/Edita dados
    public function salvarDados($array){
        if(!isset($array['id']))
            $modelRegistro = new Produto();
        else
            $modelRegistro = $this->find($array['id']);

        $modelRegistro->nome   = isset($array['nome'])?$array['nome']:'';
        $modelRegistro->ativo  = isset($array['ativo'])?$array['ativo']:1;
        $modelRegistro->preco  = isset($array['preco'])?$array['preco']:1;
        $modelRegistro->url_imagem  = isset($array['url_imagem'])?$array['url_imagem']:null;
        $modelRegistro->descricao  = isset($array['descricao'])?$array['descricao']:null;

        if($modelRegistro->save())
            return $modelRegistro->id;
        else
            return false;
    }//cadastrar
}//Class
