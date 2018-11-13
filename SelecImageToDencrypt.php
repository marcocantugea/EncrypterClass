<!DOCTYPE html>
<!--
key marco.cantu.g@gmail.comsw3dfrtyj
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <h1>Desencryptar una imagen</h1>
    <h3>Selecciona una imagen a desencriptar</h3>
    <form action="ImageDecrypter.php" method="post" enctype="multipart/form-data" >
        Upload a File:
        <input type="file" name="myfile" id="fileToUpload" />
        <p></p>
        Key:
        <input name="k" type="text" />
        <p></p>
        <input type="submit" name="submit" value="Send File" >
    </form>
    </body>
</html>
