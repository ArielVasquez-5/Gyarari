<div class="contenedor">
    <h2 class="titulo">Configura tu Cuenta!</h2>
    <form class="formulario" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <img src="<?php if(empty($datosUsuario[0]['avatar'])) { echo 'image/noImage.jpg'; } else { echo 'img/' . $datosUsuario[0]['avatar'];} ?>" alt="" width="150px" height="150px">
        <input class="inputThumb" type="file" name="thumb">
        <input type="hidden" name="thumb_guardada" value="<?php echo $datosUsuario[0]['avatar']; ?>">

        <img class="banner" src="<?php if(empty($datosUsuario[0]['banner'])) { echo 'image/noBanner.png'; } else { echo 'img/' . $datosUsuario[0]['banner'];} ?>" alt="">
        <input class="inputThumb" type="file" name="banner">
        <input type="hidden" name="banner_guardada" value="<?php echo $datosUsuario[0]['banner']; ?>">

        <label for="usuarioNuevo">Ingresa tu nombre de Perfil nuevo:</label>
        <input type="text" id="usuarioNuevo" name="nombre" placeholder="Nombre..." value="<?php echo $datosUsuario[0]['nombre']; ?>">

        <label for="descripcion">Ingresa la presentacion de tu Perfil:</label>
        <textarea class="textarea" name="texto" id="descripcion" placeholder="Descripcion..." ><?php echo $datosUsuario[0]['presentacion']; ?></textarea>

        <input type="submit" id="submitEdit" class="btnSubmit" value="Guardar Cambios">
    </form>
</div>

<script src="js/validacionEditProfile.js"></script>


