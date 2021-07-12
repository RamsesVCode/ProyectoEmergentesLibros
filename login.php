<?php
    if(isset($_POST)){
        require_once 'includes/conection.php';
        if(!isset($_SESSION))
            session_start();
        //RECIBIMOS LOS DATOS
        $email = isset($_POST['email']) ? mysqli_real_escape_string($db,$_POST['email']) : false;
        $password = isset($_POST['password']) ? mysqli_real_escape_string($db,$_POST['password']) : false;

        //ARRAY DE POSIBLES ERRORES
        $error=array();

        //VALIDAMOS LOS DATOS
        //VALIDAMOS EL EMAIL
        if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error['email'] = 'Email no valido';
        }
        //VALIDAMOS EL PASSWORD
        if(empty($password)){
            $error['password'] = 'Password no valido';
        }
        //VERIFICAMOS QUE NO HAYAN ERRORES
        if(empty($error)){
            $sql = "SELECT * FROM usuarios WHERE correo = '$email';";
            $query = mysqli_query($db,$sql);

            //VERIFICAMOS QUE LA RESPUESTA SOLO SAQUE UN REGISTRO
            if($query && mysqli_num_rows($query)==1){
                $usuario = mysqli_fetch_assoc($query);
                if(password_verify($password,$usuario['password'])){
                    $_SESSION['usuario'] = $usuario;        
                }else{
                    $_SESSION['password'] = 'Password incorrecto';
                }
            }else{
                $_SESSION['error'] = 'No hay resultados';
            }
        }else{
            $_SESSION['fallos'] = $error;
        }
        header('Location:index.php');
    }
?>