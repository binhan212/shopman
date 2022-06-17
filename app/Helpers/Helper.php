<?php
namespace App\Helpers;

class Helper
{

    public static function IDGenerator($model, $trow, $length = 4, $prefix){
        $data = $model::orderBy($trow,'desc')->first();
        if(!$data){
            $og_length = $length;
            $last_number = '';
        }else{
            $code = substr($data->$trow, strlen($prefix)+1);
            $actial_last_number = ($code/1)*1;
            $increment_last_number = ((int)$actial_last_number)+1;
            $last_number_length = strlen($increment_last_number);
            $og_length = $length - $last_number_length;
            $last_number = $increment_last_number;
        }
        $zeros = "";
        for($i=0;$i<$og_length;$i++){
            $zeros.="0";
        }
        return $prefix.'-'.$zeros.$last_number;
    }
  
    
    public static function savePictureInServer($dir, $dataImageBase64){
        preg_match("/data:image\/(.*?);/",$dataImageBase64,$image_extension); 
        $image = preg_replace('/data:image\/(.*?);base64,/','',$dataImageBase64); 
        $image = str_replace(' ', '+', $image);
        file_put_contents($dir, base64_decode($image));
    }
}
?>