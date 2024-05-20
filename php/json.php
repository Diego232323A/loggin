<?php
include 'conexion.php';

$query = "SELECT * FROM usuarios";
$result = mysqli_query($conexion, $query);

$usuarios = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $usuarios[] = $row;
    }
    echo json_encode($usuarios);
} else {
    echo json_encode(["error" => "No se pudo ejecutar la consulta"]);
}

mysqli_close($conexion);
?>
