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
    <h1>Encryptar una imagen</h1>
    <h3>Seleciona una imagen a encriptar</h3>
        <form action="ImageEncrypter.php" method="post" enctype="multipart/form-data" >
        Upload a File:
        <input type="file" name="myfile" id="fileToUpload" accept="image/jpeg" />
        <p></p>
        Key:
        <input name="k" type="text" />
        <p></p>
        <input type="submit" name="submit" value="Send File" >
    </form>
    </body>
</html>
