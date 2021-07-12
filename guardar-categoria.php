<?php
if(isset($_POST)){
    session_start();
    require_once 'includes/conection.php';
    $name = isset($_POST['name']) ? mysqli_real_escape_string($db,$_POST['name']) : false;
    $description = isset($_POST['description']) ? mysqli_real_escape_string($db,$_POST['description']) : false;

    //ARRAY DE POSIBLES ERRORES
    $errores = array();
    //VALIDAMOS LOS DATOS
    //VALIDAMOS EL NOMBRE
    if(empty($name)){
        $errores['name'] = 'Nombre no valido';
    }
    //VALIDAMOS LA DESCRIPCION
    if(empty($description)){
        $errores['description'] = 'Descripción no valida';
    }

    //VERIFICAMOS QUE NO HAYAN ERRORES
    if(empty($errores)){
        $sql = "INSERT INTO categoria VALUES(NULL,'$name','$description');";
        $query = mysqli_query($db,$sql);
        if(!$query){
            $_SESSION['fallo'] = 'No se pudo ingresar la categoria';
        }
    }else{
        $_SESSION['errores'] = $errores;
    }
    if(isset($_SESSION['fallo']) || isset($_SESSION['errores'])){
        header('Location:ingresar-categoria.php');    
    }else{
        header('Location:index.php');
    }
}

?>