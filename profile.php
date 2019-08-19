<?php session_start();

require 'config.php';
require 'functions.php';

$conexion = conexion($db_config);

// ===================================================================================================== //
// Comprobamos session, si no existe redirijir al index
// ===================================================================================================== //
comprobar_session();

// ===================================================================================================== //
// Si el usuario ingresa en la variable global 'id' algun texto, entonces este sera dirijido al index.php
// ===================================================================================================== //

id_articulo($_GET['id']);

if(!(int)$_GET['id']){
    header('Location: index.php');
}



// ===================================================================================================== //
// Obteniendo en variables tanto el id del perfil como el idImg de cada imagen individual
// ===================================================================================================== //

$idProfile = isset($_GET['id']) ? (int)$_GET['id'] : 1;
$idImg = isset($_GET['idImg']) ? (int)$_GET['idImg'] : 1;


// ===================================================================================================== //
// Obtener los datos del usuario
// ===================================================================================================== //
if(isset($_SESSION['usuario'])) {
    $datosUsuario = obtener_datos_usuario($_SESSION['usuario'], conexion($db_config));
    
} 


require 'views/header.php';

// ===================================================================================================== //
// Almacenar en la variable $posts todo el contenido consultado por la funcion
// ===================================================================================================== //

$posts = obtener_post_profile($blog_config['post_por_pagina'], $conexion);





if(isset($_GET['id'])) {
    $conexion = conexion($db_config);
    $statement = $conexion->prepare("SELECT * FROM usuarios WHERE id = '".$_GET['id']."'");
    $statement->execute();
    $datosUsuario = $statement->fetchAll();
    if(!$datosUsuario[0]['usuario']) {
        header('Location: index.php');
    }

?>






<?php

require 'views/profile.view.php';





require 'views/footer.php'; 



?>

<?php } ?>

