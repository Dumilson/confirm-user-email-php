<?php 
  function emptySms($input, $sms){
      if(!empty($input)){
          return true;
      }else{
          return $sms;
      }
  }

function email($email){
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
       echo "Ensira um E-mail valido" ;
  }
  
}

  function returnErrors($data){
    $errors = 0;
        $success = 0;
         for ($i=0; $i < count($data); $i++) { 
               if($data[$i] === true){
                   $success += 1;
               }else{
                   $errors +=1;
                   $sms[] = $data[$i];
               }
         }


         if($errors === 0){
            return true;
         }else{
            if(is_array($sms)){
                foreach($sms as $data){
                    echo "<p>".$data."</p>";
                }
                
             }
             return;
         }
  }




