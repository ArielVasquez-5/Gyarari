<?php session_start();
require 'config.php';
require 'functions.php';

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Nuestra conexion a la base de datos.

$conexion = conexion($db_config);

if(!$conexion){
    header('Location: ' . RUTA . 'error.php');
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($_SESSION['usuario'])) {
    $datosUsuario = obtener_datos_usuario($_SESSION['usuario'], conexion($db_config));
} 

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Obtener de la variable Global $_GET su 'id' y guardarlo en otra variable.
$idProfile = isset($_GET['id']) ? (int)$_GET['id'] : 1;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Si la variable $_GET esta seteada entonces obtener los datos del usuario de la base de datos que coincida 
// su id con el id de $_GET.
if(isset($_GET['id'])) {
    $conexion = conexion($db_config);
    $statement = $conexion->prepare("SELECT * FROM usuarios WHERE id = '".$_GET['id']."'");
    $statement->execute();
    $datosUsuario = $statement->fetchAll();
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Obtuve los datos del usuario con la sesion iniciada actualmente de la base de datos.
$datosUsuarioDB = obtener_datos_usuario($_SESSION['usuario'], conexion($db_config));

// Comprueba 
if($datosUsuario[0]['usuario'] !== $datosUsuarioDB[0]['usuario']) {
    header('Location: '. RUTA . 'index.php');
} 

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$datosImagenes = obtener_datos_imagenes($idProfile, conexion($db_config));

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $thumb_guardada = $_POST['thumb_guardada'];
    $thumb = $_FILES['thumb'];
    $banner_guardada = $_POST['banner_guardada'];
    $banner = $_FILES['banner'];
    $nombre = limpiarDatos($_POST['nombre']);
    $texto = $_POST['texto'];
    $id = $datosUsuario[0]['id'];



    if(empty($thumb['name'])) {
        $thumb = $thumb_guardada;
    } else {
        $archivo_subido = $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name'];
        move_uploaded_file($_FILES['thumb']['tmp_name'], $archivo_subido);
        $thumb = $_FILES['thumb']['name'];
    }

    if(empty($banner['name'])) {
        $banner = $banner_guardada;
    } else {
        $archivo_subido = $blog_config['carpeta_imagenes'] . $_FILES['banner']['name'];
        move_uploaded_file($_FILES['banner']['tmp_name'], $archivo_subido);
        $banner = $_FILES['banner']['name'];
    }

    
    $statement = $conexion->prepare('UPDATE usuarios SET nombre = :nombre, presentacion = :texto, avatar = :thumb, banner = :banner WHERE id = :id');
    $statement->execute(array(
        ':thumb' => $thumb, 
        ':banner' => $banner, 
        ':nombre' => $nombre, 
        ':texto' => $texto,
        ':id' => $id
    ));

    $statement = $conexion->prepare("UPDATE imagenes SET nameUser = :nuevoNombre, avatarUser = :nuevoAvatar WHERE idUser = :id");
    $statement->execute(array(
        ':nuevoNombre' => $nombre,
        ':nuevoAvatar' => $thumb,
        ':id' => $id
    ));

    $statement = $conexion->prepare("UPDATE comentarios SET nameUser = :nuevoNombre, avatarUser = :nuevoAvatar WHERE idUser = :id");
    $statement->execute(array(
        ':nuevoNombre' => $nombre,
        ':nuevoAvatar' => $thumb,
        ':id' => $id
    ));

    

   

    header('Location: ' . RUTA . 'profile.php?id=' . $datosUsuario[0]['id']);


}



require 'views/header.php';
require 'views/editProfile.view.php'; 

//require 'views/footer.php'; 



?>