<?php require_once 'includes/header.php';?>
<?php require_once 'includes/redireccion-user.php';?>
<?php require_once 'includes/redireccion-admin.php';?>
<?php require_once 'includes/aside.php';?>
<section class="section">
    <div class="section-container">
        <h1>Ingresar categoria</h1>
        <?php if(isset($_SESSION['fallo'])):?>
            <p class="alerta fallo"><?=$_SESSION['fallo'];?></p>
        <?php endif;?>
        <form action="guardar-categoria.php" method="POST" class="category-input">
            <label for="name">Nombre</label>
            <?=isset($_SESSION['errores']['name']) ? showError($_SESSION['errores']['name']) : false;?><br>
            <input type="text" name="name"><br>

            <label for="description">Descripcion</label>
            <?=isset($_SESSION['errores']['description']) ? showError($_SESSION['errores']['description']) : false;?><br>
            <textarea name="description"></textarea><br>
            <input type="submit" value="Guadar">
        </form>
        <?php deleteVars();?>
    </div>
<?php require_once 'includes/footer.php';?>