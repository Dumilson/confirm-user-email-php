<?php 
namespace App\Classes;

class ExceptionErros{
  
    public static function getLog($sms){
    if(SHOW_ERRORS === false){
        $msg = "Date => ".date('Y-m-d:h:i:s')."\nMessage => ".$sms."\n"; 
        $myfile = fopen(DIRREQ."logs/errors.txt", "a");
        fwrite($myfile, $msg."\n");
        fclose($myfile);
     }else{
        $msg = "Date => ".date('Y-m-d:h:i:s')."\nMessage => ".$sms."\n"; 
         $myfile = fopen(DIRREQ."logs/errors.txt", "a");
         fwrite($myfile, $msg."\n");
         fclose($myfile);
         echo "Message => ".$sms;
     }
    }
}