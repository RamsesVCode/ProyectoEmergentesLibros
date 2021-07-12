<aside class="aside">
    <?php if(isset($_SESSION['usuario'])):?>
        <h2 class="aside-title">Robero Lara</h2>
        <ul class="aside-options">
            <li><a href="index.php">Inicio</a></li>
            <?php if($_SESSION['usuario']['rol'] == 'admin'):?>
                <li><a href="panel-admin.php">Panel administrativo</a></li>
                <li><a href="ingresar-categoria.php">Ingresar categoria</a></li>
            <?php endif;?>
            <li><a href="perfil.php">Mi perfil</a></li>
            <li><a href="ingresar-libro.php">Publicar Libro</a></li>
            <li><a href="cerrar.php">Cerrar sesión</a></li>
        </ul>
    <?php else:?>
        <form action="login.php" class="form" method="POST">
            <h3>Ingresar</h3>
            <?=isset($_SESSION['error']) ? showError($_SESSION['error']).'<br>' : false;?>
            <label for="name">Correo</label>
            <?=isset($_SESSION['fallos']['email']) ? showError($_SESSION['fallos']['email']) : false;?>
            <input type="email" name="email">
            
            <label for="password">Contraseña</label>
            <?=isset($_SESSION['fallos']['password']) ? showError($_SESSION['fallos']['password']) : false;?>
            <?=isset($_SESSION['password']) ? showError($_SESSION['password']) : false;?>
            <input type="password" name="password">
            
            <input type="submit" value="Ingresar">
        </form>
        <form action="registro.php" class="form" method="POST">
            <h3>Registrase</h3>
            <?php if(isset($_SESSION['exito'])):?>
                <p class="alerta exito"><?=$_SESSION['exito'];?></p>
            <?php elseif(isset($_SESSION['fallo'])):?>
                <p class="alerta fallo"><?=$_SESSION['fallo'];?></p>
            <?php endif;?>
            
            <label for="name">Nombre</label>
            <?=isset($_SESSION['errores']['name']) ? showError($_SESSION['errores']['name']) : false;?>
            <input type="text" name="name">

            <label for="lname">Apellidos</label>  
            <?=isset($_SESSION['errores']['lname']) ? showError($_SESSION['errores']['lname']) : false;?>
            <input type="text" name="lname">

            <label for="email">Correo</label>
            <?=isset($_SESSION['errores']['email']) ? showError($_SESSION['errores']['email']) : false;?>
            <input type="email" name="email">

            <label for="password">Contraseña</label>
            <?=isset($_SESSION['errores']['password']) ? showError($_SESSION['errores']['password']) : false;?>
            <input type="password" name="password">

            <input type="submit" value="Registrase">
        </form>
        <?php deleteVars();?>
    <?php endif;?>
</aside>