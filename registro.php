<?php session_start();
require 'config.php';
require 'functions.php';



// ===================================================================================================== //
// Comprobamos session, si existe redirijir al index
// ===================================================================================================== //
comprobar_si_session();



if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = limpiarDatos($_POST['usuario']);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $errores = '';

    if(empty($usuario) OR empty($password) OR empty($password2)) {
        $errores .= '<li>Por favor rellena todos los datos correctamente</li>';
    } else {
        $conexion = conexion($db_config);
        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
        $statement->execute(array(':usuario' => $usuario));
        $resultado = $statement->fetch();

        if($resultado != false) {
            $errores .= '<li>El nombre de usuario ya existe</li>';
        }

        $password = hash('sha512', $password);
        $password2 = hash('sha512', $password2);

        if($password != $password2) {
            $errores .= '<li>Las contraseñas no son iguales</li>';
        }

    }

    if($errores == '') {
        $statement = $conexion->prepare('INSERT INTO usuarios (id, usuario, pass) VALUES (NULL, :usuario, :pass)');
        $statement->execute(array(':usuario' => $usuario, ':pass' => $password));

        header('Location: ' . RUTA . 'login.php');
    }
}

require 'views/registro.view.php'; 

?>
