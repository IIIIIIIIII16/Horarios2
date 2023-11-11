<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $fechaNacimiento = $_POST["fecha_nacimiento"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $tipoIdentificacion = $_POST["tipo_identificacion"];
    $numeroIdentificacion = $_POST["numero_identificacion"];
    $genero = $_POST["genero"];
    $domicilio = trim($_POST["domicilio"]);
    $aceptarCorreos = isset($_POST["aceptar_correos"]);

    // Validaciones
    $errores = array();

    if (strlen($nombre) < 10 || strlen($nombre) > 15 || substr_count($nombre, ' ') < 2) {
        $errores[] = "El nombre completo debe tener entre 10 y 15 caracteres y contener al menos dos apellidos.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match('/@gmail\.com$/', $email)) {
        $errores[] = "El correo electrónico no es válido o no es de Gmail.";
    }

    if (!preg_match('/^(\+|-|\s|\d){6,16}$/', $telefono)) {
        $errores[] = "El número telefónico no es válido.";
    }

    if (($tipoIdentificacion === "CI" && (strlen($numeroIdentificacion) < 6 || strlen($numeroIdentificacion) > 12)) ||
        ($tipoIdentificacion === "CE" && (strlen($numeroIdentificacion) < 8 || strlen($numeroIdentificacion) > 16))) {
        $errores[] = "El número de identificación no cumple con los requisitos.";
    }

    if (strlen($domicilio) < 1) {
        $errores[] = "El domicilio no puede estar vacío.";
    }

    if (empty($errores)) {
        // Los datos son válidos, aquí puedes almacenarlos en la base de datos o realizar otras acciones necesarias.
        // En este ejemplo, simplemente mostramos un mensaje de registro exitoso.
        echo "Registro exitoso. Los datos se han guardado correctamente.";
    } else {
        // Mostrar errores si los hay
        foreach ($errores as $error) {
            echo $error . "<br>";
        }
    }
}
?>