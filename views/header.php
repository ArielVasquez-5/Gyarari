
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Asap:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css" integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" href="susu_chibi.ico">
    <title>Gyarari</title>
</head>
<body>
    <header class="header">
        <div class="contenedorHeader">
            <nav class="menu">
                <a href="<?php echo RUTA; ?>" class="logo">
                    <div class="imagen">
                        <img src="img/Chibi_Susu.png" alt="">
                    </div>
                    <div class="logoTittle">
                        <h2>GYARARI</h2>
                        <h3>GALERIA ONLINE</h3>
                    </div>
                </a>
                <!--
                <div class="browser">
                    <input type="text" placeholder="Buscar...">
                    <i class="fas fa-search"></i>
                </div>
                -->
                <div class="enlaces">
                    <?php if(isset($_SESSION['usuario'])): ?>
                    <a href="<?php echo RUTA . 'index.php'; ?>">Inicio</a>
                    <nav class="iconUser">
                        <ul>
                            <li>
                                <div class="iconUser2">
                                    <a href="profile.php?id=<?php echo $datosUsuario[0]['id']; ?>"><?php echo $datosUsuario[0]['usuario']; ?></a>
                                    <?php if(empty($datosUsuario[0]['avatar'])): ?>
                                        <img src="image/noImage.jpg" alt="">
                                    <?php else: ?>
                                        <img src="img/<?php echo $datosUsuario[0]['avatar']; ?>" alt="" height="45px">
                                    <?php endif; ?>
                                                                              
                                </div>
                                <ul class="subMenu">
                                    <li><a class="subOp" href="<?php echo RUTA . 'profile.php?id=' . $datosUsuario[0]['id']; ?>">Ver Perfil</a></li>
                                    <li><a class="subOp" href="<?php echo RUTA .'editProfile.php?id=' . $datosUsuario[0]['id']; ?>">Editar Perfil</a></li>
                                    <!--<li><a class="subOp" href="#">Tema: Dia</a></li>-->
                                    <li><a class="subOp" href="<?php echo RUTA . 'desconectar.php'; ?>">Cerrar Sesion</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <?php else: ?>                   
                    <a href="index.php">Inicio</a>
                    <a href="<?php echo RUTA . 'login.php'; ?>">Iniciar Sesion</a>
                    <?php endif; ?>
                </div>
            </nav>
        </div> 


        
<!-- HEADER RESPONSIRVE -->

        <div class="headerResponsive">
            <input type="checkbox" id="btn-menu">
            <label for="btn-menu"><i class="fas fa-bars"></i></label>
            <nav class="menuResponsive">
                <ul>
                <?php if(isset($_SESSION['usuario'])): ?>
                    <li><a href="<?php echo RUTA . 'index.php'; ?>">Inicio</a></li>
                    <li><a href="<?php echo RUTA . 'profile.php?id=' . $datosUsuario[0]['id']; ?>">Ver Perfil</a></li>
                    <li><a href="<?php echo RUTA . 'editProfile.php?id=' . $datosUsuario[0]['id']; ?>">Editar Perfil</a></li>
                    <li><a href="<?php echo RUTA . 'desconectar.php'; ?>">Cerrar Sesion</a></li>
                <?php else: ?>
                    <li><a href="<?php echo RUTA . 'index.php'; ?>">Inicio</a></li>
                    <li><a href="<?php echo RUTA . 'login.php'; ?>">Iniciar Sesion</a></li>
                <?php endif; ?>
                </ul>
            </nav>
        </div> 

    </header> 


    

