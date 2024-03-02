<?php


    include 'model/conexion.php';
    $codigo=$_POST["codigo"];
     $id=$_POST['txtId'];
     $nombre=$_POST['txtNombre'];
     $descripcion=$_POST['txtDescripcion'];
     $autor=$_POST['txtAutor'];
     $fecha1=$_POST['txtFecha1'];
     $fecha2=$_POST['txtFecha2'];

    $sentencia = $bd->prepare("UPDATE pastel SET id = ?, nombre = ?, descripcion = ?, preparado_por = ?, fecha_creacion = ?,
    fecha_vencimiento=? where id = ?;");
    $resultado =$sentencia->execute([$id, $nombre, $descripcion, $autor, $fecha1, $fecha2,$codigo]);


    if($resultado === TRUE){
        header('Location: index.php?mensaje=editado');
        //echo 'ok';
    }else{
        header('Location: index.php?mensaje=error');
        exit();
        //echo 'error';
    }
?>