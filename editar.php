<?php include 'template/header.php' ?>

<?php
    
   if(!isset($_GET['id'])){
        header('Location: index.php?mensaje=error');
        exit();
    }
    
    
    // if(!isset($_GET['id'])){ //valida si sequiere editar id inexistente desde url editar
    //    header('Location: index.php?mensaje=error');
    //    exit();
    //}

    include_once 'model/conexion.php';
    $codigo = $_GET['id'];

    $sentencia = $bd->prepare("select * from pastel where id = ?;");
    $sentencia->execute([$codigo]);
    $pastel= $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="containter mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="card">
                <div class="card-header">
                    Editar datos de Pastel
                </div>
                <form  class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form.label">ID:</label>
                        <input type="number" class="form-control" name="txtId"  required
                        value="<?php echo $pastel->id; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form.label">NOMBRE:</label>
                        <input type="text" class="form-control" name="txtNombre" required
                        value="<?php echo $pastel->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form.label">DESCRIPCIÓN:</label>
                        <input type="text" class="form-control" name="txtDescripcion" required
                        value="<?php echo $pastel->descripcion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form.label">ELABORADO POR:</label>
                        <input type="text" class="form-control" name="txtAutor" required
                        value="<?php echo $pastel->preparado_por; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form.label">FECHA CREACIÓN:</label>
                        <input type="date" class="form-control" name="txtFecha1" required 
                        value="<?php echo $pastel->fecha_creacion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form.label">FECHA VENCIMIENTO:</label>
                        <input type="date" class="form-control" name="txtFecha2" required
                        value="<?php echo $pastel->fecha_vencimiento; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $pastel->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>


<?php include 'template/footer.php' ?>