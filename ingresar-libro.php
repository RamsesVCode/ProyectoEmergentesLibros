<?php require_once 'includes/header.php';?>
<?php require_once 'includes/redireccion-user.php';?>
<?php require_once 'includes/aside.php';?>
<section class="section">
    <div class="section-container">
        <h1>Ingresar categoria</h1>
        <?php if(isset($_SESSION['fallo'])):?>
            <p class="alerta fallo"><?=$_SESSION['fallo'];?></p>
        <?php endif;?>
        <form action="guardar-libro.php" method="POST" class="category-input" enctype="multipart/form-data">
            <label for="name">Nombre</label>
            <?=isset($_SESSION['errores']['name']) ? showError($_SESSION['errores']['name']) : false;?><br>
            <input type="text" name="name"><br>

            <label for="category">Categoria</label>
            <?=isset($_SESSION['errores']['category']) ? showError($_SESSION['errores']['category']) : false;?><br>
            <?php $categorias = getCategorias($db, null);?>
            <select name="category" required>
                <option selected disabled>Seleccionar</option>
                <?php if(!empty($categorias) && mysqli_num_rows($categorias)>0):?>
                <?php while($categoria = mysqli_fetch_assoc($categorias)):?>
                    <option value="<?=$categoria['id'];?>"><?=$categoria['nombre'];?></option>
                <?php endwhile;?>                
                <?php endif;?>                
            </select><br>

            <label for="author">Autor</label>
            <?=isset($_SESSION['errores']['author']) ? showError($_SESSION['errores']['author']) : false;?><br>
            <input type="text" name="author"><br>

            <label for="editorial">Editorial</label>
            <?=isset($_SESSION['errores']['editorial']) ? showError($_SESSION['errores']['editorial']) : false;?><br>
            <input type="text" name="editorial"><br>

            <label for="year">Año edición</label>
            <?=isset($_SESSION['errores']['year']) ? showError($_SESSION['errores']['year']) : false;?><br>
            <input type="text" name="year"><br>

            <label for="pages">Páginas</label>
            <?=isset($_SESSION['errores']['pages']) ? showError($_SESSION['errores']['pages']) : false;?><br>
            <input type="text" name="pages"><br>

            <label for="imagen">Imágen</label>
            <?=isset($_SESSION['errores']['imagen']) ? showError($_SESSION['errores']['imagen']) : false;?><br>
            <input type="file" name="imagen" required/><br>

            <input type="submit" value="Guadar">
        </form>
        <?php deleteVars();?>
    </div>
<?php require_once 'includes/footer.php';?>