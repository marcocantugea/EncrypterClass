<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php

require  __DIR__. '/encrypt/EncryptFunctions.php';

//Ejemplo de como usar la clase EncriptFunctions para  un texto normal
$Encrypt = new EncryptFunctions("marco.cantu.g@gmail.comsw3dfrtyj");
$Encrypt->SetMessage("pin personal 8574");

echo '<h1>Encriptar Texto</h1>';
if($Encrypt->GetEncryptMessage()){
    echo 'Texto Ocultpo:<br/>';
    echo $Encrypt->GetEncryptMessage();
    echo '<br/>';
}else{
    echo 'no se pudo encriptar el texto';
}

echo '<h1>Desencriptar Texto</h1>';
//Ejemplo de como desencriptar texto
$Encrypt->SetMessage('0+2MXA77bI2LaZUPzyCIZkhFRSV3LRsDpml8U/QzKil0lWAmSvUuVagARlu4/N2d');
if($Encrypt->GetDecryptedMessage()){
    echo 'Texto abierto:<br/>';
    echo $Encrypt->GetDecryptedMessage();
}else{
    echo 'no se pudo encriptar el texto';
}

echo '<br/>';echo '<br/>';echo '<br/>';echo '<br/>';echo '<br/>';


?>
    </body>
</html>
