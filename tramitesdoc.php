<?php
    require_once("./modelos/conexion.php");
    include_once "./vistas/modulos/header.php";
 
    //Registrar datos
 if (isset($_REQUEST['btn_registrar'])) {
    //creamos variables para recuperar los datos 
    $_serie = $_POST['_serie'];
    $_tipodoc = $_POST['_tipodoc'];
    $_proveedor = $_POST['_prov'];
    $_fecharegdoc = $_POST['_fecha'];
    $_precio = $_POST['_precio'];
    

    //ejecutamos nuestra consulta
    $sql = "SELECT id_docflota, id_flota, id_tipodoc, id_proveedor, fechareg_docflota, precio FROM doc_flota where fechareg_docflota = '$_fecharegdoc'";
    $ejecutar = $conex->query($sql);
    $filas = $ejecutar->num_rows;


    if ($filas > 0) {
        echo"
            <script>
                alert('El dato ya se encuentra registrado..!');
            </script>
        ";
    } else {

        /*almacenamos nuestra consulta en una variable*/
        $sql = "INSERT INTO doc_flota (id_flota, id_tipodoc, id_proveedor, fechareg_docflota, precio) 
        VALUES ('$_serie','$_tipodoc','$_proveedor','$_fecharegdoc','$_precio')"; 
    
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
    $_descripcionflota = $_POST['_descripcionflota'];
    $_tipo = $_POST['_tipodoc'];
    $_proveedor = $_POST['_proveedor'];
    $_fecha = $_POST['_fecha'];
    $_precio = $_POST['_precio'];
 
    $sql = "UPDATE doc_flota SET id_flota = '$_descripcionflota', id_tipodoc = '$_tipo',id_proveedor = '$_proveedor',
    fechareg_docflota ='$_fecha', precio = '$_precio' where id_docflota = '$_id'";

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

    $sql = "DELETE from doc_flota where id_docflota = '$id'";
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
                    <h1 class="m-0">Flota / Trámite - Documentación</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Flota / Trámite - Documentación</li>
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
                        <h3 class="card-title"><i class="fas fa-list"></i>&nbsp&nbspTrámite - Documentación</h3>

                        <!-- Inicio modal registrar datos-->
                        <div class="modal fade" id="form_modal_registro" tabindex="-1"
                            aria-labelledby="exampleModalLabel">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <!--header-->
                                    <div class="modal-header bg-primary text-white">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Registro trámite
                                            - documentación
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <!--final modal header-->

                                    <!--formulario-->
                                    <form action="tramitesdoc.php" method="post">
                                        <!--modal body-->
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Serie Chasis</label>
                                                        <select class="form-select mb-3" style="width: 200px;"
                                                            name="_serie" required>
                                                            <option selected disabled>Seleccione una serie</option>
                                                            <?php
                                                        /*Consultamos a la base de datos*/
                                                            $sql = "SELECT * FROM flota";  
                                                        /*Creamos una variable para ejecutar la consulta*/
                                                            $ejecutar = $conex->query($sql); 
                                                        /*Recorremos el resultado de la consulta*/
                                                            while ($fila = mysqli_fetch_array($ejecutar)) {
                                                                echo "<option value='".$fila['id_flota']."'>".$fila['serie_flota']."</option>";
                                                            }    
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Tipo Documentación</label>
                                                        <select class="form-select mb-3" style="width: 200px;"
                                                            name="_tipodoc" required>
                                                            <option selected disabled>Seleccione un tipo</option>
                                                            <?php
                                                        /*Consultamos a la base de datos*/
                                                            $sql = "SELECT * FROM tipo_doc";  
                                                        /*Creamos una variable para ejecutar la consulta*/
                                                            $ejecutar = $conex->query($sql); 
                                                        /*Recorremos el resultado de la consulta*/
                                                            while ($fila = mysqli_fetch_array($ejecutar)) {
                                                                echo "<option value='".$fila['idtipo_doc']."'>".$fila['tipo_doc']."</option>";
                                                            }    
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Proveedor</label>
                                                        <select class="form-select mb-3" style="width: 200px;"
                                                            name="_prov" required>
                                                            <option selected disabled>Seleccione un proveedor</option>
                                                            <?php
                                                        /*Consultamos a la base de datos*/
                                                            $sql = "SELECT * FROM proveedor";  
                                                        /*Creamos una variable para ejecutar la consulta*/
                                                            $ejecutar = $conex->query($sql); 
                                                        /*Recorremos el resultado de la consulta*/
                                                            while ($fila = mysqli_fetch_array($ejecutar)) {
                                                                echo "<option value='".$fila['id_prov']."'>".$fila['nombre_prov']."</option>";
                                                            }    
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Precio</label>
                                                        <input type="text" class="form-control" name="_precio" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Selecciones Fecha y hora </label>
                                                        <input class="form-control" type="datetime-local"
                                                            placeholder="Seleccione una fecha" name="_fecha">
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
                        <table id="listatramitedoc" class="table table-hover table-sm table-striped shadow rounded">
                            <thead class="bg-info text left">
                                <th>N°</th>
                                <th>Descripción</th>
                                <th>Placa</th>
                                <th>Tipo Doc.</th>
                                <th>Proveedor</th>
                                <th>Precio S/.</th>
                                <th>F.Realizado</th>
                                <th>Sede</th>
                                <th class="text-center">Acciones</th>
                            </thead>
                            <tbody class="small text left">
                                <?php
                                /*Consultamos a la base de datos*/
                                $sql = "SELECT * FROM doc_flota
                                        LEFT JOIN flota ON doc_flota.id_flota = flota.id_flota
                                        LEFT JOIN tipo_doc ON doc_flota.id_tipodoc = tipo_doc.idtipo_doc
                                        LEFT JOIN proveedor ON doc_flota.id_proveedor=proveedor.id_prov
                                        LEFT JOIN sede ON flota.id_sede = sede.idsede";                         
                                
                                /*Creamos una variable para ejecutar la consulta*/
                                $ejecutar = $conex->query($sql); 
                                
                                /*Recorremos el resultado de la consulta*/
                                while ($fila = mysqli_fetch_array($ejecutar)) {
                            ?>
                                <!--mostramos los datos-->
                                <tr>
                                    <td> <?php echo $fila['id_docflota'];?> </td>
                                    <td> <?php echo $fila['nombre_flota'];?> </td>
                                    <td> <?php echo $fila['placa_flota'];?> </td>
                                    <td> <?php echo $fila['tipo_doc'];?> </td>
                                    <td> <?php echo $fila['nombre_prov'];?> </td>
                                    <td> <?php echo $fila['precio'];?> </td>
                                    <td> <?php echo $fila['fechareg_docflota'];?> </td>
                                    <td> <?php echo $fila['nombre_sede'];?> </td>
                                    <!--botones Nuevo y Editar -->
                                    <td style="text-align: center">
                                        <div class="social-links">
                                            <a href="#" title="Nuevo" data-bs-toggle="modal"
                                                data-bs-target="#form_modal_registro">
                                                <i class="fa-sharp fa-solid fa-circle-plus fa-lg"></i>
                                            </a>
                                            <a href="#" title="editar" data-bs-toggle="modal"
                                                data-bs-target="#edit_tramites<?php echo $fila['id_docflota'];?>">
                                                <i class="fas fa-pencil-alt fs-5"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!--Form modal para edtitar datos-->
                                <div class="modal fade" id="edit_tramites<?php echo $fila['id_docflota'];?>"
                                    tabindex="-1" aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <!--modal cabecera-->
                                            <div class="modal-header bg-primary text-white">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel"
                                                    style="font-weight:bold;">Editar trámite - documentación</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <!--final modal cabecera-->

                                            <form action="tramitesdoc.php" method="post">
                                                <!--modal body-->
                                                <div class="modal-body">

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="mb-3">
                                                                <input type="text" name="_id" value="<?php echo $fila['id_docflota']; ?>">
                                                                <label class="form-label">Descripción</label>
                                                                <select class="form-select mb-3" style="width: 250px;" name="_descripcionflota" required>
                                                                    <option selected disabled>Seleccione un registro</option>
                                                                    <?php

                                                                        echo "<option selected value='".$fila['id_flota']."'>".$fila['nombre_flota']."</option>";
                                                                        
                                                                        /*Consultamos a la base de datos la tabla estado*/
                                                                            $sql1 = "SELECT * FROM flota";  
                                                                        /*Creamos una variable para ejecutar la consulta*/
                                                                            $ejecutar1 = $conex->query($sql1); 
                                                                        /*Recorremos el resultado de la consulta*/
                                                                            while ($fila1 = mysqli_fetch_array($ejecutar1)) {
                                                                                echo "<option value='".$fila1['id_flota']."'>".$fila1['nombre_flota']."</option>";
                                                                            }    
                                                                    ?>
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="mb-3">
                                                                <label for="nombre" class="form-label">Placa</label>
                                                                <input type="text" name="_placa" class="form-control" value="<?php echo $fila['placa_flota'];?>" disabled>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Tipo Doc. </label>
                                                                <select class="form-select mb-3" style="width: 250px;" name="_tipodoc" required>
                                                                    <option selected disabled>Seleccione tipo documento</option>
                                                                    <?php

                                                                        echo "<option selected value='".$fila['idtipo_doc']."'>".$fila['tipo_doc']."</option>";
                                                                        
                                                                        /*Consultamos a la base de datos la tabla estado*/
                                                                            $sql1 = "SELECT * FROM tipo_doc";  
                                                                        /*Creamos una variable para ejecutar la consulta*/
                                                                            $ejecutar1 = $conex->query($sql1); 
                                                                        /*Recorremos el resultado de la consulta*/
                                                                            while ($fila1 = mysqli_fetch_array($ejecutar1)) {
                                                                                echo "<option value='".$fila1['idtipo_doc']."'>".$fila1['tipo_doc']."</option>";
                                                                            }    
                                                                    ?>
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Proveedor</label>
                                                                <select class="form-select mb-3" style="width: 250px;" name="_proveedor" required>
                                                                    <option selected disabled>Seleccione un proveedor </option>
                                                                    <?php

                                                                        echo "<option selected value='".$fila['id_prov']."'>".$fila['nombre_prov']."</option>";
                                                                        
                                                                        /*Consultamos a la base de datos la tabla estado*/
                                                                            $sql1 = "SELECT * FROM proveedor";  
                                                                        /*Creamos una variable para ejecutar la consulta*/
                                                                            $ejecutar1 = $conex->query($sql1); 
                                                                        /*Recorremos el resultado de la consulta*/
                                                                            while ($fila1 = mysqli_fetch_array($ejecutar1)) {
                                                                                echo "<option value='".$fila1['id_prov']."'>".$fila1['nombre_prov']."</option>";
                                                                            }    
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Selecciones Fecha y hora 
                                                                </label>
                                                                <input class="form-control" type="datetime-local"
                                                                    placeholder="Seleccione una fecha" name="_fecha"
                                                                    value="<?php echo $fila['fechareg_docflota']; ?>"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Precio S/.</label>
                                                                <input type="text" class="form-control" name="_precio"
                                                                    value="<?php echo $fila['precio'];?>" required>
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Sede</label>
                                                                <select class="form-select mb-3" style="width: 200px;"
                                                                    name="_sede" disabled>
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

    var tableEstados = $('#listatramitedoc').DataTable({

    });


    config = {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    }

    flatpickr("input[type=datetime-local]", config);



});
</script>

<!--footer-->
<?php 
  include_once "./vistas/modulos/footer.php";
?>
<!--final footer-->