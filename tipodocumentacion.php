<?php
    require_once("./modelos/conexion.php");
    include_once "./vistas/modulos/header.php";
 
    //Registrar datos
 if (isset($_REQUEST['btn_registrar'])) {
    //creamos variables para recuperar los datos 
    $_tipodoc = $_POST['_tipodoc'];
    $_nombredoc = $_POST['_nomdoc'];

    //ejecutamos nuestra consulta a la tabla tipo_flota
    $sql = "SELECT idtipo_doc, tipo_doc, nombre_doc FROM tipo_doc where tipo_doc = '$_tipodoc'";
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
        $sql = "INSERT INTO tipo_doc (tipo_doc,nombre_doc) VALUES ('$_tipodoc','$_nombredoc')"; 
    
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
    $id = $_POST['_idtipodoc'];
    $tipodoc = $_POST['_tipodoc'];
    $descripcion = $_POST['_nomtipodoc'];
    
    $sql = "UPDATE tipo_doc SET tipo_doc ='$tipodoc', nombre_doc = '$descripcion' where idtipo_doc = '$id'";

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
    $id = $_POST['_idtipodoc'];

    $sql = "DELETE from tipo_doc where idtipo_doc = '$id'";
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
                    <h1 class="m-0">Mantenimiento / Tipo Documentación</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Mantenimiento / Tipo Documentación</li>
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
            <div class="col-md-8">
                <div class="card card-info card-outline shadow">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-list"></i>&nbsp&nbspLista tipo de documentación</h3>
                    </div>
                    <div class="card-body">
                        <table id="listatipodoc" class="table table-hover table-sm table-striped shadow rounded">
                            <thead class="bg-info text left">
                                <th>N°</th>
                                <th>Tipo Doc.</th>
                                <th>Descripción</th>
                                <th>F. Registro</th>
                                <th class="text-center">Acciones</th>
                            </thead>
                            <tbody class="small text left">
                                <?php
                                /*Consultamos a la base de datos*/
                                 $sql = "SELECT * FROM  tipo_doc";   

                                /*Creamos una variable para ejecutar la consulta*/
                                $ejecutar = $conex->query($sql); 
                                
                                /*Recorremos el resultado de la consulta*/
                                while ($fila = mysqli_fetch_array($ejecutar)) {
                            ?>
                                <!--mostramos los datos-->
                                <tr>
                                    <td> <?php echo $fila['idtipo_doc'];?> </td>
                                    <td> <?php echo $fila['tipo_doc'];?> </td>
                                    <td> <?php echo $fila['nombre_doc'];?> </td>
                                    <td> <?php echo $fila['fechareg_tipodoc'];?> </td>

                                    <!--botones Editar + Eliminar -->
                                    <td style="text-align: center">
                                        <div class="social-links">
                                            <a href="#" title="editar" data-bs-toggle="modal"
                                                data-bs-target="#edit_tipoestado<?php echo $fila['idtipo_doc'];?>"><i
                                                    class="fas fa-pencil-alt fs-5"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!--Form modal para edtitar datos-->
                                <div class="modal fade" id="edit_tipoestado<?php echo $fila['idtipo_doc'];?>"
                                    tabindex="-1" aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!--modal cabecera-->
                                            <div class="modal-header bg-primary text-white">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel"
                                                    style="font-weight:bold;">Editar registro</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <!--final modal cabecera-->

                                            <form action="tipodocumentacion.php" method="post">
                                                <!--modal body-->
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">N°</label>
                                                        <input type="text" readonly class="form-control"
                                                            name="_idtipodoc" style="width: 80px;"
                                                            value="<?php echo  $fila['idtipo_doc']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Tipo Doc.</label>
                                                        <input type="text" class="form-control" name="_tipodoc"
                                                            value="<?php echo $fila['tipo_doc'];?>">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Descripción:</label>
                                                        <input type="text" class="form-control" name="_nomtipodoc"
                                                            value="<?php echo $fila['nombre_doc'];?>">
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

            <!--columna2 / Registro de Datos-->
            <div class="col-md-4">
                <div class="card card-info card-outline shadow">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-edit"></i>&nbspRegistro tipo Doc.</h3>
                    </div>
                    <div class="card-body">
                        <form id="form_editarestado" action="tipodocumentacion.php" method="post"
                            class="needs-validation">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" id="id" name="id">

                                    <div class="form-group mb-2">
                                        <!-- titulo Estado-->
                                        <label class="col-form-label">
                                            <i class="fas fa-dumpster fs-6"></i>
                                            <span class="small"><strong>Tipo</strong></span>
                                            <span class="text-danger">*</span>
                                        </label>
                                        <!-- Caja de texto -->
                                        <input type="text" class="form-control form-control-sm" name="_tipodoc"
                                            placeholder="Ingrese abreviatura del tipo de doc." id="estado" required>
                                        <div class="invalid-feedback">Ingresar tipo documentación en Abreviatura</div>
                                    </div>

                                    <div class="form-group mb-2">
                                        <!-- titulo Estado-->
                                        <label class="col-form-label">
                                            <i class="fas fa-dumpster fs-6"></i>
                                            <span class="small"><strong>Descripción</strong></span>
                                            <span class="text-danger">*</span>
                                        </label>
                                        <!-- Caja de texto -->
                                        <input type="text" class="form-control form-control-sm" name="_nomdoc"
                                            placeholder="Ingrese descripción" id="estado" required>
                                        <div class="invalid-feedback">Ingresar Descripción</div>
                                    </div>
                                </div>
                                <!-- boton registrar-->
                                <div class="col-md-12">
                                    <div class="form-group m-0 mt-2">
                                        <button type="submit" class="btn btn-primary btn-sm w-100"
                                            title="Registar Estado" name="btn_registrar">
                                            <i class="fas fa-file-circle-plus fs-6"></i><strong>&nbsp&nbspRegistrar
                                            </strong>
                                        </button>
                                    </div>
                                    </ div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
$(document).ready(function() {

    var tableEstados = $('#listatipodoc').DataTable({

    });



});
</script>

<!--footer-->
<?php 
  include_once "./vistas/modulos/footer.php";
?>
<!--final footer-->