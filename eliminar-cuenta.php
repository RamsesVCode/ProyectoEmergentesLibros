<?php
    require_once 'includes/redireccion-user.php';
    require_once 'includes/conection.php';
    if(!isset($_SESSION))
        session_start();
    $sql = "DELETE FROM usuarios WHERE id = {$_SESSION['usuario']['id']}";
    $query = mysqli_query($db,$sql);
    if(!$query){
        $_SESSION['drop'] = 'No se pudo eliminar la cuenta';
        header('Location:perfil.php');
    }else{
        require_once 'cerrar.php';
    }
?>