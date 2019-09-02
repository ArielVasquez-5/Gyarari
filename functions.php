<?php
/* ===================================================================================================== //
    
    Funciones a utilizar en el proyecto

// ===================================================================================================== */

// ===================================================================================================== //
// Conexion a la base de datos, los datos del parametro que se le pasa a la function "conexion" 
// se obtienen desde un array en config.php
// ===================================================================================================== //

function conexion($db_config) {
    try {
        $conexion = new PDO('mysql:host=' . $db_config['localhost'] . ';dbname='. $db_config['basedatos'], $db_config['usuario'] , $db_config['pass']);
        return $conexion;
    } catch (PDOException $e) {
        return false;
    }
}




// ===================================================================================================== //
// Limpiar los datos ingresados (strings), ideal para los input en formularios
// ===================================================================================================== //

function limpiarDatos($datos){
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    $datos = filter_var($datos, FILTER_SANITIZE_STRING);
    return $datos;

}

// ===================================================================================================== //
// Limpiar los datos ingresados, a diferencia del anterior este lo utilize para los textarea, asi el
// usuario puede agregar espacios al texto
// ===================================================================================================== //

function limpiarDatosConEspacios($datos){
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    $datos = filter_var($datos, FILTER_SANITIZE_STRING);
    return $datos;

}




// ===================================================================================================== //
// Consulta SQL, los datos del parametro "$post_por_pagina" se encuentra en config.php
// Esta funcion se encarga de obtener los posts del usuario, unicamente para postearlos en su perfil
// ===================================================================================================== //

function obtener_post_profile($post_por_pagina, $conexion) {
    $sentencia = $conexion->prepare("SELECT * FROM imagenes WHERE idUser = :idUser ORDER BY idImg DESC" );
    $sentencia->execute(array(':idUser' => $_GET['id']));
    return $sentencia->fetchAll();
}



// ===================================================================================================== //
// Obtiene la pagina actual, se comprueba si la variable global 'p' esta seteada, de ser asi obtenerlo
// como entero, de no ser asi establecerlo como 1
// ===================================================================================================== //

function pagina_actual() {
    return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}


// ===================================================================================================== //
//  Consulta SQL, con la variable $inicio estamos obteniendo un numero, este numero indicara a partir
// desde que post traera la funcion, con la consulta traemos todos los elementos de la tabla imagenes
// de forma decendiente desde el numero de $inicio hasta el numero de $post_por_pagina
// ===================================================================================================== //

function obtener_post($post_por_pagina, $conexion) {
    $inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0;
    $sentencia = $conexion->prepare("SELECT * FROM imagenes ORDER BY idImg DESC LIMIT $inicio, $post_por_pagina");
    $sentencia->execute();
    return $sentencia->fetchAll();
}


// ===================================================================================================== //
// Obtiene la pagina actual, se comprueba si la variable global 'p' esta seteada, de ser asi obtenerlo
// como entero, de no ser asi establecerlo como 1
// ===================================================================================================== //

function obtener_cantidad_post($post_por_pagina, $conexion) {
    $inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0;
    $sentencia = $conexion->prepare("SELECT COUNT(idImg) FROM imagenes ORDER BY idImg DESC");
    $sentencia->execute();
    return $sentencia->fetchAll();
}


// ===================================================================================================== //
// Obtiene el numero de paginas, como parametro pasamos la cantidad de posts, la conexion y la cantidad
// de posts, este ultimo parametro lo encontramos en paginacion.php, solo almacena la cantidad de post
// traida desde la base de datos con la funcion obtener_cantidad_post
// Volviendo a la funcion numero_paginas, se le pasan los 3 parametros y devolvera el numero de paginas
// redondeandolo hacia arriba con ceil()
// ===================================================================================================== //

function numero_paginas($post_por_pagina, $conexion, $count) {
    $numero_paginas = ceil($count / $post_por_pagina);
    return $numero_paginas;
}



// ===================================================================================================== //
// Esta funcion obtiene todos los Usuarios de la base de datos
// Con que objetivo? para luego mostrar estos usuarios en un apartado en el index de forma descendente
// Yo utilize esta funcion para mostrar en el Index los usuarios que se iban registrando
// ===================================================================================================== //

function obtener_usuarios($conexion) {
    $sentencia = $conexion->prepare("SELECT * FROM usuarios ORDER BY id DESC");
    $sentencia->execute();
    return $sentencia->fetchAll();
}





// ===================================================================================================== //
// El usuario no podra ingresar datos que no sean numeros en la variable global id
// ===================================================================================================== //

function id_articulo($id){
    return (int)limpiarDatos($id);
}


// ===================================================================================================== //
// Comprobando si hay una session iniciada, en caso de haber una se le niega el acceso.
// ===================================================================================================== //

function comprobar_si_session(){
    if(isset($_SESSION['usuario'])) {
        header('Location: ' . RUTA);
    }
}

// ===================================================================================================== //
// Comprobando si hay una session iniciada, en caso de no haber una se le niega el acceso.
// ===================================================================================================== //

function comprobar_session(){
    if(!isset($_SESSION['usuario'])) {
        header('Location: ' . RUTA);
    }
}


// ===================================================================================================== //
// Comprueba solo si existe una session, de ser asi devuelve esa sesion
// ===================================================================================================== //

function comprobar_solo_session($usuario){
    if(isset($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario'];
        return $usuario;
    }
}



// ===================================================================================================== //
// Obtener los datos del usuario de la tabla Usuarios.
// ===================================================================================================== //

function obtener_datos_usuario($usuario, $conexion){
    $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario');
    $statement->execute(array(':usuario' => $usuario));
    $datosUsuario = $statement->fetchAll();

    return $datosUsuario;
}



// ===================================================================================================== //
// Obtener los datos del usuario de la tabla Imagenes.
// ===================================================================================================== //

function obtener_datos_imagenes($idProfile, $conexion){
    $statement = $conexion->prepare('SELECT * FROM imagenes WHERE idUser = :idUser');
    $statement->execute(array(':idUser' => $idProfile));
    $datosImagenes = $statement->fetchAll();

    return $datosImagenes;
}

// ===================================================================================================== //
// Obtener los datos de las imagenes de la tabla Imagenes por medio de su idImg.
// ===================================================================================================== //

function obtener_datos_idImg($idImg, $conexion){
    $statement = $conexion->prepare('SELECT * FROM imagenes WHERE idImg = :idImg');
    $statement->execute(array(':idImg' => $idImg));
    $datosIdImg = $statement->fetchAll();

    return $datosIdImg;
}




function obtener_post_por_idImg($conexion, $idImg){
    $resultado = $conexion->query("SELECT * FROM imagenes WHERE idImg = $idImg LIMIT 1");
    $resultado = $resultado->fetchAll();
    return ($resultado) ? $resultado : false;
}



// ===================================================================================================== //
// Funcion para la fecha de cada post
// ===================================================================================================== //

function fecha($fecha){
    $timestamp = strtotime($fecha);
    $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

    $dia = date('d', $timestamp);
    $mes = date('m', $timestamp) - 1;
    $year = date('Y', $timestamp);

    $fecha = "$dia de " . $meses[$mes] . " del $year";
    return $fecha; 
}


















?>
