<?php


    function validadorLogin($dato){
    
    $username = $dato['username'];
    $password = $dato['password'];
    
    if(filter_var($username, FILTER_VALIDATE_EMAIL)){
        // VALIDACION EMAIL
        if(strlen($username) === 0){
            $error['username'] = 'llena este campo';
        }else if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {

            $error['username'] = 'El formato de email es incorrecto';
        }
    } else {
        // VALIDACION USERNAME
        if(strlen($username) === 0){
            $error['username'] = 'llena este campo';
        } else if (strpos($username, ' ')) {
    
            $error['username'] = 'Tu nombre de usuario no debe tener espacios';
        }
    }
    
    // VALIDACION PASSWORD
    if(strlen($password) === 0){
        $error['password'] = 'llena este campo';
    } else if (strlen($password) > 16) {

        $error['password'] = 'La clave debe tener menos de 16 caracteres';
    } else if (!preg_match('`[a-z]`', $password)) {

        $error['password'] = "La clave debe tener al menos una letra minúscula";
    } else if (!preg_match('`[A-Z]`', $password)) {

        $error['password'] = "La clave debe tener al menos una letra mayuscula";
    } else if (!preg_match('`[0-9]`', $password)) {

        $error['password'] = "La clave debe tener al menos un caracter numerico";
    }

    if(!empty($error)){
        return $error;
    } else {
    
        $conexion = mysqli_connect('localhost', 'root', '52752', 'e-coomerce-prueba');
        $consulta = mysqli_query($conexion, "SELECT * FROM `usuarios` WHERE username = '$username' or email = '$username'");

        $data = mysqli_fetch_array($consulta);
        if($data){
            if(password_verify($password, $data['password'])){
                $_SESSION['id'] = $data['id'];
                $_SESSION['name'] = $data['name'];
                $_SESSION['email'] = $data['email'];

                header('location: index.php');
                
            } else {
                $error['username'] = "Contraseña incorrecta";
                return $error;
            }
        } else {
            $error['username'] = "No se ha encontrado ninguna cuenta asociada a este nombre de usuario o dirección de correo electrónico";
            return $error;
        }
        
        return Null;
    }


}