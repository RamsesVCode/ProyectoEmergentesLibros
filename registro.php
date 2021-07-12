<?php
    if(isset($_POST)){
        require_once 'includes/conection.php';
        if(!isset($_SESSION))
            session_start();
        //CREAMOS LAS VARIABLES DEL REGISTRO
        $name = isset($_POST['name']) ? mysqli_real_escape_string($db,$_POST['name']) : false;
        $lname = isset($_POST['lname']) ? mysqli_real_escape_string($db,$_POST['lname']) : false;
        $email = isset($_POST['email']) ? mysqli_real_escape_string($db,$_POST['email']) : false;
        $password = isset($_POST['password']) ? mysqli_real_escape_string($db,$_POST['password']) : false;
        
        //CREAMOS UN ARRAY PARA LOS ERRORES
        $errores = array();

        //VALIDAMOS LAS VARIABLES
        //VALIDAMOS EL NOMBRE
        if(empty($name) || is_numeric($name) || preg_match('/[0-9]/',$name)){
            $errores['name'] = 'Nombre no valido';
        }
        //VALIDAMOS EL APELLIDO
        if(empty($lname) || is_numeric($lname) || preg_match('/[0-9]/',$lname)){
            $errores['lname'] = 'Apellidos no validos';
        }
        //VALIDAMOS EL CORREO
        if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errores['email'] = 'Email no valido';
        }
        //VALIDAMOS EL PASSWORD
        if(empty($password)){
            $errores['password'] = 'Password no valido';
        }

        //REVIZAMOS QUE NO HAYAN ERRORES
        if(empty($errores)){
            //CODIFICAMOS EL PASSWORD PARA REGISTRARLO EN LA BD
            $strong_password = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);

            //ANALIZAMOS SI ES REGISTRO O ACTUALIZACIÓN
            if(isset($_SESSION['usuario']) && isset($_GET['id']) && $_GET['id']=='1'){
                //ACTUALIZAMOS DATOS DE LA BD
                $sql = "UPDATE usuarios SET nombre='$name',apellidos='$lname',correo='$email',password='$strong_password' WHERE id = {$_SESSION['usuario']['id']};";
                $_SESSION['usuario']['nombre'] = $name; 
                $_SESSION['usuario']['apellidos'] = $lname; 
                $_SESSION['usuario']['correo'] = $email; 
                $_SESSION['usuario']['password'] = $strong_password; 
            }else{
                //INSERTAMOS EN LA BASE DE DATOS
                $sql = "INSERT INTO usuarios VALUES(NULL,'$name','$lname','$email','$strong_password',CURDATE(),'user');";
            }
            $query = mysqli_query($db,$sql);
            //VERIFICAMOS QUE SE HAYA CREADO EL USUARIO EXITOSAMENTE
            if($query){
                $_SESSION['exito'] = 'Proceso exitoso';
            }else{
                $_SESSION['fallo'] = 'No se creó el usuario';
            }
        }else{
            $_SESSION['errores'] = $errores;
        }
    }
    if(isset($_SESSION['usuario']) && isset($_GET['id']) && $_GET['id']=='1'){
        header('Location:actualizar-datos.php');
    }else{
        header('Location:index.php');
    }
?>