<?php session_start();

require 'config.php';
require 'functions.php';


if(!isset($_SESSION['usuario'])){
    header('Location: '. RUTA);
} else {
    header('Location: '. RUTA);
}

session_destroy();
die();



?>