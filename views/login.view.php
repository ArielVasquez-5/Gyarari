

<div class="contenedor">
    <h2 class="titulo">Inicia Sesion</h2>
    <form class="formulario" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" placeholder="Usuario...">

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" placeholder="Contraseña...">

        <input type="submit" class="btnSubmit" value="Iniciar Sesion">
        <p>No tienes una cuenta?<a href="registro.php">Registrate aqui</a></p>
        <?php if(!empty($errores)): ?>
            <div class="error">
                <ul>
                    <?php echo $errores; ?>
                </ul>
            </div>
        <?php endif; ?>
    </form>
</div>

