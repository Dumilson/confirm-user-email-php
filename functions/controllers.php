
<?php

use App\Controllers\UserController;


function isLoggedIn(){
    if ( isset($_SESSION['logged']) && isset($_SESSION['email']) && isset($_SESSION['senha'])) {
        return true;
    } else {
        return false;
    }
  }
