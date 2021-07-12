<?php require_once 'includes/header.php';?>
<?php require_once 'includes/aside.php';?>
    <section class="section">
        <div class="section-container">
            <h1>Algunos de los libros</h1>
            <!-- <h1>Resultados para <strong>Busqueda</strong></h1> -->
            <div class="items-container">
            <?php $libros = getLibros($db);?>
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
            <?php else:?>
                <div class="item">
                    <h3 class="item-title">Las mil y una noches</h3>
                    <div class="item-content">
                        <figure class="image-container">
                            <img src="assets/images/book-image.jpg" alt="item-image">
                        </figure>
                        <div class="item-details">
                            <a href="#">Visualizar</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <h3 class="item-title">Pasaje misterioso</h3>
                    <div class="item-content">
                        <figure class="image-container">
                            <img src="assets/images/book-image.jpg" alt="item-image">
                        </figure>
                        <div class="item-details">
                            <a href="#">Visualizar</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <h3 class="item-title">Mas halla del amanecer</h3>
                    <div class="item-content">
                        <figure class="image-container">
                            <img src="assets/images/book-image.jpg" alt="item-image">
                        </figure>
                        <div class="item-details">
                            <a href="#">Visualizar</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <h3 class="item-title">Entre los hechos</h3>
                    <div class="item-content">
                        <figure class="image-container">
                            <img src="assets/images/book-image.jpg" alt="item-image">
                        </figure>
                        <div class="item-details">
                            <a href="#">Visualizar</a>
                        </div>
                    </div>
                </div>
            <?php endif;?>
            </div>
        </div>
<?php require_once 'includes/footer.php';?>