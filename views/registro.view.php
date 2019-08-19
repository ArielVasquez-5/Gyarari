<?php require 'views/header.php'; ?>

<div class="contenedor">
    <h2 class="titulo">Crea tu cuenta!</h2>
    <form class="formulario" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <label for="usuario">Crea tu usuario:</label>
        <input type="text" id="usuario" name="usuario" placeholder="Usuario...">

        <label for="password">Crea tu contraseña:</label>
        <input type="password" id="password" name="password" placeholder="Contraseña...">

        <label for="password2">Repite tu contraseña:</label>
        <input type="password" id="password2" name="password2" placeholder="Repite Contraseña...">

        <input type="submit" class="btnSubmit" id="enviar" value="Registrarse">
        <div class="error" id="errores"></div>
        <?php if(!empty($errores)): ?>
            <div class="error">
                <ul>
                    <?php echo $errores; ?>
                </ul>
            </div>
        <?php endif; ?>
    </form>
</div>

<script src="js/validacion.js"></script>
<?php //require 'views/footer.php'; ?>