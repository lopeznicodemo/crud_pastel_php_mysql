<?php 
   
   print_r($_POST);
   if(empty($_POST["codigo"]) ||empty($_POST["txtId"]) || empty($_POST["txtNombre"]) || empty($_POST["txtDescripcion"]) || empty($_POST["txtAutor"]) || empty($_POST["txtFecha1"]) || empty($_POST["txtFecha2"])){
      //echo "faltan datos";
      header('Location: index.php?mensaje=falta');
      exit();
   }

   include_once 'model/conexion.php';
    $id=$_POST["txtId"];
    $nombre=$_POST["txtNombre"];
    $descripcion = $_POST["txtDescripcion"];
    $autor = $_POST["txtAutor"];
    $fecha1 =$_POST["txtFecha1"];
    $fecha2 =$_POST["txtFecha2"];

    $sentencia =$bd->prepare("INSERT INTO pastel
    (id,nombre,descripcion,preparado_por,fecha_creacion,fecha_vencimiento)
    VALUES (?,?,?,?,?,?);");
    $resultado= $sentencia->execute([$id,$nombre,$descripcion,$autor,$fecha1,$fecha2]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
?> 
