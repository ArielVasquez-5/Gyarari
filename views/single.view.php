<div class="singleCont">
    <div class="thumb">
        <div class="thumbUser">
            <img src="img/<?php echo $post['avatarUser']; ?>" alt="">
            <a href="<?php echo RUTA . 'profile.php?id='. $post['idUser']; ?>" class="tituloUser"><?php echo $post['nameUser']; ?></a>
        </div>
        <div class="thumbHover">
            <img class="thumbImg" src="img/<?php echo $post['img']; ?>" alt="">
        </div>
        <div class="thumbTexto">
            <p class="tituloSingle"><?php echo $post['nameImg']; ?></p>
            <p class="fecha"><?php echo fecha($post['fechaImg']); ?></p>
            <p class="thumbP"><?php echo $post['txtImg']; ?></p>
        </div>
    </div>


<!--
    <div class="comentarioUser comentarioSingle">
        <div class="imgComentarioUser">
            <img src="img/profile.png" alt="">
        </div>
        <div class="textComentarioUser">
            <h3 class="tittleComentarioUser">YouSay</h3>
            <p class="comentario">A mi me gusta el paVero voluptatibus aliquam odit soluta veritatis numquam, ad nostrum explicabo iste est?
            Vero voluptatibus aliquam odit soluta veritatis numquam, ad nostrum explicabo iste est?
            Vero voluptatibus aliquam odit soluta veritatis numquam, ad nostrum explicabo iste est?
            Vero voluptatibus aliquam odit soluta veritatis numquam, ad nostrum explicabo iste est?y</p>
        </div>
    </div>
    <div class="comentarioUser comentarioSingle">
        <div class="imgComentarioUser">
            <img src="img/profile.png" alt="">
        </div>
        <div class="textComentarioUser">
            <h3 class="tittleComentarioUser">YouSay</h3>
            <p class="comentario">A mum explicabo iste est?
            Vero voluptatibuiste est?
            Vero voluptatibus aliquam odit soluta veritatis numquam, ad nostrum explicabo iste est?y</p>
        </div>
    </div>
    <div class="comentarioUser comentarioSingle">
        <div class="imgComentarioUser">
            <img src="img/profile.png" alt="">
        </div>
        <div class="textComentarioUser">
            <h3 class="tittleComentarioUser">YouSay</h3>
            <p class="comentario">A mi me gusta el paVero voluptatibus aliquam odit soluta veritatis numquam, ad nostrum explicabo iste est?
            Vero voluptatibus aliquam odit soluta veritatis numquam, ad nostrum explicabo iste est?
            </p>
        </div>
    </div>

-->
</div>