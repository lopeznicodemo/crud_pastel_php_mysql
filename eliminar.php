<?php

    include 'model/conexion.php';
    $codigo = $_GET['id'];

    $sentencia = $bd->prepare("DELETE FROM pastel where id = ?;");
    $resultado = $sentencia->execute([$codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }

?>