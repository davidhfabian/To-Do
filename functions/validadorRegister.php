<?php 

function validadorRegistro($dato){
    $name = $dato['name'];
    $username = $dato['username'];
    $password = $dato['password'];
    $email = $dato['email'];
    
    // VALIDACION NOMBRE 
    if(strlen($name) === 0){
        $error['name'] = 'llena este campo';
    } else if (strlen($name) < 5){
        $error['name'] = 'min 5 caracteres';
    } else if (preg_match_all('/[0-9]+/', $name)){
        $error['name'] = 'Nombre no puede contener numeros';
    }
    // VALIDACION USERNAME
    if(strlen($username) === 0){
        $error['username'] = 'llena este campo';
    } else if (strpos($username, ' ')) {

        $error['username'] = 'Tu nombre de usuario no debe tener espacios';
    }
    // VALIDACION EMAIL
    if(strlen($email) === 0){
        $error['email'] = 'llena este campo';
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $error['email'] = 'El formato de email es incorrecto';
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
        return Null;
    }
}