<?php session_start();

require 'config.php';
require 'functions.php';

// ===================================================================================================== //
// Comprobamos session, si existe redirijir al index
// ===================================================================================================== //
comprobar_si_session();


$errores = '';


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = limpiarDatos($_POST['usuario']);
    $password = $_POST['password'];
    $password = hash('sha512', $password);

    $conexion = conexion($db_config);
    $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND pass = :pass');
    $statement->execute(array(':usuario' => $usuario, ':pass' => $password));
    
    $resultado = $statement->fetch();
    
    if($resultado !== false) {
        $_SESSION['usuario'] = $usuario;
        header('Location: ' . RUTA . 'index.php');
    } else {
        $errores .= '<li>Datos Incorrectos</li>';
    }

}




require 'views/header.php'; 

require 'views/login.view.php';








?>