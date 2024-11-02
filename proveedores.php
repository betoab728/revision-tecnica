<?php
    require_once("./modelos/conexion.php");
    include_once "./vistas/modulos/header.php";
 
    //Registrar datos
 if (isset($_REQUEST['btn_registrar'])) {
    //creamos variables para recuperar los datos 
    $name_prov = $_POST['_nomprov'];  //nombre del input text

    //ejecutamos nuestra consulta }
    $sql = "SELECT id_prov, nombre_prov FROM proveedor where nombre_prov = '$name_prov'";
    $ejecutar = $conex->query($sql);
    $filas = $ejecutar->num_rows;


    if ($filas > 0) {
        echo"
            <script>
                alert('El proveedor ya se encuentra registrado..!');
            </script>
        ";
    } else {

        /*almacenamos nuestra consulta en una variable*/
        $sql = "INSERT INTO proveedor (nombre_prov) VALUES ('$name_prov')"; 
    
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
    $id = $_POST['idtprov'];
    $nom_prov = $_POST['nom_prov'];
    
    $sql = "UPDATE proveedor SET nombre_prov = '$nom_prov' where id_prov = '$id'";

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
    $id = $_POST['idtprov'];

    $sql = "DELETE from proveedor where id_prov = '$id'";
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
                    <h1 class="m-0">Mantenimiento / Proveedores</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Mantenimiento / Proveedores</li>
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
                        <h3 class="card-title"><i class="fas fa-list"></i>&nbspListado de proveedores</h3>
                    </div>
                    <div class="card-body">
                        <table id="listaproveedores" class="table table-hover table-sm table-striped shadow rounded">
                            <thead class="bg-info text left">
                                <th>N°</th>
                                <th>Descripción</th>
                                <th>Fecha Registro</th>
                                <th class="text-center">Acciones</th>
                            </thead>
                            <tbody class="small text left">
                                <?php
                                /*Consultamos a la base de datos*/
                                $sql = "SELECT * FROM proveedor";  

                                /*Creamos una variable para ejecutar la consulta*/
                                $ejecutar = $conex->query($sql); 
                                
                                /*Recorremos el resultado de la consulta*/
                                while ($fila = mysqli_fetch_array($ejecutar)) {
                            ?>
                                <!--mostramos los datos-->
                                <tr>
                                    <td> <?php echo $fila['id_prov'];?> </td>
                                    <td> <?php echo $fila['nombre_prov'];?> </td>
                                    <td> <?php echo $fila['fechareg_prov'];?> </td>

                                    <!--botones Editar + Eliminar -->
                                    <td style="text-align: center">
                                        <div class="social-links">
                                            <a href="#" title="editar" data-bs-toggle="modal"
                                                data-bs-target="#edit_proveedor<?php echo $fila['id_prov'];?>"><i
                                                    class="fas fa-pencil-alt fs-5"></i>
                                            </a>
                                            <a href="#" title="Nuevo" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="fa-sharp fa-solid fa-circle-plus fa-lg"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!--Form modal para edtitar datos-->
                                <div class="modal fade" id="edit_proveedor<?php echo $fila['id_prov'];?>"
                                    tabindex="-1" aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!--modal cabecera-->
                                            <div class="modal-header bg-primary text-white">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-weight:bold;">Editar registro</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <!--final modal cabecera-->

                                            <form action="proveedores.php" method="post">
                                                <!--modal body-->
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">N°:</label>
                                                        <input type="text" readonly class="form-control" style="width: 80px;"
                                                            name="idtprov" value="<?php echo $fila['id_prov'];?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Proveedor:</label>
                                                        <input type="text" class="form-control" name="nom_prov"
                                                            value="<?php echo $fila['nombre_prov'];?>">
                                                    </div>
                                                </div>
                                                <!--final modal body-->

                                                <!--modal footer-->
                                                <div class="modal-footer">
                                                    <div class="social-links mt-3">
                                                        <!--boton actuañlizar-->
                                                        <button type="submit" title="Guadar" class="btn btn-primary"
                                                            style="border:none; background-color:none;" name="btn_editar">
                                                            <i class="fas fa-floppy-disk fs-5"></i></button>
                                                        <!--boton eliminar-->
                                                       <button type="submit" title="Eliminar" class="btn btn-danger"
                                                            style="border:none; background-color:none;" name="btn_eliminar"><i
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
                        <h3 class="card-title"><i class="fas fa-edit"></i>&nbspRegistro Proveedores</h3>
                    </div>
                    <div class="card-body">
                        <form id="form_registrarprov" action="proveedores.php" method="post" class="needs-validation">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" id="id" name="_id">
                                    <div class="form-group mb-2">
                                        <!-- titulo -->
                                        <label class="col-form-label" for="ipProv">
                                            <i class="fas fa-dumpster fs-6"></i>
                                            <span class="small"><strong>Proveedor</strong></span>
                                            <span class="text-danger">*</span>
                                        </label>
                                        <!-- Caja de texto -->
                                        <input type="text" class="form-control form-control-sm" name="_nomprov"
                                            placeholder="Ingrese el proveedor" id="proveedor" required>
                                        <div class="invalid-feedback">Debe ingresar proveedor</div>

                                    </div>
                                </div>
                                <!-- boton registrar-->
                                <div class="col-md-12">
                                    <div class="form-group m-0 mt-2">
                                        <button type="submit" class="btn btn-primary btn-sm w-100"
                                            title="Registar Proveedor" name="btn_registrar">
                                            <i class="fas fa-file-circle-plus fs-6"></i><strong>&nbsp&nbspRegistrar
                                                Proveedor</strong>
                                        </button>
                                    </div>
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

    var tableEstados = $('#listaproveedores').DataTable({

    });



});
</script>

<!--footer-->
<?php 
  include_once "./vistas/modulos/footer.php";
?>
<!--final footer-->