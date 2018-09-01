<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'password','salt'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','salt',
    ];

    //Save New Register
    public function saveNew($arrData){
        //Cria Salt
        $salt = $this->_createSalt();
        //Setting Values
        $userModel = new User();
        $userModel->nome     = $arrData['name'];
        $userModel->email    = $arrData['email'];
        $userModel->password = Hash::make($salt.'.'.$arrData['password']);
        $userModel->salt     = $salt;

        return $userModel->saveOrFail();
    }//save new


    //Funçao para Criar SALT - Create SALT
    public function _createSalt($min = 6, $max = 90){
        $arrPossibilities = [
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '$', '%', '/', '.', '@', '&', '-', '$', '#', '+', '*', '!', '?',
        ];//array

        $qntyChars = rand($min, $max);
        $strSalt = '';
        for ($i = 0; $i < $qntyChars; $i++) {
            $charpos = rand(0, (count($arrPossibilities) - 1));

            $strSalt .= $arrPossibilities[$charpos];
        }//for mounting SALT

        return $strSalt;
    }//create SALT

}//class
