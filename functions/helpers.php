<?php

function dd($dump){
     echo "<pre>";
        var_dump($dump);
     echo "</pre>";
     die();
 }

 function css($filename){
    $explode = explode(',',$filename);
    $file = implode("/", $explode);
    echo CSS.$file.".css";
 }

 function img($filename,$extension = "jpg"){
    $explode = explode(',',$filename);
    $file = implode("/", $explode);
    echo IMG.$file.".".$extension;
 }

 function js($filename){
    $explode = explode(',',$filename);
    $file = implode("/", $explode);
     echo JS.$file.".js";
 }

 function includes($filename){
    $explode = explode(',',$filename);
    $file = implode("/", $explode);
    require_once DIRREQ."includes/".$file.".php";
 }

 function head(){
    dd(headers_list());
 }
  function input($input, $name){
    if(!empty($input)){
        return filter_input(INPUT_POST,''.$input.'' ,FILTER_SANITIZE_STRING);
    }else{
        return  "Preencha o campo ".$name;
        
    }
  }

  function redirect($way){
      header("Location: ".DIRPAGE.$way.'.php');
  }

function session($name , $value){
    $_SESSION[$name] = $value;
}
function get($name){
    echo $_GET[$name];
}
function getSession($name){
    return $_SESSION[$name];
}

function json($json, $assocAArray = false){
    return json_decode(json_encode($json), $assocAArray);
}
function destroy(){
    session_destroy();
    unset($_SESSION);
}

function destroyOne($name){
    unset($_SESSION[$name]);
}

function allSession(){
    return $_SESSION;
}


function flash($name = '', $message = '', $class = 'alert alert-success alert-dismissible fade show')
{
    if (! empty($name) ) {
        if (! empty($message) && empty($_SESSION['name']) ) {
            if ( !empty($_SESSION[$name]) ) {
               unset( $_SESSION[$name] );
            }
            if (! empty($_SESSION[$name. '_class']) ) {
               unset( $_SESSION[$name. '_class'] );
            }
            $_SESSION[$name] = $message;
            $_SESSION[$name. '_class'] = $class;
        } elseif ( empty($mesage) && !empty($_SESSION[$name]) ) {
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
            echo '<div class="'.$class.'" id="msg-flash" role="alert">' . $_SESSION[$name] . '
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 </div>';
            
            unset($_SESSION[$name]);
            unset($_SESSION[$name.'_class']);
        }
    }


    
}

