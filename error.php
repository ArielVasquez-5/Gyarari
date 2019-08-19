<?php 

require 'config.php';





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" href="susu_chibi.ico">
    <title>Error</title>
</head>
<body>
    <div class="contenedor">
        <p class="errorTxt">Ops! Ha ocurrido un error, por favor haz <a class="aError" href="<?php echo RUTA; ?>">click aqui</a> para volver al inicio.</p>
        <img class="errorPNG" src="image/error.png" alt="">
    </div>
</body>
</html>
