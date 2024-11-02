<?php include_once "./vistas/modulos/header.php"; 
    require_once("./modelos/conexion.php");
?>

<!-- Contenido de la página -->
<section class="content-wrapper">
    <!-- cabecera del contenido-->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tablero principal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                        <li class="breadcrumb-item active">Tablero principal</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- fin cabecera del contenido -->

    <!-- Contenido principal -->
    <section class="content">
        <div class="container-fluid">
            <!-- Cajas pequeñas (Cuadros de estadísticas) -->

            <div class="row">
                <!-- Mercancias d6p-->
                <div class="col-lg-3 col-6">
                    <?php
                        /*Consultamos a la base de datos*/
                        $sql = "SELECT tipo_doc.tipo_doc,flota.placa_flota, MAX(doc_flota.fechareg_docflota) AS Ultima_fecha, DATE_ADD(fechareg_docflota, INTERVAL 1 YEAR) AS Proxima_Fecha FROM doc_flota
                        INNER JOIN flota ON doc_flota.id_flota = flota.id_flota 
                        INNER JOIN tipo_doc ON doc_flota.id_tipodoc = tipo_doc.idtipo_doc
                        WHERE flota.placa_flota='D6P-738' AND tipo_doc.tipo_doc='CITV-MERCANCÍAS'";                             
                                
                        /*Creamos una variable para ejecutar la consulta*/
                            $ejecutar = $conex->query($sql); 
                                
                        /*Recorremos el resultado de la consulta*/
                            while ($fila = mysqli_fetch_array($ejecutar)) {
                    ?>
                    <div class="small-box bg-info">
                        <div class="inner">
                            <p>Camión Placa D6P-738</p>
                            <strong>F.Realizado:</strong>&nbsp;&nbsp;<strong><?php echo $fila['Ultima_fecha'];?></strong>
                            <strong>F.Próximo:</strong>&nbsp;&nbsp;&nbsp;<strong><?php echo $fila['Proxima_Fecha'];?></strong>
                        </div>
                        <div class="icon">
                            <i class="fa fa-bus"></i>
                        </div>
                            <a href="tramitesdoc.php" class="small-box-footer">CITV-Mercancías &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    <?php } ?>
                </div>
                <!-- Mercancias dbjd-->                
                <div class="col-lg-3 col-6">
                    <?php
                        /*Consultamos a la base de datos*/
                        $sql = "SELECT tipo_doc.tipo_doc,flota.placa_flota, MAX(doc_flota.fechareg_docflota) AS Ultima_fecha, DATE_ADD(fechareg_docflota, INTERVAL 1 YEAR) AS Proxima_Fecha FROM doc_flota
                        INNER JOIN flota ON doc_flota.id_flota = flota.id_flota 
                        INNER JOIN tipo_doc ON doc_flota.id_tipodoc = tipo_doc.idtipo_doc
                        WHERE flota.placa_flota='BJD-917' AND tipo_doc.tipo_doc='CITV-MERCANCÍAS'";                            
                                
                        /*Creamos una variable para ejecutar la consulta*/
                            $ejecutar = $conex->query($sql); 
                                
                        /*Recorremos el resultado de la consulta*/
                            while ($fila = mysqli_fetch_array($ejecutar)) {
                    ?>
                    <div class="small-box bg-info">
                        <div class="inner">
                            <p>Camión Placa BJD-917</p>
                            <strong>F.Realizado:</strong>&nbsp;&nbsp;<strong><?php echo $fila['Ultima_fecha'];?></strong>
                            <strong>F.Próximo:</strong>&nbsp;&nbsp;&nbsp;<strong><?php echo $fila['Proxima_Fecha'];?></strong>
                        </div>
                        <div class="icon">
                            <i class="fa fa-bus"></i>
                        </div>
                            <a href="tramitesdoc.php" class="small-box-footer">CITV-Mercancías&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    <?php } ?>
                </div>
                <!-- Mercancias P4M-->                
                <div class="col-lg-3 col-6">
                    <?php
                        /*Consultamos a la base de datos*/
                        $sql = "SELECT tipo_doc.tipo_doc,flota.placa_flota, MAX(doc_flota.fechareg_docflota) AS Ultima_fecha, DATE_ADD(fechareg_docflota, INTERVAL 1 YEAR) AS Proxima_Fecha FROM doc_flota
                        INNER JOIN flota ON doc_flota.id_flota = flota.id_flota 
                        INNER JOIN tipo_doc ON doc_flota.id_tipodoc = tipo_doc.idtipo_doc
                        WHERE flota.placa_flota='P4M-944' AND tipo_doc.tipo_doc='CITV-MERCANCÍAS'";                         
                                
                        /*Creamos una variable para ejecutar la consulta*/
                            $ejecutar = $conex->query($sql); 
                                
                        /*Recorremos el resultado de la consulta*/
                            while ($fila = mysqli_fetch_array($ejecutar)) {
                    ?>
                    <div class="small-box bg-info">
                        <div class="inner">
                            <p>Camión Placa P4M-944</p>
                            <strong>F.Realizado:</strong>&nbsp;&nbsp;<strong><?php echo $fila['Ultima_fecha'];?></strong>
                            <strong>F.Próximo:</strong>&nbsp;&nbsp;&nbsp;<strong><?php echo $fila['Proxima_Fecha'];?></strong>
                        </div>
                        <div class="icon">
                            <i class="fa fa-bus"></i>
                        </div>
                            <a href="tramitesdoc.php" class="small-box-footer">CITV-Mercancías&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    <?php } ?>
                </div>
                <!-- Mercancias BEA-->                
                <div class="col-lg-3 col-6">
                    <?php
                        /*Consultamos a la base de datos*/
                        $sql = "SELECT tipo_doc.tipo_doc,flota.placa_flota, MAX(doc_flota.fechareg_docflota) AS Ultima_fecha, DATE_ADD(fechareg_docflota, INTERVAL 1 YEAR) AS Proxima_Fecha FROM doc_flota
                        INNER JOIN flota ON doc_flota.id_flota = flota.id_flota 
                        INNER JOIN tipo_doc ON doc_flota.id_tipodoc = tipo_doc.idtipo_doc
                        WHERE flota.placa_flota='BEA-835' AND tipo_doc.tipo_doc='CITV-MERCANCÍAS'";                         
                                
                        /*Creamos una variable para ejecutar la consulta*/
                            $ejecutar = $conex->query($sql); 
                                
                        /*Recorremos el resultado de la consulta*/
                            while ($fila = mysqli_fetch_array($ejecutar)) {
                    ?>
                    <div class="small-box bg-info">
                        <div class="inner">
                            <p>Camión Placa BEA-835</p>
                            <strong>F.Realizado:</strong>&nbsp;&nbsp;<strong><?php echo $fila['Ultima_fecha'];?></strong>
                            <strong>F.Próximo:</strong>&nbsp;&nbsp;&nbsp;<strong><?php echo $fila['Proxima_Fecha'];?></strong>
                        </div>
                        <div class="icon">
                            <i class="fa fa-bus"></i>
                        </div>
                            <a href="tramitesdoc.php" class="small-box-footer">CITV-Mercancías&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
                                
            <div class="row">
                <!-- Residuos d6p-->
                <div class="col-lg-3 col-6">
                    <?php
                        /*Consultamos a la base de datos*/
                            $sql = "SELECT tipo_doc.tipo_doc,flota.placa_flota, MAX(doc_flota.fechareg_docflota) AS Ultima_fecha, DATE_ADD(fechareg_docflota, INTERVAL 6 MONTH) AS Proxima_Fecha FROM doc_flota
                                    INNER JOIN flota ON doc_flota.id_flota = flota.id_flota 
                                    INNER JOIN tipo_doc ON doc_flota.id_tipodoc = tipo_doc.idtipo_doc
                                    WHERE flota.placa_flota='D6P-738' AND tipo_doc.tipo_doc='CITV-RES. PELIGROSOS'";                          
                                
                        /*Creamos una variable para ejecutar la consulta*/
                            $ejecutar = $conex->query($sql); 
                                
                        /*Recorremos el resultado de la consulta*/
                            while ($fila = mysqli_fetch_array($ejecutar)) {
                    ?>
                    <div class="small-box bg-success">
                        <div class="inner">
                            <p>Camión Placa D6P-738</p>
                            <strong>F.Realizado:</strong>&nbsp;&nbsp;<strong><?php echo $fila['Ultima_fecha'];?></strong>
                            <strong>F.Próximo:</strong>&nbsp;&nbsp;&nbsp;<strong><?php echo $fila['Proxima_Fecha'];?></strong>
                        </div>
                        <div class="icon">
                            <i class="fa fa-bus"></i>
                        </div>
                            <a href="tramitesdoc.php" class="small-box-footer">CITV-RES. PELIGROSOS &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    <?php } ?>
                </div>
                <!-- Mercancias dbjd-->                
                <div class="col-lg-3 col-6">
                    <?php
                        /*Consultamos a la base de datos*/
                        $sql = "SELECT tipo_doc.tipo_doc,flota.placa_flota, MAX(doc_flota.fechareg_docflota) AS Ultima_fecha, DATE_ADD(fechareg_docflota, INTERVAL 6 MONTH) AS Proxima_Fecha FROM doc_flota
                        INNER JOIN flota ON doc_flota.id_flota = flota.id_flota 
                        INNER JOIN tipo_doc ON doc_flota.id_tipodoc = tipo_doc.idtipo_doc
                        WHERE flota.placa_flota='BJD-917' AND tipo_doc.tipo_doc='CITV-RES. PELIGROSOS'";                          
                                
                        /*Creamos una variable para ejecutar la consulta*/
                            $ejecutar = $conex->query($sql); 
                                
                        /*Recorremos el resultado de la consulta*/
                            while ($fila = mysqli_fetch_array($ejecutar)) {
                    ?>
                    <div class="small-box bg-success">
                        <div class="inner">
                            <p>Camión Placa BJD-917</p>
                            <strong>F.Realizado:</strong>&nbsp;&nbsp;<strong><?php echo $fila['Ultima_fecha'];?></strong>
                            <strong>F.Próximo:</strong>&nbsp;&nbsp;&nbsp;<strong><?php echo $fila['Proxima_Fecha'];?></strong>
                        </div>
                        <div class="icon">
                            <i class="fa fa-bus"></i>
                        </div>
                            <a href="tramitesdoc.php" class="small-box-footer">CITV-RES. PELIGROSOS&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    <?php } ?>
                </div>
                <!-- Mercancias P4M-->                
                <div class="col-lg-3 col-6">
                    <?php
                        /*Consultamos a la base de datos*/
                        $sql = "SELECT tipo_doc.tipo_doc,flota.placa_flota, MAX(doc_flota.fechareg_docflota) AS Ultima_fecha, DATE_ADD(fechareg_docflota, INTERVAL 6 MONTH) AS Proxima_Fecha FROM doc_flota
                        INNER JOIN flota ON doc_flota.id_flota = flota.id_flota 
                        INNER JOIN tipo_doc ON doc_flota.id_tipodoc = tipo_doc.idtipo_doc
                        WHERE flota.placa_flota='P4M-944' AND tipo_doc.tipo_doc='CITV-RES. PELIGROSOS'";                         
                                
                        /*Creamos una variable para ejecutar la consulta*/
                            $ejecutar = $conex->query($sql); 
                                
                        /*Recorremos el resultado de la consulta*/
                            while ($fila = mysqli_fetch_array($ejecutar)) {
                    ?>
                    <div class="small-box bg-success">
                        <div class="inner">
                            <p>Camión Placa P4M-944</p>
                            <strong>F.Realizado:</strong>&nbsp;&nbsp;<strong><?php echo $fila['Ultima_fecha'];?></strong>
                            <strong>F.Próximo:</strong>&nbsp;&nbsp;&nbsp;<strong><?php echo $fila['Proxima_Fecha'];?></strong>
                        </div>
                        <div class="icon">
                            <i class="fa fa-bus"></i>
                        </div>
                            <a href="tramitesdoc.php" class="small-box-footer">CITV-RES. PELIGROSOS&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    <?php } ?>
                </div>
                <!-- Mercancias BEA-->                
                <div class="col-lg-3 col-6">
                    <?php
                        /*Consultamos a la base de datos*/
                        $sql = "SELECT tipo_doc.tipo_doc,flota.placa_flota, MAX(doc_flota.fechareg_docflota) AS Ultima_fecha, DATE_ADD(fechareg_docflota, INTERVAL 6 MONTH) AS Proxima_Fecha FROM doc_flota
                        INNER JOIN flota ON doc_flota.id_flota = flota.id_flota 
                        INNER JOIN tipo_doc ON doc_flota.id_tipodoc = tipo_doc.idtipo_doc
                        WHERE flota.placa_flota='BEA-835' AND tipo_doc.tipo_doc='CITV-RES. PELIGROSOS'";                         
                                
                        /*Creamos una variable para ejecutar la consulta*/
                            $ejecutar = $conex->query($sql); 
                                
                        /*Recorremos el resultado de la consulta*/
                            while ($fila = mysqli_fetch_array($ejecutar)) {
                    ?>
                    <div class="small-box bg-success">
                        <div class="inner">
                            <p>Camión Placa BEA-835</p>
                            <strong>F.Realizado:</strong>&nbsp;&nbsp;<strong><?php echo $fila['Ultima_fecha'];?></strong>
                            <strong>F.Próximo:</strong>&nbsp;&nbsp;&nbsp;<strong><?php echo $fila['Proxima_Fecha'];?></strong>
                        </div>
                        <div class="icon">
                            <i class="fa fa-bus"></i>
                        </div>
                            <a href="tramitesdoc.php" class="small-box-footer">CITV-RES. PELIGROSOS&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
            
            <!--SOAT-->
            <div class="row">
                <!-- soat d6p-->
                <div class="col-lg-3 col-6">
                    <?php
                        /*Consultamos a la base de datos*/
                        $sql = "SELECT tipo_doc.tipo_doc,flota.placa_flota, MAX(doc_flota.fechareg_docflota) AS Ultima_fecha, DATE_ADD(fechareg_docflota, INTERVAL 1 YEAR) AS Proxima_Fecha FROM doc_flota
                        INNER JOIN flota ON doc_flota.id_flota = flota.id_flota 
                        INNER JOIN tipo_doc ON doc_flota.id_tipodoc = tipo_doc.idtipo_doc
                        WHERE flota.placa_flota='D6P-738' AND tipo_doc.tipo_doc='SOAT'";                           
                                
                        /*Creamos una variable para ejecutar la consulta*/
                            $ejecutar = $conex->query($sql); 
                                
                        /*Recorremos el resultado de la consulta*/
                            while ($fila = mysqli_fetch_array($ejecutar)) {
                    ?>
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <p>Camión Placa D6P-738</p>
                            <strong>F.Realizado:</strong>&nbsp;&nbsp;<strong><?php echo $fila['Ultima_fecha'];?></strong>
                            <strong>F.Próximo:</strong>&nbsp;&nbsp;&nbsp;<strong><?php echo $fila['Proxima_Fecha'];?></strong>
                        </div>
                        <div class="icon">
                            <i class="fa fa-bus"></i>
                        </div>
                            <a href="tramitesdoc.php" class="small-box-footer">SOAT &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    <?php } ?>
                </div>
                <!-- Mercancias dbjd-->                
                <div class="col-lg-3 col-6">
                    <?php
                        /*Consultamos a la base de datos*/
                        $sql = "SELECT tipo_doc.tipo_doc,flota.placa_flota, MAX(doc_flota.fechareg_docflota) AS Ultima_fecha, DATE_ADD(fechareg_docflota, INTERVAL 1 YEAR) AS Proxima_Fecha FROM doc_flota
                        INNER JOIN flota ON doc_flota.id_flota = flota.id_flota 
                        INNER JOIN tipo_doc ON doc_flota.id_tipodoc = tipo_doc.idtipo_doc
                        WHERE flota.placa_flota='BJD-917' AND tipo_doc.tipo_doc='SOAT'";                          
                                
                        /*Creamos una variable para ejecutar la consulta*/
                            $ejecutar = $conex->query($sql); 
                                
                        /*Recorremos el resultado de la consulta*/
                            while ($fila = mysqli_fetch_array($ejecutar)) {
                    ?>
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <p>Camión Placa BJD-917</p>
                            <strong>F.Realizado:</strong>&nbsp;&nbsp;<strong><?php echo $fila['Ultima_fecha'];?></strong>
                            <strong>F.Próximo:</strong>&nbsp;&nbsp;&nbsp;<strong><?php echo $fila['Proxima_Fecha'];?></strong>
                        </div>
                        <div class="icon">
                            <i class="fa fa-bus"></i>
                        </div>
                            <a href="tramitesdoc.php" class="small-box-footer">SOAT&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    <?php } ?>
                </div>
                <!-- Mercancias P4M-->                
                <div class="col-lg-3 col-6">
                    <?php
                        /*Consultamos a la base de datos*/
                        $sql = "SELECT tipo_doc.tipo_doc,flota.placa_flota, MAX(doc_flota.fechareg_docflota) AS Ultima_fecha, DATE_ADD(fechareg_docflota, INTERVAL 1 YEAR) AS Proxima_Fecha FROM doc_flota
                        INNER JOIN flota ON doc_flota.id_flota = flota.id_flota 
                        INNER JOIN tipo_doc ON doc_flota.id_tipodoc = tipo_doc.idtipo_doc
                        WHERE flota.placa_flota='P4M-944' AND tipo_doc.tipo_doc='SOAT'";                          
                                
                        /*Creamos una variable para ejecutar la consulta*/
                            $ejecutar = $conex->query($sql); 
                                
                        /*Recorremos el resultado de la consulta*/
                            while ($fila = mysqli_fetch_array($ejecutar)) {
                    ?>
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <p>Camión Placa P4M-944</p>
                            <strong>F.Realizado:</strong>&nbsp;&nbsp;<strong><?php echo $fila['Ultima_fecha'];?></strong>
                            <strong>F.Próximo:</strong>&nbsp;&nbsp;&nbsp;<strong><?php echo $fila['Proxima_Fecha'];?></strong>
                        </div>
                        <div class="icon">
                            <i class="fa fa-bus"></i>
                        </div>
                            <a href="tramitesdoc.php" class="small-box-footer">SOAT&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    <?php } ?>
                </div>
                <!-- Mercancias BEA-->                
                <div class="col-lg-3 col-6">
                    <?php
                        /*Consultamos a la base de datos*/
                        $sql = "SELECT tipo_doc.tipo_doc,flota.placa_flota, MAX(doc_flota.fechareg_docflota) AS Ultima_fecha, DATE_ADD(fechareg_docflota, INTERVAL 1 YEAR) AS Proxima_Fecha FROM doc_flota
                        INNER JOIN flota ON doc_flota.id_flota = flota.id_flota 
                        INNER JOIN tipo_doc ON doc_flota.id_tipodoc = tipo_doc.idtipo_doc
                        WHERE flota.placa_flota='BEA-835' AND tipo_doc.tipo_doc='SOAT'";                            
                                
                        /*Creamos una variable para ejecutar la consulta*/
                            $ejecutar = $conex->query($sql); 
                                
                        /*Recorremos el resultado de la consulta*/
                            while ($fila = mysqli_fetch_array($ejecutar)) {
                    ?>
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <p>Camión Placa BEA-835</p>
                            <strong>F.Realizado:</strong>&nbsp;&nbsp;<strong><?php echo $fila['Ultima_fecha'];?></strong>
                            <strong>F.Próximo:</strong>&nbsp;&nbsp;&nbsp;<strong><?php echo $fila['Proxima_Fecha'];?></strong>
                        </div>
                        <div class="icon">
                            <i class="fa fa-bus"></i>
                        </div>
                            <a href="tramitesdoc.php" class="small-box-footer">SOAT&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
            
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</section>
<!-- /.content-wrapper -->

<?php include_once "./vistas/modulos/footer.php" ?>