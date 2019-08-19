<?php session_start();

require 'config.php';
require 'functions.php';

$conexion = conexion($db_config);
$id_articulo = id_articulo($_GET['idImg']);
comprobar_session();

if(!$conexion) {
    header('Location: ' . RUTA);
}

$post = obtener_post_por_idImg($conexion, $id_articulo);

if(!$post) {
    header('Location: ' . RUTA);
}


$post = $post[0];














if(isset($_SESSION['usuario'])) {
    $datosUsuario = obtener_datos_usuario($_SESSION['usuario'], conexion($db_config));
    
} 


if(empty($id_articulo)) {
    header('Location: ' . RUTA);
}




?>


<?php 

require 'views/header.php'; 

require 'views/single.view.php'; 

require 'views/footer.php'; 



?>