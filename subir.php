<?php session_start();

require 'config.php';
require 'functions.php';

$conexion = conexion($db_config);
if(!$conexion){
    header('Location: ' . RUTA . 'error.php');
}

comprobar_session();



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($_SESSION['usuario'])) {
    $datosUsuario = obtener_datos_usuario($_SESSION['usuario'], conexion($db_config));
} 

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$idProfile = isset($_GET['id']) ? (int)$_GET['id'] : 1;
$datosImagenes = obtener_datos_imagenes($datosUsuario[0]['id'], conexion($db_config));


// Subir las imagenes

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
    $check = @getimagesize($_FILES['thumb']['tmp_name']);
    $nombre = limpiarDatos($_POST['nombre']);
    $texto = $_POST['texto'];
    $nameUser = $datosUsuario[0]['nombre'];
    if(empty($datosUsuario[0]['nombre'])){
        $nameUser = $datosUsuario[0]['usuario'];
    }
    $avatarUser = $datosUsuario[0]['avatar'];
    $bannerUser = $datosUsuario[0]['banner'];

    if($check !== false){
        $carpeta_destino = 'img/';   
        $archivo_subido = $carpeta_destino . $_FILES['thumb']['name'];
        move_uploaded_file($_FILES['thumb']['tmp_name'], $archivo_subido);

        $statement = $conexion->prepare('INSERT INTO imagenes (idImg, idUser, nameUser, avatarUser, bannerUser, img, nameImg, txtImg) VALUES (NULL, :idUser, :nameUser, :avatarUser, :bannerUser, :img, :nameImg, :textImg)');
        $statement->execute(array(
            ':idUser' => $datosUsuario[0]['id'],
            ':nameUser' => $nameUser,
            ':avatarUser' => $avatarUser,
            ':bannerUser' => $bannerUser,
            ':img' => $_FILES['thumb']['name'],
            ':nameImg' => $nombre,
            ':textImg' => $texto
        ));



       
        header('Location: ' . RUTA . 'profile.php?id=' . $datosUsuario[0]['id']);

    }

    
}




require 'views/header.php';
require 'views/subir.view.php';

require 'views/footer.php';

?>