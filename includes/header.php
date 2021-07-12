<?php session_start();?>
<?php require_once 'includes/helpers.php';?>
<?php require_once 'includes/conection.php';?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="assets/css/style.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Open+Sans:wght@300&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <title>Libreria para todos</title>
</head>
<body>
    <div class="body">
        <div class="container">
            <header class="header">
                <div class="logo-header">
                    <h1><a href="#"><strong>Book</strong> Life</a></h1>
                    <form action="#" method="post">
                        <input type="text" placeholder="Buscar">
                    </form>
                </div>
                <?php $categorias = getCategorias($db, null);?>
                <ul class="category-list">
                <?php if(!empty($categorias) && mysqli_num_rows($categorias)>0):?>
                    <?php while($categoria = mysqli_fetch_assoc($categorias)):?>
                        <li><a href="categoria.php?id=<?=$categoria['id'];?>"><?=$categoria['nombre'];?></a></li>
                    <?php endwhile;?>
                <?php else:?>
                    <li><a href="#">Suspenso</a></li>
                    <li><a href="#">Terror</a></li>
                    <li><a href="#">Drama</a></li>
                    <li><a href="#">Accion</a></li>
                    <li><a href="#">Paranormal</a></li>
                <?php endif;?>
                </ul>
            </header>