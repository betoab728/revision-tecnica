<?php
    require_once("./modelos/conexion.php");
    include_once "./vistas/modulos/header.php";
 
    //Registrar datos
 if (isset($_REQUEST['btn_registrar'])) {
    //creamos variables para recuperar los datos 
    $_tipoflota = $_POST['_tipoflota'];
    $_estado = $_POST['_estado'];
    $_sede = $_POST['_sede'];
    $_marca = $_POST['_marca'];
    $_modelo = $_POST['_modelo'];
    $_serie = $_POST['_serie'];
    $_placa = $_POST['_placa'];
    $_descripcion = $_POST['_descripcion'];

    //ejecutamos nuestra consulta
    $sql = "SELECT id_tipoflota, id_estado, id_sede, marca_flota, modelo_flota, serie_flota, placa_flota, nombre_flota FROM flota where nombre_flota = '$_descripcion'";
    $ejecutar = $conex->query($sql);
    $filas = $ejecutar->num_rows;


    if ($filas > 0) {
        echo"
            <script>
                alert('El tipo de Estado ya se encuentra registrado..!');
            </script>
        ";
    } else {

        /*almacenamos nuestra consulta en una variable*/
        $sql = "INSERT INTO flota (id_tipoflota,id_estado,id_sede,marca_flota,modelo_flota,serie_flota,placa_flota,nombre_flota) 
        VALUES ('$_tipoflota','$_estado','$_sede','$_marca','$_modelo','$_serie','$_placa','$_descripcion')"; 
    
        /*Ejecutamos nuestra consulta pasando nuestra variable*/
        $ejecutar = $conex->query($sql);

        if($ejecutar > 0){
            echo"
                <script>
                    alert('Registro correcto..!');
         
                </script>
            ";
        }else{
            echo"
            <script>
                alert('Error al registrarse..!');
               
            </script>
            "; 
        }
    }
}

/*Actualizar datos*/
if (isset($_REQUEST['btn_editar'])) {
    //creamos variables para recuperar los datos del form modal editar
    $_id = $_POST['_id'];
    $_tipoflota = $_POST['_tipoflota'];
    $_estado = $_POST['_estado'];
    $_sede = $_POST['_sede'];
    $_marcaflota = $_POST['_marcaflota'];
    $_modeloflota = $_POST['_modeloflota'];
    $_serieflota = $_POST['_serieflota'];
    $_placaflota = $_POST['_placaflota'];
    $_descripcionflota = $_POST['_descripcionflota'];
    
    $sql = "UPDATE flota SET id_tipoflota = '$_tipoflota', id_estado = '$_estado',id_sede = '$_sede',
    marca_flota ='$_marcaflota', modelo_flota = '$_modeloflota', serie_flota = '$_serieflota', placa_flota = '$_placaflota', nombre_flota = '$_descripcionflota' where id_flota = '$_id'";

    $ejecutar = $conex->query($sql);

        if ($ejecutar > 0) {
            echo"
                <script>
                    alert('Se actualizarón los datos..!');
                </script>";
        } else {
            echo"
                <script>
                    alert('No se pudo actualizar los datos..!');
                </script>
            ";
        }

}


/*Eliminar datos */
if (isset($_REQUEST['btn_eliminar'])) {
    $id = $_POST['_id'];

    $sql = "DELETE from flota where id_flota = '$id'";
    $ejecutar = $conex ->query($sql);

    if($ejecutar > 0){
        echo"
            <script>
                alert('Registro eliminado..!');
            </script>
        ";
    }else{
        echo"
        <script>
            alert('Error al eliminar registro..!');
        </script>
        "; 
    }

    
}


?>

<section class="content-wrapper">
    <!-- cabecera del contenido-->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Flota / Lista Flotas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Flota / Lista de Flotas</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- fin cabecera del contenido -->

    <div class="content pb-2">
        <!--1 fila-->
        <div class="row p-0 m-0">
            <!--columna 1 / Listar datos-->
            <div class="col-md-12">
                
                <div class="card card-info card-outline shadow">
                    
                <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-list"></i>&nbsp&nbspLista Flotas</h3>

                        <!-- Inicio modal registrar datos-->
                        <div class="modal fade" id="form_modal_registro" tabindex="-1"
                            aria-labelledby="exampleModalLabel">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <!--header-->
                                    <div class="modal-header bg-primary text-white">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Registro Flota
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <!--final modal header-->

                                    <!--formulario-->
                                    <form action="flota.php" method="post">
                                        <!--modal body-->
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Tipo flota</label>
                                                        <select class="form-select mb-3" style="width: 200px;"
                                                            name="_tipoflota" required>
                                                            <option selected disabled>Seleccione un tipo</option>
                                                            <?php
                                                        /*Consultamos a la base de datos*/
                                                            $sql = "SELECT * FROM tipo_flota";  
                                                        /*Creamos una variable para ejecutar la consulta*/
                                                            $ejecutar = $conex->query($sql); 
                                                        /*Recorremos el resultado de la consulta*/
                                                            while ($fila = mysqli_fetch_array($ejecutar)) {
                                                                echo "<option value='".$fila['idtipo_flota']."'>".$fila['nomtipo_flota']."</option>";
                                                            }    
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-8">
                                                    <div class="mb-3">
                                                        <label for="nombre" class="form-label">Descripción</label>
                                                        <input type="text" name="_descripcion" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Marca</label>
                                                        <input type="text" class="form-control" name="_marca" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Modelo</label>
                                                        <input type="text" class="form-control" name="_modelo" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Serie</label>
                                                        <input type="text" class="form-control" name="_serie" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label for="nombre" class="form-label">Placa</label>
                                                        <input type="text" name="_placa" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Sede</label>
                                                        <select class="form-select mb-3" style="width: 200px;"
                                                            name="_sede" required>
                                                            <option selected disabled>Seleccione una sede</option>
                                                            <?php
                                                        /*Consultamos a la base de datos*/
                                                            $sql = "SELECT * FROM sede";  
                                                        /*Creamos una variable para ejecutar la consulta*/
                                                            $ejecutar = $conex->query($sql); 
                                                        /*Recorremos el resultado de la consulta*/
                                                            while ($fila = mysqli_fetch_array($ejecutar)) {
                                                                echo "<option value='".$fila['idsede']."'>".$fila['nombre_sede']."</option>";
                                                            }    
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Estado</label>
                                                        <select class="form-select mb-3" style="width: 200px;"
                                                            name="_estado" required>
                                                            <option selected disabled>Seleccione un estado</option>
                                                            <?php
                                                        /*Consultamos a la base de datos*/
                                                            $sql = "SELECT * FROM estado";  
                                                        /*Creamos una variable para ejecutar la consulta*/
                                                            $ejecutar = $conex->query($sql); 
                                                        /*Recorremos el resultado de la consulta*/
                                                            while ($fila = mysqli_fetch_array($ejecutar)) {
                                                                echo "<option value='".$fila['idestado']."'>".$fila['nombre_estado']."</option>";
                                                            }    
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--final modal body-->
                                        <!--modal footer-->
                                        <div class="modal-footer">
                                            <div class="social-links mt-3">
                                                <!--boton actuañlizar-->
                                                <button type="submit" title="Guadar" class="btn btn-primary"
                                                    style="border:none; background-color:none;" name="btn_registrar">
                                                    <i class="fas fa-floppy-disk fs-5"></i></button>
                                                <!--boton eliminar-->
                                                <button type="submit" title="Eliminar" class="btn btn-danger"
                                                    style="border:none; background-color:none;" name="btn_eliminar"><i
                                                        class="fa-solid fa-trash-can fs-5"></i></button>
                                            </div>
                                        </div>
                                        <!--final modal footer-->
                                    </form>
                                    <!--final formulario-->
                                </div>
                            </div>
                        </div>
                        <!--final modal registrar datos -->
                    </div>

                    <div class="card-body">
                        <table id="listatipoflota" class="table table-hover table-sm table-striped shadow rounded">
                            <thead class="bg-info text left">
                                <th>N°</th>
                                <th>T.Flota</th>
                                <th>Descripción</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Serie Chasis</th>
                                <th>Placa</th>
                                <th>Sede</th>
                                <th>Estado</th>
                                <th>F. Registro</th>
                                <th class="text-center">Acciones</th>
                            </thead>
                            <tbody class="small text left">
                                <?php
                                /*Consultamos a la base de datos*/
                                $sql = "SELECT * FROM  flota
                                        INNER JOIN tipo_flota ON flota.id_tipoflota = tipo_flota.idtipo_flota 
                                        INNER JOIN sede ON flota.id_sede = sede.idsede
                                        INNER JOIN estado ON flota.id_estado = estado.idestado
                                        ";  
                                /*Creamos una variable para ejecutar la consulta*/
                                $ejecutar = $conex->query($sql); 
                                
                                /*Recorremos el resultado de la consulta*/
                                while ($fila = mysqli_fetch_array($ejecutar)) {
                            ?>
                                <!--mostramos los datos-->
                                <tr>
                                    <td> <?php echo $fila['id_flota'];?> </td>
                                    <td> <?php echo $fila['nomtipo_flota'];?> </td>
                                    <td> <?php echo $fila['nombre_flota'];?> </td>
                                    <td> <?php echo $fila['marca_flota'];?> </td>
                                    <td> <?php echo $fila['modelo_flota'];?> </td>
                                    <td> <?php echo $fila['serie_flota'];?> </td>
                                    <td> <?php echo $fila['placa_flota'];?> </td>
                                    <td> <?php echo $fila['nombre_sede'];?> </td>
                                    <td> <?php echo $fila['nombre_estado'];?> </td>
                                    <td> <?php echo $fila['fechareg_flota'];?> </td>

                                    <!--botones Nuevo y Editar -->
                                    <td style="text-align: center">
                                        <div class="social-links">
                                            <a href="#" title="Nuevo" data-bs-toggle="modal"
                                                data-bs-target="#form_modal_registro">
                                                <i class="fa-sharp fa-solid fa-circle-plus fa-lg"></i>
                                            </a>
                                            <a href="#" title="editar" data-bs-toggle="modal"
                                                data-bs-target="#edit_flota<?php echo $fila['id_flota'];?>">
                                                <i class="fas fa-pencil-alt fs-5"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!--Form modal para edtitar datos-->
                                <div class="modal fade" id="edit_flota<?php echo $fila['id_flota'];?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <!--modal cabecera-->
                                            <div class="modal-header bg-primary text-white">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel"
                                                    style="font-weight:bold;">Editar registro de flota</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <!--final modal cabecera-->
                                            <form action="flota.php" method="post">
                                                <!--modal body-->
                                                <div class="modal-body">

                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="mb-3">
                                                                <input type="hidden" name="_id" value="<?php echo $fila['id_flota']; ?>">
                                                                <label class="form-label">Tipo flota</label>
                                                                <select class="form-select mb-3" style="width: 200px;"
                                                                    name="_tipoflota" required>
                                                                    <option selected disabled>Seleccione tipo flota
                                                                    </option>
                                                                    <?php

                                                                            echo "<option selected value='".$fila['idtipo_flota']."'>".$fila['nomtipo_flota']."</option>";
                                                                        
                                                                            /*Consultamos a la base de datos la tabla estado*/
                                                                                $sql1 = "SELECT * FROM tipo_flota";  
                                                                            /*Creamos una variable para ejecutar la consulta*/
                                                                                $ejecutar1 = $conex->query($sql1); 
                                                                            /*Recorremos el resultado de la consulta*/
                                                                                while ($fila1 = mysqli_fetch_array($ejecutar1)) {
                                                                                    echo "<option value='".$fila1['idtipo_flota']."'>".$fila1['nomtipo_flota']."</option>";
                                                                                }    
                                                                        ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-8">
                                                            <div class="mb-3">
                                                                <label for="nombre"
                                                                    class="form-label">Descripción</label>
                                                                <input type="text" name="_descripcionflota"
                                                                    class="form-control"
                                                                    value="<?php echo $fila['nombre_flota'];?>"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Marca</label>
                                                                <input type="text" class="form-control" name="_marcaflota"
                                                                    value="<?php echo $fila['marca_flota'];?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Modelo</label>
                                                                <input type="text" class="form-control" name="_modeloflota"
                                                                    value="<?php echo $fila['modelo_flota'];?>"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Serie</label>
                                                                <input type="text" class="form-control" name="_serieflota"
                                                                    value="<?php echo $fila['serie_flota'];?>" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Placa</label>
                                                                <input type="text" class="form-control" name="_placaflota"
                                                                    value="<?php echo $fila['placa_flota'];?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Sede</label>
                                                                <select class="form-select mb-3" style="width: 200px;"
                                                                    name="_sede" required>
                                                                    <option selected disabled>Seleccione una sede
                                                                    </option>
                                                                    <?php

                                                                            echo "<option selected value='".$fila['idsede']."'>".$fila['nombre_sede']."</option>";
                                                                        
                                                                            /*Consultamos a la base de datos la tabla estado*/
                                                                                $sql1 = "SELECT * FROM sede";  
                                                                            /*Creamos una variable para ejecutar la consulta*/
                                                                                $ejecutar1 = $conex->query($sql1); 
                                                                            /*Recorremos el resultado de la consulta*/
                                                                                while ($fila1 = mysqli_fetch_array($ejecutar1)) {
                                                                                    echo "<option value='".$fila1['idsede']."'>".$fila1['nombre_sede']."</option>";
                                                                                }    
                                                                        ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Estado </label>
                                                                <select class="form-select mb-3" style="width: 200px;"
                                                                    name="_estado" required>
                                                                    <option selected disabled>Seleccione tipo flota</option>
                                                                    <?php

                                                                            echo "<option selected value='".$fila['idestado']."'>".$fila['nombre_estado']."</option>";
                                                                        
                                                                            /*Consultamos a la base de datos la tabla estado*/
                                                                                $sql1 = "SELECT * FROM estado";  
                                                                            /*Creamos una variable para ejecutar la consulta*/
                                                                                $ejecutar1 = $conex->query($sql1); 
                                                                            /*Recorremos el resultado de la consulta*/
                                                                                while ($fila1 = mysqli_fetch_array($ejecutar1)) {
                                                                                    echo "<option value='".$fila1['idestado']."'>".$fila1['nombre_estado']."</option>";
                                                                                }    
                                                                        ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--final modal body-->

                                                <!--modal footer-->
                                                <div class="modal-footer">
                                                    <div class="social-links mt-3">
                                                        <!--boton actuañlizar-->
                                                        <button type="submit" title="Guadar" class="btn btn-primary"
                                                            style="border:none; background-color:none;"
                                                            name="btn_editar">
                                                            <i class="fas fa-floppy-disk fs-5"></i></button>
                                                        <!--boton eliminar-->
                                                        <button type="submit" title="Eliminar" class="btn btn-danger"
                                                            style="border:none; background-color:none;"
                                                            name="btn_eliminar"><i
                                                                class="fa-solid fa-trash-can fs-5"></i></button>
                                                    </div>
                                                </div>
                                            </form>

                                            <!--final modal footer-->
                                        </div>
                                    </div>
                                </div>


                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!--aqui-->
        </div>
    </div>
</section>

<script>
$(document).ready(function() {

    var tableEstados = $('#listatipoflota').DataTable({

    });



});
</script>

<!--footer-->
<?php 
  include_once "./vistas/modulos/footer.php";
?>
<!--final footer-->