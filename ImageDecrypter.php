<?php
require  __DIR__. '/encrypt/EncryptFunctions.php';

if(!isset($_POST)){
    
    
    $src = "./savethis.hid";
    //$image = imagecreatefromstring(file_get_contents($src));
    $filecontent=  file_get_contents($src);
    
    $Encrypt = new EncryptFunctions("marco.cantu.g@gmail.comsw3dfrtyj");
    $Encrypt->SetMessage($filecontent);
    
    
    if(!$Encrypt->GetDecryptedMessage()){
        echo 'no se pudo obtener el mensaje';
    }else{
        $imgbasecode64=  base64_decode($Encrypt->GetDecryptedMessage());
        $image =imagecreatefromstring($imgbasecode64);
        Header("Content-type: image/png");
         header("Content-Disposition: attachment; filename=image.jpg");
        imagepng($image);
        imagedestroy($image);
    }
}else{
    
    if(isset($_POST['k'])){
        
        $key=$_POST['k'];
        $currentDir = getcwd();
        $uploadDirectory = "/cachefiles/";
        $file_tmpname=$_FILES['myfile']['tmp_name'];
        
        $cachefile=$currentDir.$uploadDirectory. basename( $_FILES['myfile']['name']);
        
        $didUpload = move_uploaded_file($file_tmpname, $cachefile);
        
        $src =$cachefile;
        $filecontent=  file_get_contents($src);
    
        $Encrypt = new EncryptFunctions($key);
        $Encrypt->SetMessage($filecontent);


        if(!$Encrypt->GetDecryptedMessage()){
            echo 'no se pudo obtener el archivo';
        }else{
            $imgbasecode64=  base64_decode($Encrypt->GetDecryptedMessage());
            $image =imagecreatefromstring($imgbasecode64);
            Header("Content-type: image/png");
             header("Content-Disposition: attachment; filename=image.jpg");
            imagepng($image);
            imagedestroy($image);
        }
    }
}
   
?>