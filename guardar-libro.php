<?php
if(isset($_POST)){
    session_start();
    require_once 'includes/conection.php';
    $name = isset($_POST['name']) ? mysqli_real_escape_string($db,$_POST['name']) : false;
    $category = isset($_POST['category']) ? (int)mysqli_real_escape_string($db,$_POST['category']) : false;
    $author = isset($_POST['author']) ? mysqli_real_escape_string($db,$_POST['author']) : false;
    $editorial = isset($_POST['editorial']) ? mysqli_real_escape_string($db,$_POST['editorial']) : false;
    $year = isset($_POST['year']) ? mysqli_real_escape_string($db,$_POST['year']) : false;
    $pages = isset($_POST['pages']) ? mysqli_real_escape_string($db,$_POST['pages']) : false;
    //DATOS DE LA IMAGEN
    $file = $_FILES['imagen'];
    $filename = $file['name'];
    $mimetype = $file['type'];

    //ARRAY DE POSIBLES ERRORES
    $errores = array();
    //VALIDAMOS LOS DATOS
    //VALIDAMOS EL NOMBRE
    if(empty($name)){
        $errores['name'] = 'Nombre no valido';
    }
    //VALIDAMOS LA CATEGORIA
    if(empty($category)){
        $errores['category'] = 'Categoria no valida';
    }
    //VALIDAMOS EL AUTOR
    if(empty($author) || is_numeric($author) || preg_match('/[0-9]/',$author)){
        $errores['author'] = 'Author no valido';
    }
    //VALIDAMOS EL EDITORIAL
    if(empty($editorial)){
        $errores['editorial'] = 'Editorial no valido';
    }
    //VALIDAMOS EL AÑO
    if(empty($year) || preg_match('/[A-Z]/',$year)){
        $errores['year'] = 'Año no valido';
    }
    //VALIDAMOS EL NUMERO DE PAGINAS
    if(empty($pages) || preg_match('/[A-Z]/',$pages)){
        $errores['pages'] = 'Número paginas no valido';
    }
    //VALIDAMOS LA IMAGEN
    if($mimetype=='image/jpg' || $mimetype=='image/jpeg' || $mimetype=='image/png' || $mimetype=='image/gif'){
        //COMPROBAMOS EL DIRECTORIO  
        if(!is_dir('uploads/images')){
            mkdir('uploads/images',0777,true);
        }      
        $image = $filename;
        move_uploaded_file($file['tmp_name'],'uploads/images/'.$filename);
    }else{
        $errores['imagen'] = 'Formato de archivo no valido';
    }

    //VERIFICAMOS QUE NO HAYAN ERRORES
    if(empty($errores)){
        $sql = "INSERT INTO libros VALUES(NULL,{$_SESSION['usuario']['id']},$category,'$name','$author','$editorial','$year',$pages,'$filename');";
        $query = mysqli_query($db,$sql);
        if(!$query){
            $_SESSION['fallo'] = 'No se pudo ingresar el libro';
        }
    }else{
        $_SESSION['errores'] = $errores;
    }
    if(isset($_SESSION['fallo']) || isset($_SESSION['errores'])){
        header('Location:ingresar-libro.php');
    }else{
        header('Location:index.php');
    }
}

?>