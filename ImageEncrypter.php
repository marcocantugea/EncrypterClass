<?php

    require  __DIR__. '/encrypt/EncryptFunctions.php';
    
    if(!isset($_POST)){
        $src = "./imagen1.png";
        $imagestr=  base64_encode(file_get_contents($src));

        $Encrypt = new EncryptFunctions("marco.cantu.g@gmail.comsw3dfrtyj");
        $Encrypt->SetMessage($imagestr);


        if(!$Encrypt->GetEncryptMessage()){
            echo 'no se pudo ocultar el mensaje';
        }else{
            header("Content-type: text/plain");
            header("Content-Disposition: attachment; filename=savethis.hid");
            print($Encrypt->GetEncryptMessage());
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
            $imagestr=  base64_encode(file_get_contents($src));
            $Encrypt = new EncryptFunctions($key);
            $Encrypt->SetMessage($imagestr);


            if(!$Encrypt->GetEncryptMessage()){
                echo 'no se pudo ocultar el mensaje';
            }else{
                header("Content-type: text/plain");
                header("Content-Disposition: attachment; filename=". base64_encode($_FILES['myfile']['name']) .".hid");
                print($Encrypt->GetEncryptMessage());
            }
        }
    }
   
?>
