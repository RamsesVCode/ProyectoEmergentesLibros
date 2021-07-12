<?php require_once 'includes/header.php';?>
<?php require_once 'includes/aside.php';?>
    <section class="section">
        <div class="section-container">
            <h1>Panel de administrador</h1>

            <!-- VISTA DE LIBROS -->
            <h2>Publicaciones</h2>
            <?php $views = getAllBooks($db);?>
            <table border=1 cellspacing=0 class="table">
                <tr>
                    <th>Nombre</th>
                    <th>Libro</th>
                    <th>Categoria</th>
                </tr>
                <?php if(!empty($views) && mysqli_num_rows($views)>0):?>
                    <?php while($view = mysqli_fetch_assoc($views)):?>
                        <tr>
                            <td><?=$view['Nombre'];?></td>
                            <td><?=$view['Libro'];?></td>
                            <td><?=$view['Categoria'];?></td>
                        </tr>
                        <?php endwhile;?>
                <?php endif;?>
            </table>

            <!--VISTA DE USUARIOS-->
            <h2>Usuarios</h2>
            <?php $usuarios = getAllUsers($db);?>
            <table border=1 cellspacing=0 class="table">
                <tr>
                    <?php foreach($_SESSION['usuario'] as $ind => $val):?>
                        <th><?=$ind?></th>
                    <?php endforeach;?>
                </tr>
            <?php if(!empty($usuarios && mysqli_num_rows($usuarios)>0)):?>
                <?php while($usuario = mysqli_fetch_assoc($usuarios)):?>
                    <tr>
                        <td><?=$usuario['id'];?></td>
                        <td><?=$usuario['nombre'];?></td>
                        <td><?=$usuario['apellidos'];?></td>
                        <td><?=$usuario['correo'];?></td>
                        <td><?=getPassword(substr($usuario['password'],0,8));?></td>
                        <td><?=$usuario['fecha'];?></td>
                        <td><?=$usuario['rol'];?></td>
                    </tr>
                    <?php endwhile;?>
            <?php endif;?>
            </table>

            <!--VISTA DE CATEGORIAS-->
            <h2>Categorias</h2>
            <table border=1 cellspacing=0 class="table">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                </tr>
            <?php $categorias = getCategorias($db,null);?>
            <?php if(!empty($categorias) && mysqli_num_rows($categorias)>0):?>
                <?php while($categoria = mysqli_fetch_assoc($categorias)):?>
                    <tr>
                        <td><?=$categoria['id'];?></td>
                        <td><?=$categoria['nombre'];?></td>
                        <td><?=$categoria['descripcion'];?></td>
                    </tr>
                    <?php endwhile;?>
            <?php endif;?>
            </table>
        </div>
<?php require_once 'includes/footer.php';?>