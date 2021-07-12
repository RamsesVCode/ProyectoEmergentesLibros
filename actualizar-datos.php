<?php require_once 'includes/header.php';?>
<?php require_once 'includes/redireccion-user.php';?>
<?php require_once 'includes/aside.php';?>
<section class="section">
    <div class="section-container">
        <h1>Actualizar Información</h1>
        <form action="registro.php?id=1" class="category-input" method="POST">
            <?php if(isset($_SESSION['exito'])):?>
                <p class="alerta exito"><?=$_SESSION['exito'];?></p>
            <?php elseif(isset($_SESSION['fallo'])):?>
                <p class="alerta fallo"><?=$_SESSION['fallo'];?></p>
            <?php endif;?>
            
            <label for="name">Nombre</label>
            <?=isset($_SESSION['errores']['name']) ? showError($_SESSION['errores']['name']) : false;?><br>
            <input class="input"type="text" name="name" value="<?=$_SESSION['usuario']['nombre'];?>"><br>

            <label for="lname">Apellidos</label>
            <?=isset($_SESSION['errores']['lname']) ? showError($_SESSION['errores']['lname']) : false;?><br>
            <input type="text" name="lname" value="<?=$_SESSION['usuario']['apellidos'];?>"><br>

            <label for="email">Correo</label>
            <?=isset($_SESSION['errores']['email']) ? showError($_SESSION['errores']['email']) : false;?><br>
            <input type="email" name="email" value="<?=$_SESSION['usuario']['correo'];?>"><br>

            <label for="password">Contraseña</label><br>
            <span>Actual: <?=getPassword(substr($_SESSION['usuario']['password'],0,8));?></span><br>
            <?=isset($_SESSION['errores']['password']) ? showError($_SESSION['errores']['password']).'<br>' : false;?>
            <input type="password" name="password"><br>

            <label for="password">Fecha de Registro</label><br>
            <input type="text" value="<?=$_SESSION['usuario']['fecha'];?>" disabled><br>

            <input type="submit" value="Actualizar">
        </form>
        <?php deleteVars();?>
    </div>
<?php require_once 'includes/footer.php';?>