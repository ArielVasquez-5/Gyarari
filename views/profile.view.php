
<div class="contenedorProfile" id="contenedorProfile">
    <div class="mensajeProfile">
        <h3>Hola a todos!</h3>
    </div>
    <div class="banner">
        <img src="img/<?php echo $datosUsuario[0]['banner']; ?>" alt="" height="440px">
    </div>
    <div class="imgProfile">
        <?php if(empty($datosUsuario[0]['avatar'])): ?>
            <img src="image/noImage.jpg" alt="">
        <?php else: ?>
            <img src="img/<?php echo $datosUsuario[0]['avatar']; ?>" alt="" height="250px">
        <?php endif; ?>
        <div class="tittleProfile">
            <h2 class="titulo2">
            <?php if(empty($datosUsuario[0]['nombre'])): ?>
                <?php echo $datosUsuario[0]['usuario']; ?>
            <?php else: ?>
                <?php echo $datosUsuario[0]['nombre']; ?>
            <?php endif; ?>
            </h2>
        </div>
    </div>

    <div class="mainProfile">
        <div class="opciones">
            <h2 class="tituloProfile">Presentacion:</h2>
        </div> 
        <div class="descripcionProfile"><p><?php echo $datosUsuario[0]['presentacion']; ?></p></div>
        <?php if($_SESSION): ?>
            <?php if($_SESSION['usuario'] == $datosUsuario[0]['usuario']): ?>
                <div class="btnProfile">       
                    <a href="<?php echo RUTA . 'subir.php'; ?>"><i class="fas fa-camera"></i></a>       
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <div class="thumbFlex">
            <?php foreach($posts AS $post): ?>
                <div class="thumbHover">
                    <a href="<?php echo RUTA . 'single.php?idImg=' . $post['idImg']; ?>"><img class="thumbImg" src="img/<?php echo $post['img']; ?>" alt=""></a>
                    
                    <div class="iconLikeAndComment">
                        <div class="likeAndComment">
                            <i class="fas fa-heart iconIzquierda"></i><p>0</p>
                        </div>
                        <div class="likeAndComment">
                            <i class="fas fa-comment iconDerecha"></i><p>0</p>
                        </div>
                    </div>
                </div> 
            <?php endforeach; ?>


        </div>
    </div>




        
</div>


<article class="art"></article>