<?php include 'template/header.php'?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from pastel");
    $pastel = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($pastel);
?>


<div class="containter mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- primera tabla -->
            <!-- Inicio Alerta-->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>

            <!-- registrar-->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Registrado con éxito.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   

            <!-- error al editar-->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Update!</strong> Datos actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>

            

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Datos eliminados con éxito.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

            <!--fin alerta-->

            <div class="card">
                <div class="card-header">
                    Lista de pasteles
                </div>
                <div class="p-4">
                    <div
                        class="table-responsive"
                    >
                        <table class="table table-primary">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">NOMBRE</th>
                                    <th scope="col">DESCRIPCCION</th>
                                    <th scope="col">PREPARADO POR</th>
                                    <th scope="col">FECHA CREACIÓN</th>
                                    <th scope="col">FECHA VENCIMIENTO</th>
                                    <th scope="col" colspan="2">OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach($pastel as $dato){
                                ?>
                                <tr class="">
                                    <td scope="row"><?php echo $dato->id ?></td>
                                    <td><?php echo $dato->nombre ?></td>
                                    <td><?php echo $dato->descripcion ?></td>
                                    <td><?php echo $dato->preparado_por ?></td>
                                    <td><?php echo $dato->fecha_creacion ?></td>
                                    <td><?php echo $dato->fecha_vencimiento ?></td>
                                    <!-- editamos datos guardados -->
                                    <td><a class="text-success" href="editar.php?id=<?php echo $dato->id; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                    <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?id=<?php echo $dato->id; ?>"><i class="bi bi-trash"></i></a></td>
                                </tr>
                                <?php 
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">

            <!-- segunda tabla -->
            <div class="card">
                <div class="card-header">
                    Registrar nuevo pastel
                </div>
                <form  class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form.label">ID:</label>
                        <input type="number" class="form-control" name="txtId" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form.label">NOMBRE:</label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form.label">DESCRIPCIÓN:</label>
                        <input type="text" class="form-control" name="txtDescripcion" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form.label">ELABORADO POR:</label>
                        <input type="text" class="form-control" name="txtAutor" autofocus >
                    </div>
                    <div class="mb-3">
                        <label class="form.label">FECHA CREACIÓN:</label>
                        <input type="date" class="form-control" name="txtFecha1" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form.label">FECHA VENCIMIENTO:</label>
                        <input type="date" class="form-control" name="txtFecha2" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php'?>