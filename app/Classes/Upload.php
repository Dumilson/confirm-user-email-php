<?php 
namespace App\Classes;
class Upload {
   private static  $file;
   private static  $extension;
   private static  $format; 
   private static  $path;
   private static  $tmp;

   private static  function setFile($file){
   	self::$file = $file;
   }

   private static function setFormat($format){
	   self::$format = $format;
   }

   private static function setPath($path){
	   self::$path = $path;
	}
   public static function store($files, Array $format, $path = "public/storage"){
	    self::setFile($files);
		self::setFormat($format);
		self::setPath($path);
		self::$extension = pathinfo(self::$file['name'], PATHINFO_EXTENSION);
		if(in_array(self::$extension,self::$format)){
			self::$tmp  = self::$file['tmp_name'];
			if(move_uploaded_file(self::$tmp, DIRREQ.self::$path.date("YmdHis").".".self::$extension)){
				return ["status" => true, "file_name" =>  date("YmdHis").".".self::$extension];
			}else{
				return ["error"=>"Erro ao tentar fazer upload"];
			}
		}else{
			return ["error" => "Extensão nã encontrada"];
		}
   }
 }


