<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $tipo_identificacion = $_POST['tipo_identificacion'];
    $numero_identificacion = $_POST['numero_identificacion'];
    $consulta = $_POST['consulta'];
    
    $errores = array();

    if (strlen($nombre) < 5 || strlen($nombre) > 60) {
        $errores[] = "El nombre debe tener entre 5 y 60 caracteres.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El correo electrónico no es válido.";
    }

    if (strlen($telefono) < 8 || strlen($telefono) > 16 || !preg_match('/^[0-9+-\s]*$/', $telefono)) {
        $errores[] = "El número telefónico no es válido.";
    }

    if ($tipo_identificacion === 'CI' && (strlen($numero_identificacion) < 6 || strlen($numero_identificacion) > 12)) {
        $errores[] = "El número de identificación CI debe tener entre 6 y 12 caracteres.";
    } elseif ($tipo_identificacion === 'CE' && (strlen($numero_identificacion) < 8 || strlen($numero_identificacion) > 16)) {
        $errores[] = "El número de identificación CE debe tener entre 8 y 16 caracteres.";
    }

    if (strlen($consulta) < 8 || strlen($consulta) > 300) {
        $errores[] = "La consulta debe tener entre 8 y 300 caracteres.";
    }

    if (strpos(strtolower($consulta), 'sugerencia') !== false) {
        $mensaje_bienvenida = "Gracias por tu sugerencia, $nombre!";
    } else {
        $mensaje_bienvenida = "Gracias por tu consulta, $nombre!";
    }

    if (count($errores) > 0) {
        echo "Hubo errores al procesar el formulario:<br>";
        foreach ($errores as $error) {
            echo $error . "<br>";
        }
    } else { 
        echo $mensaje_bienvenida;
    }

} else {
    header("Location: Soporte.html");

}
?>
