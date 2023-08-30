<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $numero = $_POST["numero"];
    $tipo_identificacion = $_POST["tipo_identificacion"];
    $consulta = $_POST["consulta"];

    $destinatario = "tucorreo@example.com";
    $asunto = "Nueva consulta de $nombre";
    $mensaje = "Nombre: $nombre\nCorreo: $correo\nNúmero: $numero\nTipo de Identificación: $tipo_identificacion\nConsulta: $consulta";
}
?>