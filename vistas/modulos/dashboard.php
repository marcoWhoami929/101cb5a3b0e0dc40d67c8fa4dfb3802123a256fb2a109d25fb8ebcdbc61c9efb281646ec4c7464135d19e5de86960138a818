
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>

<div id="main-wrapper">

    <div class="page-wrapper">

       <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Tablero</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tablero</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <?php 
                            if ($_SESSION["grupo"] == "Administrador") {
                                echo'
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Panel de control</h4>
                                        <h5 class="card-subtitle">A continución se detallarán los puntos mas importantes del control de inventario y se requiere mas información acerca del segmento dar click en la pestaña del segmento requerido.</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                          <li class="nav-item">
                                            <a class="nav-link active" id="tabTablero" data-toggle="pill" href="#pillTablero" role="tab" aria-selected="true">Tablero</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabGeneral" data-toggle="pill" href="#pillGeneral" role="tab"  aria-selected="false" identificador = "General">Almacén General</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabSanManuel" data-toggle="pill" href="#pillSanManuel" role="tab"  aria-selected="false" identificador = "SanManuel">San Manuel</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabReforma" data-toggle="pill" href="#pillReforma" role="tab"  aria-selected="false" identificador = "Reforma">Reforma</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabSantiago" data-toggle="pill" href="#pillSantiago" role="tab"  aria-selected="false" identificador = "Santiago">Santiago</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabCapu" data-toggle="pill" href="#pillCapu" role="tab"  aria-selected="false" identificador = "Capu">Capu</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabTorres" data-toggle="pill" href="#pillTorres" role="tab"  aria-selected="false" identificador = "LasTorres">Las Torres</a>
                                        </li>
                                    </ul>
                                </div>
                                ';
                            } if ($_SESSION["perfil"]== "Tiendas" && $_SESSION["nombre"] == "Sucursal San Manuel") {
                               echo '
                                <div class="row">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabSanManuel" data-toggle="pill" href="#pillSanManuel" role="tab"  aria-selected="true" identificador = "SanManuel">Ver Tablas de Almacen</a>
                                        </li>                                 
                                    </ul>
                                </div>

                               ';
                               echo '<style>#contentGr { display:none;}</style>';

                            }
                         ?>
                        
                </div>
            </div>
        </div>
    </div>

    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pillTablero" role="tabpanel" >
        <div class="container-fluid" id="contentGr">
            <div class="row" id="contenedorGeneralSemaforos">
                <div class="col-md-2 col-lg-2 col-xlg-2">
                    <div class="card card-hover">
                        <div class="box bg-cyan text-center">
                            <h1 class="font-light text-white"><i class="fas fa-dolly-flatbed"></i></h1>
                            <h6 class="text-white">Almacén General</h6>
                        </div>
                        <div class="card card-body">
                            <div class="row">
                             <div class="col-lg-2 col-md-2 col-sm-2">
                                <div  id="contenedorSemaforo">
                                   <ul class="semaforo verde">
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <div class="col-md-2 col-lg-2 col-xlg-2">
            <div class="card card-hover">
                <div class="box bg-success text-center">
                    <h1 class="font-light text-white"><i class="fas fa-dolly-flatbed"></i></h1>
                    <h6 class="text-white">San Manuel</h6>
                </div>
                <div class="card card-body">
                    <div class="row">
                     <div class="col-lg-2 col-md-2 col-sm-2">
                        <div  id="contenedorSemaforo">
                           <ul class="semaforo rojo">
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<div class="col-md-2 col-lg-2 col-xlg-2">
    <div class="card card-hover">
        <div class="box bg-info text-center">
            <h1 class="font-light text-white"><i class="fas fa-dolly-flatbed"></i></h1>
            <h6 class="text-white">Reforma</h6>
        </div>
        <div class="card card-body">
            <div class="row">
             <div class="col-lg-2 col-md-2 col-sm-2">
                <div  id="contenedorSemaforo">
                   <ul class="semaforo naranja">
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
    </div>

</div>

</div>

</div>
<div class="col-md-2 col-lg-2 col-xlg-2">
    <div class="card card-hover">
        <div class="box bg-warning text-center">
            <h1 class="font-light text-white"><i class="fas fa-dolly-flatbed"></i></h1>
            <h6 class="text-white">Santiago</h6>
        </div>
        <div class="card card-body">
            <div class="row">
             <div class="col-lg-2 col-md-2 col-sm-2">
                <div  id="contenedorSemaforo">
                   <ul class="semaforo verde">
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
    </div>

</div>

</div>

</div>
<div class="col-md-2 col-lg-2 col-xlg-2">
    <div class="card card-hover">
        <div class="box bg-danger text-center">
            <h1 class="font-light text-white"><i class="fas fa-dolly-flatbed"></i></h1>
            <h6 class="text-white">Capu</h6>
        </div>
        <div class="card card-body">
            <div class="row">
             <div class="col-lg-2 col-md-2 col-sm-2">
                <div  id="contenedorSemaforo">
                   <ul class="semaforo naranja">
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
    </div>

</div>

</div>

</div>
<div class="col-md-2 col-lg-2 col-xlg-2">
    <div class="card card-hover">
        <div class="box bg-cyan text-center">
            <h1 class="font-light text-white"><i class="fas fa-dolly-flatbed"></i></h1>
            <h6 class="text-white">Las Torres</h6>
        </div>
        <div class="card card-body">
            <div class="row">
             <div class="col-lg-2 col-md-2 col-sm-2">
                <div  id="contenedorSemaforo">
                   <ul class="semaforo rojo">
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
    </div>

</div>

</div>

</div>
</div>
<div class="row" id="cuadrosData">

    <div class="col-md-4 col-lg-4 col-xlg-4">
        <div class="card card-hover">
            <div class="box bg-cyan text-center">
                <h1 class="font-light text-white"><i class="fas fa-dolly-flatbed"></i></h1>
                <h6 class="text-white">Almacen General</h6>
            </div>
            <div class="card card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-cyan text-center">
                        <i class="fas fa-arrow-down text-white"></i>
                        <h4 class="text-white"><?php echo rand(1,100) ?></h4>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-success text-center">
                        <i class="fas fa-arrow-up text-white"></i>
                        <h4 class="text-white"><?php echo rand(1,100) ?></h4>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-warning text-center">
                        <i class="fas fa-boxes text-white"></i>
                        <h4 class="text-white"><?php echo rand(1,100) ?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-danger text-center">
                        <i class="fas fa-arrow-down text-white"></i><i class="fas fa-dollar-sign text-white"></i>
                        <h5 class="text-white"><?php echo number_format(rand(1,10000),2) ?></h5>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-info text-center">
                        <i class="fas fa-arrow-up text-white"></i><i class="fas fa-dollar-sign text-white"></i>
                        <h5 class="text-white"><?php echo number_format(rand(1,10000),2) ?></h5>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-cyan text-center">
                        <i class="fas fa-boxes text-white"></i><i class="fas fa-dollar-sign text-white"></i>
                        <h5 class="text-white"><?php echo number_format(rand(1,10000),2) ?></h5>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="col-md-4 col-lg-4 col-xlg-4">
        <div class="card card-hover">
            <div class="box bg-success text-center">
                <h1 class="font-light text-white"><i class="fas fa-dolly-flatbed"></i></h1>
                <h6 class="text-white">San Manuel</h6>
            </div>
            <div class="card card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-cyan text-center">
                        <i class="fas fa-arrow-down text-white"></i>
                        <h4 class="text-white"><?php echo rand(1,100) ?></h4>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-success text-center">
                        <i class="fas fa-arrow-up text-white"></i>
                        <h4 class="text-white"><?php echo rand(1,100) ?></h4>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-warning text-center">
                        <i class="fas fa-boxes text-white"></i>
                        <h4 class="text-white"><?php echo rand(1,100) ?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-danger text-center">
                        <i class="fas fa-arrow-down text-white"></i><i class="fas fa-dollar-sign text-white"></i>
                        <h5 class="text-white"><?php echo number_format(rand(1,10000),2) ?></h5>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-info text-center">
                        <i class="fas fa-arrow-up text-white"></i><i class="fas fa-dollar-sign text-white"></i>
                        <h5 class="text-white"><?php echo number_format(rand(1,10000),2) ?></h5>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-cyan text-center">
                        <i class="fas fa-boxes text-white"></i><i class="fas fa-dollar-sign text-white"></i>
                        <h5 class="text-white"><?php echo number_format(rand(1,10000),2) ?></h5>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="col-md-4 col-lg-4 col-xlg-4">
        <div class="card card-hover">
            <div class="box bg-info text-center">
                <h1 class="font-light text-white"><i class="fas fa-dolly-flatbed"></i></h1>
                <h6 class="text-white">Reforma</h6>
            </div>
            <div class="card card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-cyan text-center">
                        <i class="fas fa-arrow-down text-white"></i>
                        <h4 class="text-white"><?php echo rand(1,100) ?></h4>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-success text-center">
                        <i class="fas fa-arrow-up text-white"></i>
                        <h4 class="text-white"><?php echo rand(1,100) ?></h4>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-warning text-center">
                        <i class="fas fa-boxes text-white"></i>
                        <h4 class="text-white"><?php echo rand(1,100) ?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-danger text-center">
                        <i class="fas fa-arrow-down text-white"></i><i class="fas fa-dollar-sign text-white"></i>
                        <h5 class="text-white"><?php echo number_format(rand(1,10000),2) ?></h5>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-info text-center">
                        <i class="fas fa-arrow-up text-white"></i><i class="fas fa-dollar-sign text-white"></i>
                        <h5 class="text-white"><?php echo number_format(rand(1,10000),2) ?></h5>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-cyan text-center">
                        <i class="fas fa-boxes text-white"></i><i class="fas fa-dollar-sign text-white"></i>
                        <h5 class="text-white"><?php echo number_format(rand(1,10000),2) ?></h5>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<div class="row" id="cuadrosData2">

    <div class="col-md-4 col-lg-4 col-xlg-4">
        <div class="card card-hover">
            <div class="box bg-warning text-center">
                <h1 class="font-light text-white"><i class="fas fa-dolly-flatbed"></i></h1>
                <h6 class="text-white">Santiago</h6>
            </div>
            <div class="card card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-cyan text-center">
                        <i class="fas fa-arrow-down text-white"></i>
                        <h4 class="text-white"><?php echo rand(1,100) ?></h4>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-success text-center">
                        <i class="fas fa-arrow-up text-white"></i>
                        <h4 class="text-white"><?php echo rand(1,100) ?></h4>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-warning text-center">
                        <i class="fas fa-boxes text-white"></i>
                        <h4 class="text-white"><?php echo rand(1,100) ?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-danger text-center">
                        <i class="fas fa-arrow-down text-white"></i><i class="fas fa-dollar-sign text-white"></i>
                        <h5 class="text-white"><?php echo number_format(rand(1,10000),2) ?></h5>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-info text-center">
                        <i class="fas fa-arrow-up text-white"></i><i class="fas fa-dollar-sign text-white"></i>
                        <h5 class="text-white"><?php echo number_format(rand(1,10000),2) ?></h5>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-cyan text-center">
                        <i class="fas fa-boxes text-white"></i><i class="fas fa-dollar-sign text-white"></i>
                        <h5 class="text-white"><?php echo number_format(rand(1,10000),2) ?></h5>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="col-md-4 col-lg-4 col-xlg-4">
        <div class="card card-hover">
            <div class="box bg-danger text-center">
                <h1 class="font-light text-white"><i class="fas fa-dolly-flatbed"></i></h1>
                <h6 class="text-white">Capu</h6>
            </div>
            <div class="card card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-cyan text-center">
                        <i class="fas fa-arrow-down text-white"></i>
                        <h4 class="text-white"><?php echo rand(1,100) ?></h4>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-success text-center">
                        <i class="fas fa-arrow-up text-white"></i>
                        <h4 class="text-white"><?php echo rand(1,100) ?></h4>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-warning text-center">
                        <i class="fas fa-boxes text-white"></i>
                        <h4 class="text-white"><?php echo rand(1,100) ?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-danger text-center">
                        <i class="fas fa-arrow-down text-white"></i><i class="fas fa-dollar-sign text-white"></i>
                        <h5 class="text-white"><?php echo number_format(rand(1,10000),2) ?></h5>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-info text-center">
                        <i class="fas fa-arrow-up text-white"></i><i class="fas fa-dollar-sign text-white"></i>
                        <h5 class="text-white"><?php echo number_format(rand(1,10000),2) ?></h5>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-cyan text-center">
                        <i class="fas fa-boxes text-white"></i><i class="fas fa-dollar-sign text-white"></i>
                        <h5 class="text-white"><?php echo number_format(rand(1,10000),2) ?></h5>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="col-md-4 col-lg-4 col-xlg-4">
        <div class="card card-hover">
            <div class="box bg-cyan text-center">
                <h1 class="font-light text-white"><i class="fas fa-dolly-flatbed"></i></h1>
                <h6 class="text-white">Las Torres</h6>
            </div>
            <div class="card card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-cyan text-center">
                        <i class="fas fa-arrow-down text-white"></i>
                        <h4 class="text-white"><?php echo rand(1,100) ?></h4>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-success text-center">
                        <i class="fas fa-arrow-up text-white"></i>
                        <h4 class="text-white"><?php echo rand(1,100) ?></h4>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-warning text-center">
                        <i class="fas fa-boxes text-white"></i>
                        <h4 class="text-white"><?php echo rand(1,100) ?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-danger text-center">
                        <i class="fas fa-arrow-down text-white"></i><i class="fas fa-dollar-sign text-white"></i>
                        <h5 class="text-white"><?php echo number_format(rand(1,10000),2) ?></h5>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-info text-center">
                        <i class="fas fa-arrow-up text-white"></i><i class="fas fa-dollar-sign text-white"></i>
                        <h5 class="text-white"><?php echo number_format(rand(1,10000),2) ?></h5>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 box bg-cyan text-center">
                        <i class="fas fa-boxes text-white"></i><i class="fas fa-dollar-sign text-white"></i>
                        <h5 class="text-white"><?php echo number_format(rand(1,10000),2) ?></h5>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<div>
    

</div>
<div class="row" id="grafics">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <?php include("vistas/modulos/graficos/graficoInventarioGeneralUnidadesAnual.php") ?>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <?php include("vistas/modulos/graficos/graficoInventarioGeneralMontoAnual.php") ?>
    </div>

</div>
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4">
     <?php include("vistas/modulos/graficos/graficoInventarioUnidadesActual.php");?>

 </div>
 <div class="col-lg-4 col-md-4 col-sm-4">
    <?php include("vistas/modulos/graficos/graficoInventarioUnidadesFinal.php");?>
</div>
<div class="col-lg-4 col-md-4 col-sm-4">
    <?php include("vistas/modulos/graficos/graficoNecesidadUnidades.php");?>
</div>                           
</div>
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4">
     <?php include("vistas/modulos/graficos/graficoInventarioImportesActual.php");?>

 </div>
 <div class="col-lg-4 col-md-4 col-sm-4">
    <?php include("vistas/modulos/graficos/graficoInventarioImportesFinal.php");?>
</div>
<div class="col-lg-4 col-md-4 col-sm-4">
    <?php include("vistas/modulos/graficos/graficoNecesidadImportes.php");?>
</div>                           
</div>


</div>

</div>
<div class="tab-pane fade" id="pillGeneral" role="tabpanel">
    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Productos por Agotarse</h3>
            <table class="table table-bordered table-striped dt-responsive tablePorAgotarse" width="100%" id="porAgotarse" style="border: 2px solid #1F262D">

                <thead style="background:#1F262D;color: white">

                   <tr>
                        <th style="border:none">#</th>
                        <th style="border:none">Codigo</th>
                        <th style="border:none">Producto</th>
                        <th style="border:none">Stock Minimo</th>
                        <th style="border:none">Existencias</th>
                        <th style="border:none">Faltante Unidades</th>
                        <th style="border:none">Faltante Monto</th>
                        <th style="border:none">Estado</th>
                    </tr> 

                </thead>

            </table>
        </div>


        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Almacén 1</h3>
            <table class="table table-bordered table-striped dt-responsive tablaAlmacenGeneral1" width="100%" id="almacenGeneral1" style="border: 2px solid #1F262D">

                <thead style="background:#1F262D;color: white">

                   <tr>
                     <th style="border:none">#</th>
                     <th style="border:none">Codigo</th>
                     <th style="border:none">Producto</th>
                     <th style="border:none">Entradas</th>
                     <th style="border:none">Salidas</th>
                     <th style="border:none">Existencias</th>
                     <th style="border:none">Entradas</th>
                     <th style="border:none">Salidas</th>
                     <th style="border:none">Existencias</th>
                     <th style="border:none">Clasificacion</th>
                   


                    </tr> 

                </thead>

            </table>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Almacén 2</h3>
            <table class="table table-bordered table-striped dt-responsive tablaAlmacenGeneral2" width="100%" id="almacenGeneral2" style="border: 2px solid #1F262D">

                <thead style="background:#1F262D;color: white">

                   <tr>
                     <th style="border:none">#</th>
                     <th style="border:none">Codigo</th>
                     <th style="border:none">Producto</th>
                     <th style="border:none">Entradas</th>
                     <th style="border:none">Salidas</th>
                     <th style="border:none">Existencias</th>
                     <th style="border:none">Entradas</th>
                     <th style="border:none">Salidas</th>
                     <th style="border:none">Existencias</th>
                     <th style="border:none">Clasificacion</th>
                     

                    </tr> 

                </thead>

            </table>
        </div>
    </div>
   
</div>
<div class="tab-pane fade" id="pillSanManuel" role="tabpanel">
    
       <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Almacén 1</h3>
            <table class="table table-bordered table-striped dt-responsive tablaAlmacenSanManuel1" width="100%" id="almacenSanManuel1" style="border: 2px solid #1F262D">

                <thead style="background:#1F262D;color: white">

                   <tr>
                     <th style="border:none">#</th>
                     <th style="border:none">Codigo</th>
                     <th style="border:none">Producto</th>
                     <th style="border:none">Entradas</th>
                     <th style="border:none">Salidas</th>
                     <th style="border:none">Existencias</th>
                     <th style="border:none">Entradas</th>
                     <th style="border:none">Salidas</th>
                     <th style="border:none">Existencias</th>
                     <th style="border:none">Clasificacion</th>
                   


                    </tr> 

                </thead>

            </table>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Almacén 2</h3>
            <table class="table table-bordered table-striped dt-responsive tablaAlmacenSanManuel2" width="100%" id="almacenSanManuel2" style="border: 2px solid #1F262D">

                <thead style="background:#1F262D;color: white">

                   <tr>
                     <th style="border:none">#</th>
                     <th style="border:none">Codigo</th>
                     <th style="border:none">Producto</th>
                     <th style="border:none">Entradas</th>
                     <th style="border:none">Salidas</th>
                     <th style="border:none">Existencias</th>
                     <th style="border:none">Entradas</th>
                     <th style="border:none">Salidas</th>
                     <th style="border:none">Existencias</th>
                     <th style="border:none">Clasificacion</th>
                     

                    </tr> 

                </thead>

            </table>
        </div>
    </div>

</div>
<div class="tab-pane fade" id="pillReforma" role="tabpanel">
       <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Almacén 1</h3>
            <table class="table table-bordered table-striped dt-responsive tablaAlmacenReforma1" width="100%" id="almacenReforma1" style="border: 2px solid #1F262D">

                <thead style="background:#1F262D;color: white">

                   <tr>
                     <th style="border:none">#</th>
                     <th style="border:none">Codigo</th>
                     <th style="border:none">Producto</th>
                     <th style="border:none">Entradas</th>
                     <th style="border:none">Salidas</th>
                     <th style="border:none">Existencias</th>
                     <th style="border:none">Entradas</th>
                     <th style="border:none">Salidas</th>
                     <th style="border:none">Existencias</th>
                     <th style="border:none">Clasificacion</th>
                   


                    </tr> 

                </thead>

            </table>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Almacén 2</h3>
            <table class="table table-bordered table-striped dt-responsive tablaAlmacenReforma2" width="100%" id="almacenReforma2" style="border: 2px solid #1F262D">

                <thead style="background:#1F262D;color: white">

                   <tr>
                     <th style="border:none">#</th>
                     <th style="border:none">Codigo</th>
                     <th style="border:none">Producto</th>
                     <th style="border:none">Entradas</th>
                     <th style="border:none">Salidas</th>
                     <th style="border:none">Existencias</th>
                     <th style="border:none">Entradas</th>
                     <th style="border:none">Salidas</th>
                     <th style="border:none">Existencias</th>
                     <th style="border:none">Clasificacion</th>
                     

                    </tr> 

                </thead>

            </table>
        </div>
    </div>
</div>
<div class="tab-pane fade" id="pillSantiago" role="tabpanel">
       <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Almacén 1</h3>
            <table class="table table-bordered table-striped dt-responsive tablaAlmacenSantiago1" width="100%" id="almacenSantiago1" style="border: 2px solid #1F262D">

                <thead style="background:#1F262D;color: white">

                   <tr>
                     <th style="border:none">#</th>
                     <th style="border:none">Codigo</th>
                     <th style="border:none">Producto</th>
                     <th style="border:none">Entradas</th>
                     <th style="border:none">Salidas</th>
                     <th style="border:none">Existencias</th>
                     <th style="border:none">Entradas</th>
                     <th style="border:none">Salidas</th>
                     <th style="border:none">Existencias</th>
                     <th style="border:none">Clasificacion</th>
                   


                    </tr> 

                </thead>

            </table>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Almacén 2</h3>
            <table class="table table-bordered table-striped dt-responsive tablaAlmacenSantiago2" width="100%" id="almacenSantiago2" style="border: 2px solid #1F262D">

                <thead style="background:#1F262D;color: white">

                   <tr>
                     <th style="border:none">#</th>
                     <th style="border:none">Codigo</th>
                     <th style="border:none">Producto</th>
                     <th style="border:none">Entradas</th>
                     <th style="border:none">Salidas</th>
                     <th style="border:none">Existencias</th>
                     <th style="border:none">Entradas</th>
                     <th style="border:none">Salidas</th>
                     <th style="border:none">Existencias</th>
                     <th style="border:none">Clasificacion</th>
                     

                    </tr> 

                </thead>

            </table>
        </div>
    </div>
</div>
<div class="tab-pane fade" id="pillCapu" role="tabpanel">
       <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Almacén 1</h3>
            <table class="table table-bordered table-striped dt-responsive tablaAlmacenCapu1" width="100%" id="almacenCapu1" style="border: 2px solid #1F262D">

                <thead style="background:#1F262D;color: white">

                   <tr>
                     <th style="border:none">#</th>
                     <th style="border:none">Codigo</th>
                     <th style="border:none">Producto</th>
                     <th style="border:none">Entradas</th>
                     <th style="border:none">Salidas</th>
                     <th style="border:none">Existencias</th>
                     <th style="border:none">Entradas</th>
                     <th style="border:none">Salidas</th>
                     <th style="border:none">Existencias</th>
                     <th style="border:none">Clasificacion</th>
                   


                    </tr> 

                </thead>

            </table>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Almacén 2</h3>
            <table class="table table-bordered table-striped dt-responsive tablaAlmacenCapu2" width="100%" id="almacenCapu2" style="border: 2px solid #1F262D">

                <thead style="background:#1F262D;color: white">

                   <tr>
                     <th style="border:none">#</th>
                     <th style="border:none">Codigo</th>
                     <th style="border:none">Producto</th>
                     <th style="border:none">Entradas</th>
                     <th style="border:none">Salidas</th>
                     <th style="border:none">Existencias</th>
                     <th style="border:none">Entradas</th>
                     <th style="border:none">Salidas</th>
                     <th style="border:none">Existencias</th>
                     <th style="border:none">Clasificacion</th>
                     

                    </tr> 

                </thead>

            </table>
        </div>
    </div>
</div>
<div class="tab-pane fade" id="pillTorres" role="tabpanel">
       <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Almacén 1</h3>
            <table class="table table-bordered table-striped dt-responsive tablaAlmacenLasTorres1" width="100%" id="almacenLasTorres1" style="border: 2px solid #1F262D">

                <thead style="background:#1F262D;color: white">

                   <tr>
                     <th style="border:none">#</th>
                     <th style="border:none">Codigo</th>
                     <th style="border:none">Producto</th>
                     <th style="border:none">Entradas</th>
                     <th style="border:none">Salidas</th>
                     <th style="border:none">Existencias</th>
                     <th style="border:none">Entradas</th>
                     <th style="border:none">Salidas</th>
                     <th style="border:none">Existencias</th>
                     <th style="border:none">Clasificacion</th>
                   


                    </tr> 

                </thead>

            </table>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Almacén 2</h3>
            <table class="table table-bordered table-striped dt-responsive tablaAlmacenLasTorres2" width="100%" id="almacenLasTorres2" style="border: 2px solid #1F262D">

                <thead style="background:#1F262D;color: white">

                   <tr>
                     <th style="border:none">#</th>
                     <th style="border:none">Codigo</th>
                     <th style="border:none">Producto</th>
                     <th style="border:none">Entradas</th>
                     <th style="border:none">Salidas</th>
                     <th style="border:none">Existencias</th>
                     <th style="border:none">Entradas</th>
                     <th style="border:none">Salidas</th>
                     <th style="border:none">Existencias</th>
                     <th style="border:none">Clasificacion</th>
                     

                    </tr> 

                </thead>

            </table>
        </div>
    </div>
</div>
</div>
</div>

</div>

</div>
