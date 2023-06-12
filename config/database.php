<?php
       define("DATABASE",[
        "driver"=>"mysql",
        "host"=>"localhost",
        "port"=>"3306",
        "dbname"=>"users",
        "username"=>"root",
        "passwd"=>"",
        "options"=>[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_CASE => PDO::CASE_NATURAL
        ]
]);