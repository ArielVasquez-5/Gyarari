<?php
// LOCALHOST
//define('RUTA', 'http://localhost/proyectos/gyarari/');

// BASE DE DATOS SUBIDA A HEROKU
define('RUTA', 'https://gyarari.herokuapp.com/');


// BASE DE DATOS YA SUBIDA
$db_config = array(
    'localhost' => 'bevx5z9fddi9vsohcjig-mysql.services.clever-cloud.com',
    'basedatos' => 'bevx5z9fddi9vsohcjig',
    'usuario' => 'uooopetimy4frvvs',
    'pass' => 't6n5mX9RMTB3QvFQ3Dta'
);


// LOCALHOST
/*
$db_config = array(
    'localhost' => 'localhost',
    'basedatos' => 'gyarari',
    'usuario' => 'root',
    'pass' => ''
);
*/
$blog_config = array(
    'post_por_pagina' => '6',
    'carpeta_imagenes' => 'img/'
);


?>