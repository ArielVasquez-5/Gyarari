<?php session_start();
 
require 'config.php';
require 'functions.php';

// ===================================================================================================== //
// Guardar la conexion en una variable, si conexion no existe entonces enviar a error.php

$conexion = conexion($db_config);

if(!$conexion){
    header('Location: error.php');
}

// ===================================================================================================== //

if(isset($_SESSION['usuario'])) {
    $datosUsuario = obtener_datos_usuario($_SESSION['usuario'], conexion($db_config));
    
} 

// ===================================================================================================== //

$posts = obtener_post($blog_config['post_por_pagina'], $conexion);


// ===================================================================================================== //


//if(!$posts){
//    header('Location: error.php');
//}



$usuarios = obtener_usuarios($conexion);

require 'views/header.php';
require 'views/index.view.php';
require 'views/footer.php'; 

?>