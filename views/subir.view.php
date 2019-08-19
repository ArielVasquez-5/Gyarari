<div class="contenedor2">
    <h2 class="titulo">Sube tu foto!</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" enctype="multipart/form-data">
        <label for="nombre">Ingresa el nombre de la imagen:</label>
        <input type="text" placeholder="Nombre:" id="nombre" name="nombre">

        <input type="file" class="inputThumb" name="thumb">

        <label for="textarea">Ingresa la descripcion de la imagen</label>
        <textarea class="textarea" name="texto" id="textarea"></textarea>
        
        <input type="submit" class="btnSubmit" value="Subir!">
    </form>
</div>