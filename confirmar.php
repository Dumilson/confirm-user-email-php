<?php

use App\Models\Models;

    require_once 'vendor/autoload.php';
    require_once 'functions/functions.php';

    if(isset($hash)){
        $find_hash = Models::findColum('hash_confirm','hash_code', $hash);
        if($find_hash){
            $update = Models::update('users', [
                'status_account' => 1
            ],$find_hash['id_user']);
            if($update){
                Models::delete('hash_confirm', $find_hash['id']);
                echo "Conta Confirmada com Sucesso !";
            }
        }else{
            echo "Token Expirado";
        }

    }
?>