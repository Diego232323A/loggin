<?php
session_start();

include 'conexion.php';

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
// Encriptación de la contraseña
$contrasena = hash('sha512', $contrasena);

$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' AND contrasena ='$contrasena'");

if(mysqli_num_rows($validar_login) > 0) { 
    // Obtener los datos del usuario como un arreglo asociativo
    $usuario = mysqli_fetch_assoc($validar_login);
    // Almacenar los datos del usuario en la sesión
    $_SESSION['usuario'] = $usuario;
    // Redirigir al usuario a la página de bienvenida
    header("location: ../bienvenida.php");
    exit();
} else { 
    echo '
        <script>
            alert("Usuario no existe, por favor verifique los datos introducidos");
            window.location = "../index.php";
        </script>
    ';
    exit();
}
?>
