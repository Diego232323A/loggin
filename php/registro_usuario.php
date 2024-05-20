<?php
include 'conexion.php';

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$contrasena_encriptada = hash('sha512', $contrasena);

$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo'");
if (mysqli_num_rows($verificar_correo) > 0) {
    echo '
        <script>
            alert("Este correo electrónico ya está registrado. Por favor, intenta con otro correo.");
            window.location = "../index.php";
        </script>
    ';
    exit();
}

$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario'");
if (mysqli_num_rows($verificar_usuario) > 0) {
    echo '
        <script>
            alert("Este usuario ya está registrado. Por favor, intenta con otro usuario.");
            window.location = "../index.php";
        </script>
    ';
    exit();
}

$insertar_usuario = mysqli_query($conexion, "INSERT INTO usuarios (nombre_completo, correo, usuario, contrasena) VALUES ('$nombre_completo', '$correo', '$usuario', '$contrasena_encriptada')");

if ($insertar_usuario) {
    echo '
        <script>
            alert("Usuario registrado exitosamente.");
            window.location = "../index.php";
        </script>
    ';
} else {
    echo '
        <script>
            alert("Error al registrar usuario. Por favor, intenta nuevamente.");
            window.location = "../index.php";
        </script>
    ';
}
