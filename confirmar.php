<?php

use App\Models\Models;

    require_once 'vendor/autoload.php';
    require_once 'functions/functions.php';

    if(isset($hash)){
        $find_hash = Models::findColum('hash_confirm','hash', $hash);
        if($find_hash){
            $update
        }

    }
?>