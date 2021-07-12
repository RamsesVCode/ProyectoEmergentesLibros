<?php require_once 'includes/header.php';?>
<?php require_once 'includes/redireccion-user.php';?>
<?php require_once 'includes/aside.php';?>
<section class="section">
    <div class="section-container">
        <h1>Información de la cuenta</h1>
        <?php if(isset($_SESSION['drop'])):?>
            <p class="alerta fallo"><?=$_SESSION['drop']?></p>
        <?php endif;?>
        <table border=1 cellspacing=0 class="table">
            <tr>
                <th>Nombre</th>
                <td><?=$_SESSION['usuario']['nombre'];?></td>
            </tr>
            <tr>
                <th>Apellidos</th>
                <td><?=$_SESSION['usuario']['apellidos'];?></td>
            </tr>
            <tr>
                <th>Correo</th>
                <td><?=$_SESSION['usuario']['correo'];?></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><?=getPassword(substr($_SESSION['usuario']['password'],0,8));?></td>
            </tr>
            <tr>
                <th>Fecha de Registro</th>
                <td><?=$_SESSION['usuario']['fecha'];?></td>
            </tr>
        </table>
        <div class="buttons">
            <a href="actualizar-datos.php" class="button green">Editar datos</a>
            <a href="eliminar-cuenta.php" class="button red">Eliminar cuenta</a>
        </div>
        <?php deleteVars();?>
    </div>
<?php require_once 'includes/footer.php';?>