<?php

use App\Classes\EmailConfig;
use App\Models\Models;

require '../../vendor/autoload.php';
require '../../functions/functions.php';

$hash = hashCode();

$create = Models::insert('users', [
    'name' => $nome,
    'email' => $email,
    'age' => $idade,
    'adress' => $endereco,
]);

$hash_code = Models::insert('hash_confirm', [
    'hash' => $hash,
    'id_user' =>$create
]);

$email_send = new EmailConfig;
$status_email = $email_send->sendEmail($email, $nome, $hash);

if($create != false and $email_send == true and $hash_code == true){
    echo json_encode(['status' => 200]);
}else{
    echo json_encode(['status' => 500]);
}
