<?php require_once 'includes/header.php';?>
<?php require_once 'includes/aside.php';?>
    <section class="section">
        <div class="section-container">
            <?php 
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                }else{
                    header('Location:index.php');
                }
            ?>
            <?php $categoria = mysqli_fetch_assoc(getCategorias($db,$id));?>
            <h1>Libros de la categoria "<?=$categoria['nombre'];?>"</h1>
            <!-- <h1>Resultados para <strong>Busqueda</strong></h1> -->
            <div class="items-container">
            <?php $libros = getLibros($db, $id);?>
            <?php if(!empty($libros) && mysqli_num_rows($libros)>0):?>
                <?php while($libro = mysqli_fetch_assoc($libros)):?>
                    <div class="item">
                        <h3 class="item-title"><?=$libro['nombre'];?></h3>
                        <div class="item-content">
                            <figure class="image-container">
                                <img src="uploads/images/<?=$libro['imagen'];?>" alt="item-image">
                            </figure>
                            <div class="item-details">
                                <a href="#">Visualizar</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile;?>
            <?php endif;?>
            </div>
        </div>
<?php require_once 'includes/footer.php';?>