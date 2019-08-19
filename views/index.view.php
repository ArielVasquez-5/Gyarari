<section class="ruleta">
        <div class="contenedor">
        <!--
            <h2 class="titulo">GYARARI: Imagenes mas votadas</h2>
            
                El H1 original tendria que ser "Imagenes mas votadas" mi idea principal era hacer un sistema de likes y posicionar
                aca las imagenes con la mayor cantidad de likes, todo esto dentro de un carrusel de imagenes, por eso la clase de
                este section es "ruleta" (error mio, no se por que le puse ruleta cuando es un carrusel)
                Tengo conocimientos muy basicos sobre como crear dicho carrusel, por eso decidi estudiarmelo mejor y agregarlo al
                proyecto una vez lo tenga bien estudiado.

            <img class="imgRuleta" src="img/ruleta.png" alt="">
            -->
        </div> 
    </section>

    <section class="main" id="main">
        <div class="contenedorIndex" id="contenedorIndex">
            <h1 class="titulo">Ultimas Imagenes Subidas</h2>
            <div class="thumbContenedor">
                
            <?php foreach($posts AS $post): ?>
                <div class="thumb">
                    <div class="thumbUser">
                        <img src="img/<?php echo $post['avatarUser']; ?>" alt="">
                        <a href="profile.php?id=<?php echo $post['idUser']; ?>" class="tituloUser"><?php echo $post['nameUser']; ?></a>
                    </div>
                    <div class="thumbHover">
                        <a href="single.php?idImg=<?php echo $post['idImg']; ?>"><img id="btn-abrir-popup" class="thumbImg js" src="img/<?php echo $post['img']; ?>" alt=""></a>
                        <div class="iconLikeAndComment">
                            <div class="likeAndComment">
                                <i class="fas fa-heart"></i>
                                <p>0</p>
                            </div>
                            <div class="likeAndComment">
                                <i class="fas fa-comment"></i>
                                <p>0</p>
                            </div>
                        </div>
                    </div>
                    <div class="thumbText">
                        <h3 class="thumbTitle"><?php echo $post['nameImg']; ?></h3>
                        <p class="thumbP"><?php echo $post['txtImg']; ?></p>
                    </div>
                </div>
               
            <?php endforeach; ?>
            
                
            <?php require 'paginacion.php'; ?>
                

                 

                
            </div>

            
            <div class="perfilesContenedor">
                <div class="tittlePerfil">
                    <h3 class="h3Perfil">Entra y conoce su contenido</h3>                    
                </div>
                <?php foreach($usuarios AS $usuario): ?>
                <div class="perfil">
                    <div class="thumbUser">
                        <?php if(empty($usuario['avatar'])): ?>
                            <img src="image/noImage.jpg" alt="">
                        <?php else: ?>
                            <img src="img/<?php echo $usuario['avatar']; ?>" alt="">
                        <?php endif; ?>
                        <a href="profile.php?id=<?php echo $usuario['id']; ?>" class="tituloUser">
                        <?php if(empty($usuario['nombre'])): ?>        
                            <?php echo $usuario['usuario']; ?>
                        <?php else: ?>
                            <?php echo $usuario['nombre']; ?>
                        <?php endif; ?>
                        </a>
                    </div>   
                </div>
                <?php endforeach; ?>
            </div>
           
        </div>
    </section>



    <section class="susu">
        <div class="contenedor">
            <img src="img/susuFondo.png" alt="">
        </div>
    </section>

   
  


    