<?php
//FUNCION PARA BORRAR LAS VARIABLES DE SESION QUE SOLO SE MUESTRAN UNA VEZ
function deleteVars(){
    if(isset($_SESSION['exito'])){
        unset($_SESSION['exito']);
    }
    if(isset($_SESSION['fallo'])){
        unset($_SESSION['fallo']);
    }
    if(isset($_SESSION['errores'])){
        unset($_SESSION['errores']);
    }
    if(isset($_SESSION['password'])){
        unset($_SESSION['password']);
    }
    if(isset($_SESSION['error'])){
        unset($_SESSION['error']);
    }
    if(isset($_SESSION['fallos'])){
        unset($_SESSION['fallos']);
    }
    if(isset($_SESSION['drop'])){
        unset($_SESSION['drop']);
    }
}
//FUNCION PARA MOSTRAR LOS ERRORES EN EL REGISTRO Y LOGIN
function showError($error){
    return "<span class='alerta fallo input'> (".$error.')</span>';
}
//FUNCION PARA OBTENER TODAS LAS CATEGORIAS DE LIBROS
function getCategorias($db, $id){
    $resultado = '';
    $sql = "SELECT * FROM categoria";
    if($id != null){
        $sql .= " WHERE id = $id";
    }
    $query = mysqli_query($db,$sql);
    if($query){
        $resultado = $query;
    }
    return $resultado;
}
//FUNCION PARA OBTENER TODOS LOS LIBROS
function getLibros($db,$id=null){
    $resultado = '';
    $sql = "SELECT * FROM libros";
    if($id != null){
        $sql .= " WHERE categoria_id = $id";
    }
    $sql .= " ORDER BY 1 DESC";
    $query = mysqli_query($db,$sql);
    if($query){
        $resultado = $query;
    }
    return $resultado;
}
function getPassword($pass){
    $result = '';
    for($i = 0 ; $i<strlen($pass) ; $i++){
        $result .='*';
    }
    return $result;
}
function getAllUsers($db){
    $resultado = '';
    $sql = "SELECT * FROM usuarios";
    $query = mysqli_query($db,$sql);
    if($query){
        $resultado = $query;
    }
    return $resultado;
}
function getAllBooks($db){
    $resultado = '';
    $sql = "SELECT u.nombre 'Nombre',l.nombre 'Libro',c.nombre 'Categoria' 
            FROM libros l JOIN categoria c
            ON(l.categoria_id=c.id) JOIN usuarios u
            ON(l.usuario_id=u.id);";
    $query = mysqli_query($db,$sql);
    if($query){
        $resultado = $query;
    }
    return $resultado;
}
?>