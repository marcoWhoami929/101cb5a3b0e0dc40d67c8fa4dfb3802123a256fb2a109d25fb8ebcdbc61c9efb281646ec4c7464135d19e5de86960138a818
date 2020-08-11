<?php
$sesion = $_SESSION["id"];
echo "<script type='text/javascript'>localStorage.setItem('idSesion','".$sesion."');</script>";

?>
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
                        <input type="hidden" name="nombreUsuario" id="nombreUsuario" value="<?php echo $_SESSION["nombre"]?>">
                        <input type="hidden" name="perfilUsuario" id="perfilUsuario" value="<?php echo $_SESSION["perfil"]?>">
                        <?php 
                            if ($_SESSION["grupo"] == "Administrador") {

                                echo'
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Panel de control</h4>
                                        <h5 class="card-subtitle">A continución se detallarán los puntos mas importantes del control de inventario y se requiere mas información acerca del segmento dar click en la pestaña del segmento requerido.</h5>
                                    </div>
                                </div>
                                <div class="row body">
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
                            }else if ($_SESSION["perfil"]== "Tiendas" && $_SESSION["nombre"] == "Sucursal San Manuel") {
                               echo '
                                <div class="row">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabSanManuel" data-toggle="pill" href="#pillSanManuel" role="tab"  aria-selected="true" identificador = "SanManuel">Visualizar</a>
                                        </li>                                 
                                    </ul>
                                </div>

                               ';
                               echo '<style>#contentGr { display:none;}</style>';

                            }else if ($_SESSION["perfil"]== "Tiendas" && $_SESSION["nombre"] == "Sucursal Reforma") {
                               echo '
                                <div class="row">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabReforma" data-toggle="pill" href="#pillReforma" role="tab"  aria-selected="false" identificador = "Reforma">Visualizar</a>
                                        </li>                                 
                                    </ul>
                                </div>

                               ';
                               echo '<style>#contentGr { display:none;}</style>';

                            }else if ($_SESSION["perfil"]== "Tiendas" && $_SESSION["nombre"] == "Sucursal Santiago") {
                               echo '
                                <div class="row">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabSantiago" data-toggle="pill" href="#pillSantiago" role="tab"  aria-selected="false" identificador = "Santiago">Visualizar</a>
                                        </li>                                 
                                    </ul>
                                </div>

                               ';
                               echo '<style>#contentGr { display:none;}</style>';

                            }else if ($_SESSION["perfil"]== "Tiendas" && $_SESSION["nombre"] == "Sucursal Capu") {
                               echo '
                                <div class="row">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabCapu" data-toggle="pill" href="#pillCapu" role="tab"  aria-selected="false" identificador = "Capu">Visualizar</a>
                                        </li>                                 
                                    </ul>
                                </div>

                               ';
                               echo '<style>#contentGr { display:none;}</style>';

                            }else if ($_SESSION["perfil"]== "Tiendas" && $_SESSION["nombre"] == "Sucursal Las Torres") {
                               echo '
                                <div class="row">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                             <a class="nav-link" id="tabTorres" data-toggle="pill" href="#pillTorres" role="tab"  aria-selected="false" identificador = "LasTorres">Visualizar</a>
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
                                   <ul class="semaforo">
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
            <div class="card border-dark mb-3" >
                <div class="card-header">
                    <h3>Productos por Agotarse Almacen General 1
                        <button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#gr1" style="float: right;"><i class="fas fa-minus-square"></i>
                        </button>
                    </h3>
                </div>
                
                <div class="card-body collapse table-responsive"  id="gr1">
                    <table class="table table-bordered table-striped dt-responsive tablaPorAgotarseGeneral1" width="100%"  style="border: 2px solid #1F262D">

                        <thead >

                            <?php
                            if ($_SESSION["grupo"] == "Administrador") { 
                                //$fechaActual = date("Y-m-d");
                                $fechaActual = "2020-08-05";
                                $fechaFinal = date("Y-m-d", strtotime($fechaActual)); 

                                $table = "almacengeneral1";
                                $select = "MAX(idImportacion) AS ultimoId";
                                $conditions = "WHERE fecha = '".$fechaFinal."'";
                                $idDisponible = ControladorInventarios::ctrBuscarFolioDisponible($table, $select, $conditions);
                                $ultimoId = $idDisponible["ultimoId"];

                                $tabla = "productos AS p INNER JOIN almacengeneral1 AS al ON p.id = al.idProducto";
                                $campos = "SUM(p.stockMinimoGral1) AS totalStockMinimo, SUM(al.ultimoCosto * (p.stockMinimoGral1-al.existenciasUnidades) ) as faltanteMontos,SUM(p.stockMinimoGral1-al.existenciasUnidades) as faltantes,SUM(al.existenciasUnidades) AS existenciasUnidades, SUM(al.ultimoCosto) AS ultimoCosto, al.fecha";
                                $parametros = "WHERE al.existenciasUnidades != 0 AND al.idImportacion = ".$ultimoId." AND al.fecha = '".$fechaFinal."'";

                                $totales = ControladorInventarios::ctrMostrarProductosPorAgotarse($tabla, $campos, $parametros);

                                echo '<tr>
                                <th rowspan="2" colspan="3" style="border:none;color: blue;text-align: right;font-size: 15px;">Total General</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Unidades</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Faltante Unidades</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Faltante en Monto</th>
                            </tr>
                            <tr>';
                        
                            
                                    
                                        $ultimoCosto = $totales[0]["ultimoCosto"];
                                        $totalStockMinimo = $totales[0]["totalStockMinimo"];
                                        $totalExistencias = $totales[0]["existenciasUnidades"];
                                        $totalFaltantes =  $totales[0]["faltantes"];
                                        $totalFaltanteMonto = $totales[0]["faltanteMontos"];
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">E '.number_format($totalExistencias,2).' </th>';
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">FU '.number_format($totalFaltantes,2).' </th>';
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">FM '.number_format($totalFaltanteMonto,2).' </th>';
                                   
                                     
                            echo '</tr>';
                            }
                            ?>
                            <tr style="background:#1F262D;color: white">
                                <th style="border:none">#</th>
                                <th style="border:none">Codigo</th>
                                <th style="border:none">Producto</th>
                                <th style="border:none">Stock Minimo</th>
                                <th style="border:none">Existencias</th>
                                <th style="border:none">Faltante Unidades</th>
                                <?php 

                                if ($_SESSION["grupo"] == "Administrador") {
                                    echo '<th style="border:none">Faltante Monto</th>';
                                }else{
                                    
                                }

                                 ?>
                                <th style="border:none">Fecha</th>
                                <th style="border:none">Estado</th>
                            </tr> 

                        </thead>
                        <tfoot>
                                
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
        <style>
            .verticalText {
                writing-mode: vertical-lr;
                transform: rotate(180deg);
                }
        </style>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card border-dark mb-3" >
                <div class="card-header">
                    <h3>Almacén 1
                        <button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#al1" style="float: right;"><i class="fas fa-minus-square"></i>
                        </button>
                    </h3>
                </div>
 
                 <div class="card-body collapse table-responsive"  id="al1">

                    <table class="table table-bordered table-striped dt-responsive tablaAlmacenGeneral1" width="100%" id="almacenGeneral1" style="border: 2px solid #1F262D">

                        <thead style="background:#1F262D;color: white">

                           <tr>
                                <th style="border:none">#</th>
                                <th style="border:none"><span class="verticalText">Codigo</span></th>
                                <th style="border:none"><span class="verticalText">Producto</span></th>
                                <th style="border:none"><span class="verticalText">Total Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Total Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Total Existencias</span></th>
                                <th style="border:none"><span class="verticalText">Existencias</span></th>
                                <th style="border:none"><span class="verticalText">Stock Minimo</span></th>
                                <th style="border:none"><span class="verticalText">Stock de Seguridad</span></th>
                                <th style="border:none"><span class="verticalText">Stock Maximo</span></th>
                                <?php 

                                if ($_SESSION["grupo"] == "Administrador") {
                                    echo '<th style="border:none"><span class="verticalText">Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Existencias</span></th>';
                                }else{
                                    
                                }

                                 ?>
                                
                                <th style="border:none"><span class="verticalText">% Rotación</span></th>
                                <th style="border:none"><span class="verticalText">Rotación</span></th>
                                <th style="border:none"><span class="verticalText">ClasificacionJ</span></th>
                                <th style="border:none"><span class="verticalText">Clasificacion</span></th>
                            </tr> 

                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card border-dark mb-3" >
                <div class="card-header">
                    <h3>Productos por Agotarse Almacen General 2
                        <button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#gr2" style="float: right;"><i class="fas fa-minus-square"></i>
                        </button>
                    </h3>
                </div>
                
                <div class="card-body collapse"  id="gr2">

        
                    <table class="table table-bordered table-striped dt-responsive tablaPorAgotarseGeneral2" width="100%"  style="border: 2px solid #1F262D">


                        <thead >

                            <?php
                            if ($_SESSION["grupo"] == "Administrador") {  
                                 //$fechaActual = date("Y-m-d");
                                $fechaActual = "2020-08-05";
                                $fechaFinal = date("Y-m-d", strtotime($fechaActual)); 

                                $table = "almacengeneral2";
                                $select = "MAX(idImportacion) AS ultimoId";
                                $conditions = "WHERE fecha = '".$fechaFinal."'";
                                $idDisponible = ControladorInventarios::ctrBuscarFolioDisponible($table, $select, $conditions);
                                $ultimoId = $idDisponible["ultimoId"];

                                $tabla = "productos AS p INNER JOIN almacengeneral2 AS al ON p.id = al.idProducto";
                                $campos = "SUM(p.stockMinimoGral2) AS totalStockMinimo, SUM(al.ultimoCosto * (p.stockMinimoGral1-al.existenciasUnidades) ) as faltanteMontos,SUM(p.stockMinimoGral2-al.existenciasUnidades) as faltantes,SUM(al.existenciasUnidades) AS existenciasUnidades, SUM(al.ultimoCosto) AS ultimoCosto, al.fecha";
                                $parametros = "WHERE al.existenciasUnidades != 0 AND al.idImportacion = ".$ultimoId." AND al.fecha = '".$fechaFinal."'";

                                $totales = ControladorInventarios::ctrMostrarProductosPorAgotarse($tabla, $campos, $parametros);

                                
                            echo'<tr>
                                <th rowspan="2" colspan="3" style="border:none;color: blue;text-align: right;font-size: 15px;">Total General</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Unidades</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Faltante Unidades</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Faltante en Monto</th>
                            </tr>
                            <tr>';
                            
                                    
                                        $ultimoCosto = $totales[0]["ultimoCosto"];
                                        $totalStockMinimo = $totales[0]["totalStockMinimo"];
                                        $totalExistencias = $totales[0]["existenciasUnidades"];
                                        $totalFaltantes =  $totales[0]["faltantes"];
                                        $totalFaltanteMonto = $totales[0]["faltanteMontos"];
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">E '.number_format($totalExistencias,2).' </th>';
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">FU '.number_format($totalFaltantes,2).' </th>';
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">FM '.number_format($totalFaltanteMonto,2).' </th>';
                                   
                                     
                            echo '</tr>';
                        }
                            ?>

                            <tr style="background:#1F262D;color: white">
                                <th style="border:none">#</th>
                                <th style="border:none">Codigo</th>
                                <th style="border:none">Producto</th>
                                <th style="border:none">Stock Minimo</th>
                                <th style="border:none">Existencias</th>
                                <th style="border:none">Faltante Unidades</th>
                                <?php 

                                if ($_SESSION["grupo"] == "Administrador") {
                                    echo '<th style="border:none">Faltante Monto</th>';
                                }else{
                                    
                                }

                                 ?>
                                <th style="border:none">Fecha</th>
                                <th style="border:none">Estado</th>
                            </tr> 

                        </thead>
                         <tfoot>
                                
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card border-dark mb-3" >
                <div class="card-header">
                    <h3>Almacén 2
                        <button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#al2" style="float: right;"><i class="fas fa-minus-square"></i>
                        </button>
                    </h3>
                </div>
                
                <div class="card-body collapse table-responsive"  id="al2">
                    <table class="table table-bordered table-striped dt-responsive tablaAlmacenGeneral2" width="100%" id="almacenGeneral2" style="border: 2px solid #1F262D">

                        <thead style="background:#1F262D;color: white">

                            <tr>
                                <th style="border:none">#</th>
                                <th style="border:none"><span class="verticalText">Codigo</span></th>
                                <th style="border:none"><span class="verticalText">Producto</span></th>
                                <th style="border:none"><span class="verticalText">Total Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Total Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Total Existencias</span></th>
                                <th style="border:none"><span class="verticalText">Existencias</span></th>
                                <th style="border:none"><span class="verticalText">Stock Minimo</span></th>
                                <th style="border:none"><span class="verticalText">Stock de Seguridad</span></th>
                                <th style="border:none"><span class="verticalText">Stock Maximo</span></th>
                                <?php 

                                if ($_SESSION["grupo"] == "Administrador") {
                                    echo '<th style="border:none"><span class="verticalText">Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Existencias</span></th>';
                                }else{
                                    
                                }

                                 ?>
                                <th style="border:none"><span class="verticalText">% Rotación</span></th>
                                <th style="border:none"><span class="verticalText">Rotación</span></th>
                                <th style="border:none"><span class="verticalText">ClasificacionJ</span></th>
                                <th style="border:none"><span class="verticalText">Clasificacion</span></th>
                            </tr> 

                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
   
</div>
<div class="tab-pane fade" id="pillSanManuel" role="tabpanel">
    <div class="row">
        
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card border-dark mb-3" >
                <div class="card-header">
                    <h3>Productos por Agotarse San Manuel 1
                        <button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#porAgotarseSM1" style="float: right;"><i class="fas fa-minus-square"></i></button>
                    </h3>
                </div>

         
                <div class="card-body collapse table-responsive"  id="porAgotarseSM1">
                    <table class="table table-bordered table-striped dt-responsive tablaPorAgotarseSanManuel1" width="100%" id="porAgotarseSanManuel1" style="border: 2px solid #1F262D">


                        <thead >

                             <?php 
                             if ($_SESSION["grupo"] == "Administrador") {
                                 //$fechaActual = date("Y-m-d");
                                $fechaActual = "2020-08-05";
                                $fechaFinal = date("Y-m-d", strtotime($fechaActual)); 

                                $table = "almacensanmanuel1";
                                $select = "MAX(idImportacion) AS ultimoId";
                                $conditions = "WHERE fecha = '".$fechaFinal."'";
                                $idDisponible = ControladorInventarios::ctrBuscarFolioDisponible($table, $select, $conditions);
                                $ultimoId = $idDisponible["ultimoId"];

                                $tabla = "productos AS p INNER JOIN almacensanmanuel1 AS al ON p.id = al.idProducto";
                                $campos = "SUM(p.stockMinimoGral2) AS totalStockMinimo, SUM(al.existenciasUnidades) AS existenciasUnidades, SUM(al.ultimoCosto) AS ultimoCosto, al.fecha";
                                $parametros = "WHERE al.existenciasUnidades != 0 AND al.idImportacion = ".$ultimoId." AND al.fecha = '".$fechaFinal."'";

                                $totales = ControladorInventarios::ctrMostrarProductosPorAgotarse($tabla, $campos, $parametros);

                               echo '<tr>
                                <th rowspan="2" colspan="3" style="border:none;color: blue;text-align: right;font-size: 15px;">Total General</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Unidades</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Faltante Unidades</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Faltante en Monto</th>
                            </tr>
                            <tr>';
                        
                            
                                    
                                        $ultimoCosto = $totales[0]["ultimoCosto"];
                                        $totalStockMinimo = $totales[0]["totalStockMinimo"];
                                        $totalExistencias = $totales[0]["existenciasUnidades"];
                                        $totalFaltantes = $totalStockMinimo - $totalExistencias;
                                        $totalFaltanteMonto = $ultimoCosto * $totalFaltantes;
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">E '.number_format($totalExistencias,2).' </th>';
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">FU '.number_format($totalFaltantes,2).' </th>';
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">FM '.number_format($totalFaltanteMonto,2).' </th>';
                                   
                                     
                            echo '</tr>';
                        }
                        ?>

                            <tr style="background:#1F262D;color: white">
                                <th style="border:none">#</th>
                                <th style="border:none">Codigo</th>
                                <th style="border:none">Producto</th>
                                <th style="border:none">Stock Minimo</th>
                                <th style="border:none">Existencias</th>
                                <th style="border:none">Faltante Unidades</th>
                                <?php 

                                if ($_SESSION["grupo"] == "Administrador") {
                                    echo '<th style="border:none">Faltante Monto</th>';
                                }else{
                                    
                                }

                                 ?>
                                <th style="border:none">Fecha</th>
                                <th style="border:none">Estado</th>
                            </tr> 

                        </thead>
                        <tfoot>
                               
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card border-dark mb-3" >
                <div class="card-header">
                    <h3>Almacén 1
                        <button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#alSM1" style="float: right;"><i class="fas fa-minus-square"></i> </button>
                    </h3>
                </div>

                <div class="card-body collapse table-responsive"  id="alSM1">

                    <table class="table table-bordered table-striped dt-responsive tablaAlmacenSanManuel1" width="100%" id="almacenSanManuel1" style="border: 2px solid #1F262D">
                        <thead style="background:#1F262D;color: white">

                            <tr>
                                <th style="border:none">#</th>
                                <th style="border:none"><span class="verticalText">Codigo</span></th>
                                <th style="border:none"><span class="verticalText">Producto</span></th>
                                <th style="border:none"><span class="verticalText">Total Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Total Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Total Existencias</span></th>
                                <th style="border:none"><span class="verticalText">Existencias</span></th>
                                <th style="border:none"><span class="verticalText">Stock Minimo</span></th>
                                <th style="border:none"><span class="verticalText">Stock de Seguridad</span></th>
                                <th style="border:none"><span class="verticalText">Stock Maximo</span></th>
                                <?php 

                                if ($_SESSION["grupo"] == "Administrador") {
                                    echo '<th style="border:none"><span class="verticalText">Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Existencias</span></th>';
                                }else{
                                    
                                }

                                 ?>
                                <th style="border:none"><span class="verticalText">% Rotación</span></th>
                                <th style="border:none"><span class="verticalText">Rotación</span></th>
                                <th style="border:none"><span class="verticalText">ClasificacionJ</span></th>
                                <th style="border:none"><span class="verticalText">Clasificacion</span></th>
                            </tr> 

                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card border-dark mb-3" >
                <div class="card-header">
                    <h3>Productos por Agotarse San Manuel 2
                        <button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#porAgotarseSM2" style="float: right;"><i class="fas fa-minus-square"></i></button>
                    </h3>
                </div>
                    
                <div class="card-body collapse table-responsive"  id="porAgotarseSM2">
                    <table class="table table-bordered table-striped dt-responsive tablaPorAgotarseSanManuel2" width="100%" id="porAgotarseSanManuel2" style="border: 2px solid #1F262D">

                        <thead >

                            <?php
                            if ($_SESSION["grupo"] == "Administrador") { 
                                 //$fechaActual = date("Y-m-d");
                                $fechaActual = "2020-08-05";
                                $fechaFinal = date("Y-m-d", strtotime($fechaActual)); 

                                $table = "almacensanmanuel2";
                                $select = "MAX(idImportacion) AS ultimoId";
                                $conditions = "WHERE fecha = '".$fechaFinal."'";
                                $idDisponible = ControladorInventarios::ctrBuscarFolioDisponible($table, $select, $conditions);
                                $ultimoId = $idDisponible["ultimoId"];

                                $tabla = "productos AS p INNER JOIN almacensanmanuel2 AS al ON p.id = al.idProducto";
                                $campos = "SUM(p.stockMinimoGral2) AS totalStockMinimo, SUM(al.existenciasUnidades) AS existenciasUnidades, SUM(al.ultimoCosto) AS ultimoCosto, al.fecha";
                                $parametros = "WHERE al.existenciasUnidades != 0 AND al.idImportacion = ".$ultimoId." AND al.fecha = '".$fechaFinal."'";

                                $totales = ControladorInventarios::ctrMostrarProductosPorAgotarse($tabla, $campos, $parametros);

                                
                        
                                echo '<tr>
                                <th rowspan="2" colspan="3" style="border:none;color: blue;text-align: right;font-size: 15px;">Total General</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Unidades</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Faltante Unidades</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Faltante en Monto</th>
                            </tr>
                            <tr>';
                                    
                                        $ultimoCosto = $totales[0]["ultimoCosto"];
                                        $totalStockMinimo = $totales[0]["totalStockMinimo"];
                                        $totalExistencias = $totales[0]["existenciasUnidades"];
                                        $totalFaltantes = $totalStockMinimo - $totalExistencias;
                                        $totalFaltanteMonto = $ultimoCosto * $totalFaltantes;
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">E '.number_format($totalExistencias,2).' </th>';
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">FU '.number_format($totalFaltantes,2).' </th>';
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">FM '.number_format($totalFaltanteMonto,2).' </th>';
                                   
                                     
                            echo '</tr>';
                        }
                            ?>

                            <tr style="background:#1F262D;color: white">
                                <th style="border:none">#</th>
                                <th style="border:none">Codigo</th>
                                <th style="border:none">Producto</th>
                                <th style="border:none">Stock Minimo</th>
                                <th style="border:none">Existencias</th>
                                <th style="border:none">Faltante Unidades</th>
                                <?php 

                                if ($_SESSION["grupo"] == "Administrador") {
                                    echo '<th style="border:none">Faltante Monto</th>';
                                }else{
                                    
                                }

                                 ?>
                                <th style="border:none">Fecha</th>
                                <th style="border:none">Estado</th>
                            </tr> 

                        </thead>
                        <tfoot>
                                
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card border-dark mb-3" >
                <div class="card-header">
                    <h3>Almacén 2
                        <button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#alSM2" style="float: right;"><i class="fas fa-minus-square"></i> </button>
                    </h3>
                </div>
                <div class="card-body collapse table-responsive"  id="alSM2">
                    <table class="table table-bordered table-striped dt-responsive tablaAlmacenSanManuel2" width="100%" id="almacenSanManuel2" style="border: 2px solid #1F262D">
                        <thead style="background:#1F262D;color: white">

                            <tr>
                                <th style="border:none">#</th>
                                <th style="border:none"><span class="verticalText">Codigo</span></th>
                                <th style="border:none"><span class="verticalText">Producto</span></th>
                                <th style="border:none"><span class="verticalText">Total Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Total Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Total Existencias</span></th>
                                <th style="border:none"><span class="verticalText">Existencias</span></th>
                                <th style="border:none"><span class="verticalText">Stock Minimo</span></th>
                                <th style="border:none"><span class="verticalText">Stock de Seguridad</span></th>
                                <th style="border:none"><span class="verticalText">Stock Maximo</span></th>
                                <?php 

                                if ($_SESSION["grupo"] == "Administrador") {
                                    echo '<th style="border:none"><span class="verticalText">Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Existencias</span></th>';
                                }else{
                                    
                                }

                                 ?>
                                <th style="border:none"><span class="verticalText">% Rotación</span></th>
                                <th style="border:none"><span class="verticalText">Rotación</span></th>
                                <th style="border:none"><span class="verticalText">ClasificacionJ</span></th>
                                <th style="border:none"><span class="verticalText">Clasificacion</span></th>
                            </tr> 

                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane fade" id="pillReforma" role="tabpanel">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card border-dark mb-3" >
                <div class="card-header">
                    <h3>Productos por Agotarse Reforma 1
                        <button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#porAgotarseRF1" style="float: right;"><i class="fas fa-minus-square"></i></button>
                    </h3>
                </div>
                    
                <div class="card-body collapse table-responsive"  id="porAgotarseRF1">
                    <table class="table table-bordered table-striped dt-responsive tablaPorAgotarseReforma1" width="100%" id="porAgotarseReforma1" style="border: 2px solid #1F262D">

                        <thead >

                             <?php 
                             if ($_SESSION["grupo"] == "Administrador") {
                                 //$fechaActual = date("Y-m-d");
                                $fechaActual = "2020-08-05";
                                $fechaFinal = date("Y-m-d", strtotime($fechaActual)); 

                                $table = "almacenreforma1";
                                $select = "MAX(idImportacion) AS ultimoId";
                                $conditions = "WHERE fecha = '".$fechaFinal."'";
                                $idDisponible = ControladorInventarios::ctrBuscarFolioDisponible($table, $select, $conditions);
                                $ultimoId = $idDisponible["ultimoId"];

                                $tabla = "productos AS p INNER JOIN almacenreforma1 AS al ON p.id = al.idProducto";
                                $campos = "SUM(p.stockMinimoGral2) AS totalStockMinimo, SUM(al.existenciasUnidades) AS existenciasUnidades, SUM(al.ultimoCosto) AS ultimoCosto, al.fecha";
                                $parametros = "WHERE al.existenciasUnidades != 0 AND al.idImportacion = ".$ultimoId." AND al.fecha = '".$fechaFinal."'";

                                $totales = ControladorInventarios::ctrMostrarProductosPorAgotarse($tabla, $campos, $parametros);

                            echo '<tr>
                                <th rowspan="2" colspan="3" style="border:none;color: blue;text-align: right;font-size: 15px;">Total General</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Unidades</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Faltante Unidades</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Faltante en Monto</th>
                            </tr>
                            <tr>';
                        
                                        $ultimoCosto = $totales[0]["ultimoCosto"];
                                        $totalStockMinimo = $totales[0]["totalStockMinimo"];
                                        $totalExistencias = $totales[0]["existenciasUnidades"];
                                        $totalFaltantes = $totalStockMinimo - $totalExistencias;
                                        $totalFaltanteMonto = $ultimoCosto * $totalFaltantes;
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">E '.number_format($totalExistencias,2).' </th>';
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">FU '.number_format($totalFaltantes,2).' </th>';
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">FM '.number_format($totalFaltanteMonto,2).' </th>';
                                   
                                     
                            echo '</tr>';
                        }
                            ?>

                            <tr style="background:#1F262D;color: white">
                                <th style="border:none">#</th>
                                <th style="border:none">Codigo</th>
                                <th style="border:none">Producto</th>
                                <th style="border:none">Stock Minimo</th>
                                <th style="border:none">Existencias</th>
                                <th style="border:none">Faltante Unidades</th>
                                <?php 

                                if ($_SESSION["grupo"] == "Administrador") {
                                    echo '<th style="border:none">Faltante Monto</th>';
                                }else{
                                    
                                }

                                 ?>
                                <th style="border:none">Fecha</th>
                                <th style="border:none">Estado</th>
                            </tr> 

                        </thead>
                        <tfoot>
                               
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card border-dark mb-3" >
                <div class="card-header">
                    <h3>Almacén 1
                        <button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#alRF1" style="float: right;"><i class="fas fa-minus-square"></i> </button>
                    </h3>
                </div>
                <div class="card-body collapse table-responsive"  id="alRF1">
                    <table class="table table-bordered table-striped dt-responsive tablaAlmacenReforma1" width="100%" id="almacenReforma1" style="border: 2px solid #1F262D">

                        <thead style="background:#1F262D;color: white">

                            <tr>
                                <th style="border:none">#</th>
                                <th style="border:none"><span class="verticalText">Codigo</span></th>
                                <th style="border:none"><span class="verticalText">Producto</span></th>
                                <th style="border:none"><span class="verticalText">Total Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Total Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Total Existencias</span></th>
                                <th style="border:none"><span class="verticalText">Existencias</span></th>
                                <th style="border:none"><span class="verticalText">Stock Minimo</span></th>
                                <th style="border:none"><span class="verticalText">Stock de Seguridad</span></th>
                                <th style="border:none"><span class="verticalText">Stock Maximo</span></th>
                                <?php 

                                if ($_SESSION["grupo"] == "Administrador") {
                                    echo '<th style="border:none"><span class="verticalText">Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Existencias</span></th>';
                                }else{
                                    
                                }

                                 ?>
                                <th style="border:none"><span class="verticalText">% Rotación</span></th>
                                <th style="border:none"><span class="verticalText">Rotación</span></th>
                                <th style="border:none"><span class="verticalText">ClasificacionJ</span></th>
                                <th style="border:none"><span class="verticalText">Clasificacion</span></th>
                            </tr> 

                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card border-dark mb-3" >
                <div class="card-header">
                    <h3>Productos por Agotarse Reforma 1
                        <button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#porAgotarseRF2" style="float: right;"><i class="fas fa-minus-square"></i></button>
                    </h3>
                </div>
                    
                <div class="card-body collapse table-responsive"  id="porAgotarseRF2">
                    <table class="table table-bordered table-striped dt-responsive tablaPorAgotarseReforma2" width="100%" id="porAgotarseReforma2" style="border: 2px solid #1F262D">

                        <thead >
                            <?php 
                            if ($_SESSION["grupo"] == "Administrador") {
                                 //$fechaActual = date("Y-m-d");
                                $fechaActual = "2020-08-05";
                                $fechaFinal = date("Y-m-d", strtotime($fechaActual)); 

                                $table = "almacenreforma2";
                                $select = "MAX(idImportacion) AS ultimoId";
                                $conditions = "WHERE fecha = '".$fechaFinal."'";
                                $idDisponible = ControladorInventarios::ctrBuscarFolioDisponible($table, $select, $conditions);
                                $ultimoId = $idDisponible["ultimoId"];

                                $tabla = "productos AS p INNER JOIN almacenreforma2 AS al ON p.id = al.idProducto";
                                $campos = "SUM(p.stockMinimoGral2) AS totalStockMinimo, SUM(al.existenciasUnidades) AS existenciasUnidades, SUM(al.ultimoCosto) AS ultimoCosto, al.fecha";
                                $parametros = "WHERE al.existenciasUnidades != 0 AND al.idImportacion = ".$ultimoId." AND al.fecha = '".$fechaFinal."'";

                                $totales = ControladorInventarios::ctrMostrarProductosPorAgotarse($tabla, $campos, $parametros);

                            echo '<tr>
                                <th rowspan="2" colspan="3" style="border:none;color: blue;text-align: right;font-size: 15px;">Total General</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Unidades</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Faltante Unidades</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Faltante en Monto</th>
                            </tr>
                            <tr>';
                            
                                        $ultimoCosto = $totales[0]["ultimoCosto"];
                                        $totalStockMinimo = $totales[0]["totalStockMinimo"];
                                        $totalExistencias = $totales[0]["existenciasUnidades"];
                                        $totalFaltantes = $totalStockMinimo - $totalExistencias;
                                        $totalFaltanteMonto = $ultimoCosto * $totalFaltantes;
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">E '.number_format($totalExistencias,2).' </th>';
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">FU '.number_format($totalFaltantes,2).' </th>';
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">FM '.number_format($totalFaltanteMonto,2).' </th>';
                                   
                                     
                            echo '</tr>';

                        }
                        ?>

                            <tr style="background:#1F262D;color: white">
                                <th style="border:none">#</th>
                                <th style="border:none">Codigo</th>
                                <th style="border:none">Producto</th>
                                <th style="border:none">Stock Minimo</th>
                                <th style="border:none">Existencias</th>
                                <th style="border:none">Faltante Unidades</th>
                                <?php 

                                if ($_SESSION["grupo"] == "Administrador") {
                                    echo '<th style="border:none">Faltante Monto</th>';
                                }else{
                                    
                                }

                                 ?>
                                <th style="border:none">Fecha</th>
                                <th style="border:none">Estado</th>
                            </tr> 

                        </thead>
                        <tfoot>
                                
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card border-dark mb-3" >
                <div class="card-header">
                    <h3>Almacén 2
                        <button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#alRF2" style="float: right;"><i class="fas fa-minus-square"></i> </button>
                    </h3>
                </div>
                <div class="card-body collapse table-responsive"  id="alRF2">
                    <table class="table table-bordered table-striped dt-responsive tablaAlmacenReforma2" width="100%" id="almacenReforma2" style="border: 2px solid #1F262D">

                        <thead style="background:#1F262D;color: white">

                            <tr>
                                <th style="border:none">#</th>
                                <th style="border:none"><span class="verticalText">Codigo</span></th>
                                <th style="border:none"><span class="verticalText">Producto</span></th>
                                <th style="border:none"><span class="verticalText">Total Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Total Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Total Existencias</span></th>
                                <th style="border:none"><span class="verticalText">Existencias</span></th>
                                <th style="border:none"><span class="verticalText">Stock Minimo</span></th>
                                <th style="border:none"><span class="verticalText">Stock de Seguridad</span></th>
                                <th style="border:none"><span class="verticalText">Stock Maximo</span></th>
                                <?php 

                                if ($_SESSION["grupo"] == "Administrador") {
                                    echo '<th style="border:none"><span class="verticalText">Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Existencias</span></th>';
                                }else{
                                    
                                }

                                 ?>
                                <th style="border:none"><span class="verticalText">% Rotación</span></th>
                                <th style="border:none"><span class="verticalText">Rotación</span></th>
                                <th style="border:none"><span class="verticalText">ClasificacionJ</span></th>
                                <th style="border:none"><span class="verticalText">Clasificacion</span></th>
                            </tr>

                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane fade" id="pillSantiago" role="tabpanel">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card border-dark mb-3" >
                <div class="card-header">
                    <h3>Productos por Agotarse Santiago 1
                        <button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#porAgotarseSG1" style="float: right;"><i class="fas fa-minus-square"></i></button>
                    </h3>
                </div>
                    
                <div class="card-body collapse table-responsive"  id="porAgotarseSG1">
                    <table class="table table-bordered table-striped dt-responsive tablaPorAgotarseSantiago1" width="100%" id="porAgotarseSantiago1" style="border: 2px solid #1F262D">

                        <thead >
                            <?php 
                            if ($_SESSION["grupo"] == "Administrador") {
                                 //$fechaActual = date("Y-m-d");
                                $fechaActual = "2020-08-05";
                                $fechaFinal = date("Y-m-d", strtotime($fechaActual)); 

                                $table = "almacensantiago1";
                                $select = "MAX(idImportacion) AS ultimoId";
                                $conditions = "WHERE fecha = '".$fechaFinal."'";
                                $idDisponible = ControladorInventarios::ctrBuscarFolioDisponible($table, $select, $conditions);
                                $ultimoId = $idDisponible["ultimoId"];

                                $tabla = "productos AS p INNER JOIN almacensantiago1 AS al ON p.id = al.idProducto";
                                $campos = "SUM(p.stockMinimoGral2) AS totalStockMinimo, SUM(al.existenciasUnidades) AS existenciasUnidades, SUM(al.ultimoCosto) AS ultimoCosto, al.fecha";
                                $parametros = "WHERE al.existenciasUnidades != 0 AND al.idImportacion = ".$ultimoId." AND al.fecha = '".$fechaFinal."'";

                                $totales = ControladorInventarios::ctrMostrarProductosPorAgotarse($tabla, $campos, $parametros);

                            echo ' <tr>
                                <th rowspan="2" colspan="3" style="border:none;color: blue;text-align: right;font-size: 15px;">Total General</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Unidades</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Faltante Unidades</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Faltante en Monto</th>
                            </tr>
                            <tr>';
                                        $ultimoCosto = $totales[0]["ultimoCosto"];
                                        $totalStockMinimo = $totales[0]["totalStockMinimo"];
                                        $totalExistencias = $totales[0]["existenciasUnidades"];
                                        $totalFaltantes = $totalStockMinimo - $totalExistencias;
                                        $totalFaltanteMonto = $ultimoCosto * $totalFaltantes;
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">E '.number_format($totalExistencias,2).' </th>';
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">FU '.number_format($totalFaltantes,2).' </th>';
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">FM '.number_format($totalFaltanteMonto,2).' </th>';
                                   
                                     
                            echo '</tr>';
                        }
                        ?>

                            <tr style="background:#1F262D;color: white">
                                <th style="border:none">#</th>
                                <th style="border:none">Codigo</th>
                                <th style="border:none">Producto</th>
                                <th style="border:none">Stock Minimo</th>
                                <th style="border:none">Existencias</th>
                                <th style="border:none">Faltante Unidades</th>
                                <?php 

                                if ($_SESSION["grupo"] == "Administrador") {
                                    echo '<th style="border:none">Faltante Monto</th>';
                                }else{
                                    
                                }

                                 ?>
                                <th style="border:none">Fecha</th>
                                <th style="border:none">Estado</th>
                            </tr> 

                        </thead>
                        <tfoot>
                                
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card border-dark mb-3" >
                <div class="card-header">
                    <h3>Almacén 1
                        <button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#alSG1" style="float: right;"><i class="fas fa-minus-square"></i> </button>
                    </h3>
                </div>
                <div class="card-body collapse table-responsive"  id="alSG1">
    
                    <table class="table table-bordered table-striped dt-responsive tablaAlmacenSantiago1" width="100%" id="almacenSantiago1" style="border: 2px solid #1F262D">
                        <thead style="background:#1F262D;color: white">

                            <tr>
                                <th style="border:none">#</th>
                                <th style="border:none"><span class="verticalText">Codigo</span></th>
                                <th style="border:none"><span class="verticalText">Producto</span></th>
                                <th style="border:none"><span class="verticalText">Total Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Total Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Total Existencias</span></th>
                                <th style="border:none"><span class="verticalText">Existencias</span></th>
                                <th style="border:none"><span class="verticalText">Stock Minimo</span></th>
                                <th style="border:none"><span class="verticalText">Stock de Seguridad</span></th>
                                <th style="border:none"><span class="verticalText">Stock Maximo</span></th>
                                <?php 

                                if ($_SESSION["grupo"] == "Administrador") {
                                    echo '<th style="border:none"><span class="verticalText">Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Existencias</span></th>';
                                }else{
                                    
                                }

                                 ?>
                                <th style="border:none"><span class="verticalText">% Rotación</span></th>
                                <th style="border:none"><span class="verticalText">Rotación</span></th>
                                <th style="border:none"><span class="verticalText">ClasificacionJ</span></th>
                                <th style="border:none"><span class="verticalText">Clasificacion</span></th>
                            </tr> 

                        </thead>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card border-dark mb-3" >
                <div class="card-header">
                    <h3>Productos por Agotarse Santiago 1
                        <button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#porAgotarseSG2" style="float: right;"><i class="fas fa-minus-square"></i></button>
                    </h3>
                </div>
                    
                <div class="card-body collapse table-responsive"  id="porAgotarseSG2">
                    <table class="table table-bordered table-striped dt-responsive tablaPorAgotarseSantiago2" width="100%" id="porAgotarseSantiago2" style="border: 2px solid #1F262D">

                        <thead>
                            <?php 
                            if ($_SESSION["grupo"] == "Administrador") {
                                 //$fechaActual = date("Y-m-d");
                                $fechaActual = "2020-08-05";
                                $fechaFinal = date("Y-m-d", strtotime($fechaActual)); 

                                $table = "almacensantiago2";
                                $select = "MAX(idImportacion) AS ultimoId";
                                $conditions = "WHERE fecha = '".$fechaFinal."'";
                                $idDisponible = ControladorInventarios::ctrBuscarFolioDisponible($table, $select, $conditions);
                                $ultimoId = $idDisponible["ultimoId"];

                                $tabla = "productos AS p INNER JOIN almacensantiago2 AS al ON p.id = al.idProducto";
                                $campos = "SUM(p.stockMinimoGral2) AS totalStockMinimo, SUM(al.existenciasUnidades) AS existenciasUnidades, SUM(al.ultimoCosto) AS ultimoCosto, al.fecha";
                                $parametros = "WHERE al.existenciasUnidades != 0 AND al.idImportacion = ".$ultimoId." AND al.fecha = '".$fechaFinal."'";

                                $totales = ControladorInventarios::ctrMostrarProductosPorAgotarse($tabla, $campos, $parametros);

                            echo '<tr>
                                <th rowspan="2" colspan="3" style="border:none;color: blue;text-align: right;font-size: 15px;">Total General</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Unidades</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Faltante Unidades</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Faltante en Monto</th>
                            </tr>
                            <tr>';
                                        $ultimoCosto = $totales[0]["ultimoCosto"];
                                        $totalStockMinimo = $totales[0]["totalStockMinimo"];
                                        $totalExistencias = $totales[0]["existenciasUnidades"];
                                        $totalFaltantes = $totalStockMinimo - $totalExistencias;
                                        $totalFaltanteMonto = $ultimoCosto * $totalFaltantes;
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">E '.number_format($totalExistencias,2).' </th>';
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">FU '.number_format($totalFaltantes,2).' </th>';
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">FM '.number_format($totalFaltanteMonto,2).' </th>';
                                   
                                     
                            echo '</tr>';

                        }
                        ?>

                            <tr style="background:#1F262D;color: white">
                                <th style="border:none">#</th>
                                <th style="border:none">Codigo</th>
                                <th style="border:none">Producto</th>
                                <th style="border:none">Stock Minimo</th>
                                <th style="border:none">Existencias</th>
                                <th style="border:none">Faltante Unidades</th>
                                <?php 

                                if ($_SESSION["grupo"] == "Administrador") {
                                    echo '<th style="border:none">Faltante Monto</th>';
                                }else{
                                    
                                }

                                 ?>
                                <th style="border:none">Fecha</th>
                                <th style="border:none">Estado</th>
                            </tr> 

                        </thead>
                        <tfoot>
                                
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card border-dark mb-3" >
                <div class="card-header">
                    <h3>Almacén 2
                        <button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#alSG2" style="float: right;"><i class="fas fa-minus-square"></i> </button>
                    </h3>
                </div>
                <div class="card-body collapse table-responsive"  id="alSG2">
                    <table class="table table-bordered table-striped dt-responsive tablaAlmacenSantiago2" width="100%" id="almacenSantiago2" style="border: 2px solid #1F262D">

                        <thead style="background:#1F262D;color: white">
                            <tr>
                                <th style="border:none">#</th>
                                <th style="border:none"><span class="verticalText">Codigo</span></th>
                                <th style="border:none"><span class="verticalText">Producto</span></th>
                                <th style="border:none"><span class="verticalText">Total Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Total Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Total Existencias</span></th>
                                <th style="border:none"><span class="verticalText">Existencias</span></th>
                                <th style="border:none"><span class="verticalText">Stock Minimo</span></th>
                                <th style="border:none"><span class="verticalText">Stock de Seguridad</span></th>
                                <th style="border:none"><span class="verticalText">Stock Maximo</span></th>
                                <?php 

                                if ($_SESSION["grupo"] == "Administrador") {
                                    echo '<th style="border:none"><span class="verticalText">Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Existencias</span></th>';
                                }else{
                                    
                                }

                                 ?>
                                <th style="border:none"><span class="verticalText">% Rotación</span></th>
                                <th style="border:none"><span class="verticalText">Rotación</span></th>
                                <th style="border:none"><span class="verticalText">ClasificacionJ</span></th>
                                <th style="border:none"><span class="verticalText">Clasificacion</span></th>
                            </tr>

                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane fade" id="pillCapu" role="tabpanel">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card border-dark mb-3" >
                <div class="card-header">
                    <h3>Productos por Agotarse Capu 1
                        <button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#porAgotarseCP1" style="float: right;"><i class="fas fa-minus-square"></i></button>
                    </h3>
                </div>
                    
                <div class="card-body collapse table-responsive"  id="porAgotarseCP1">
                    <table class="table table-bordered table-striped dt-responsive tablaPorAgotarseCapu1" width="100%" id="porAgotarseCapu1" style="border: 2px solid #1F262D">

                        <thead>
                            <?php 
                            if ($_SESSION["grupo"] == "Administrador") {
                                 //$fechaActual = date("Y-m-d");
                                $fechaActual = "2020-08-05";
                                $fechaFinal = date("Y-m-d", strtotime($fechaActual)); 

                                $table = "almacencapu1";
                                $select = "MAX(idImportacion) AS ultimoId";
                                $conditions = "WHERE fecha = '".$fechaFinal."'";
                                $idDisponible = ControladorInventarios::ctrBuscarFolioDisponible($table, $select, $conditions);
                                $ultimoId = $idDisponible["ultimoId"];

                                $tabla = "productos AS p INNER JOIN almacencapu1 AS al ON p.id = al.idProducto";
                                $campos = "SUM(p.stockMinimoGral2) AS totalStockMinimo, SUM(al.existenciasUnidades) AS existenciasUnidades, SUM(al.ultimoCosto) AS ultimoCosto, al.fecha";
                                $parametros = "WHERE al.existenciasUnidades != 0 AND al.idImportacion = ".$ultimoId." AND al.fecha = '".$fechaFinal."'";

                                $totales = ControladorInventarios::ctrMostrarProductosPorAgotarse($tabla, $campos, $parametros);

                            echo '<tr>
                                <th rowspan="2" colspan="3" style="border:none;color: blue;text-align: right;font-size: 15px;">Total General</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Unidades</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Faltante Unidades</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Faltante en Monto</th>
                            </tr>
                            <tr>';
                                        $ultimoCosto = $totales[0]["ultimoCosto"];
                                        $totalStockMinimo = $totales[0]["totalStockMinimo"];
                                        $totalExistencias = $totales[0]["existenciasUnidades"];
                                        $totalFaltantes = $totalStockMinimo - $totalExistencias;
                                        $totalFaltanteMonto = $ultimoCosto * $totalFaltantes;
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">E '.number_format($totalExistencias,2).' </th>';
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">FU '.number_format($totalFaltantes,2).' </th>';
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">FM '.number_format($totalFaltanteMonto,2).' </th>';
                                   
                                     
                            echo '</tr>';
                        }
                        ?>

                            <tr style="background:#1F262D;color: white">
                                <th style="border:none">#</th>
                                <th style="border:none">Codigo</th>
                                <th style="border:none">Producto</th>
                                <th style="border:none">Stock Minimo</th>
                                <th style="border:none">Existencias</th>
                                <th style="border:none">Faltante Unidades</th>
                                <?php 

                                if ($_SESSION["grupo"] == "Administrador") {
                                    echo '<th style="border:none">Faltante Monto</th>';
                                }else{
                                    
                                }

                                 ?>
                                <th style="border:none">Fecha</th>
                                <th style="border:none">Estado</th>
                            </tr> 

                        </thead>
                        <tfoot>
                                
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card border-dark mb-3" >
                <div class="card-header">
                    <h3>Almacén 1
                        <button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#alCP1" style="float: right;"><i class="fas fa-minus-square"></i> </button>
                    </h3>
                </div>
                <div class="card-body collapse table-responsive"  id="alCP1">
                    <table class="table table-bordered table-striped dt-responsive tablaAlmacenCapu1" width="100%" id="almacenCapu1" style="border: 2px solid #1F262D">

                         <thead style="background:#1F262D;color: white">
                            <tr>
                                <th style="border:none">#</th>
                                <th style="border:none"><span class="verticalText">Codigo</span></th>
                                <th style="border:none"><span class="verticalText">Producto</span></th>
                                <th style="border:none"><span class="verticalText">Total Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Total Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Total Existencias</span></th>
                                <th style="border:none"><span class="verticalText">Existencias</span></th>
                                <th style="border:none"><span class="verticalText">Stock Minimo</span></th>
                                <th style="border:none"><span class="verticalText">Stock de Seguridad</span></th>
                                <?php 

                                if ($_SESSION["grupo"] == "Administrador") {
                                    echo '<th style="border:none"><span class="verticalText">Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Existencias</span></th>';
                                }else{
                                    
                                }

                                 ?>
                                <th style="border:none"><span class="verticalText">Existencias</span></th>
                                <th style="border:none"><span class="verticalText">% Rotación</span></th>
                                <th style="border:none"><span class="verticalText">Rotación</span></th>
                                <th style="border:none"><span class="verticalText">ClasificacionJ</span></th>
                                <th style="border:none"><span class="verticalText">Clasificacion</span></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card border-dark mb-3" >
                <div class="card-header">
                    <h3>Productos por Agotarse Capu 2
                        <button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#porAgotarseCP2" style="float: right;"><i class="fas fa-minus-square"></i></button>
                    </h3>
                </div>
                    
                <div class="card-body collapse table-responsive"  id="porAgotarseCP2">
                    <table class="table table-bordered table-striped dt-responsive tablaPorAgotarseCapu2" width="100%" id="porAgotarseCapu2" style="border: 2px solid #1F262D">

                        <thead>
                             <?php 
                              if ($_SESSION["grupo"] == "Administrador") {
                                 //$fechaActual = date("Y-m-d");
                                $fechaActual = "2020-08-05";
                                $fechaFinal = date("Y-m-d", strtotime($fechaActual)); 

                                $table = "almacencapu2";
                                $select = "MAX(idImportacion) AS ultimoId";
                                $conditions = "WHERE fecha = '".$fechaFinal."'";
                                $idDisponible = ControladorInventarios::ctrBuscarFolioDisponible($table, $select, $conditions);
                                $ultimoId = $idDisponible["ultimoId"];

                                $tabla = "productos AS p INNER JOIN almacencapu2 AS al ON p.id = al.idProducto";
                                $campos = "SUM(p.stockMinimoGral2) AS totalStockMinimo, SUM(al.existenciasUnidades) AS existenciasUnidades, SUM(al.ultimoCosto) AS ultimoCosto, al.fecha";
                                $parametros = "WHERE al.existenciasUnidades != 0 AND al.idImportacion = ".$ultimoId." AND al.fecha = '".$fechaFinal."'";

                                $totales = ControladorInventarios::ctrMostrarProductosPorAgotarse($tabla, $campos, $parametros);

                            echo '<tr>
                                <th rowspan="2" colspan="3" style="border:none;color: blue;text-align: right;font-size: 15px;">Total General</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Unidades</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Faltante Unidades</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Faltante en Monto</th>
                            </tr>
                            <tr>';
                                        $ultimoCosto = $totales[0]["ultimoCosto"];
                                        $totalStockMinimo = $totales[0]["totalStockMinimo"];
                                        $totalExistencias = $totales[0]["existenciasUnidades"];
                                        $totalFaltantes = $totalStockMinimo - $totalExistencias;
                                        $totalFaltanteMonto = $ultimoCosto * $totalFaltantes;
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">E '.number_format($totalExistencias,2).' </th>';
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">FU '.number_format($totalFaltantes,2).' </th>';
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">FM '.number_format($totalFaltanteMonto,2).' </th>';
                                   
                                     
                            echo '</tr>';
                        }
                        ?>

                            <tr style="background:#1F262D;color: white">
                                <th style="border:none">#</th>
                                <th style="border:none">Codigo</th>
                                <th style="border:none">Producto</th>
                                <th style="border:none">Stock Minimo</th>
                                <th style="border:none">Existencias</th>
                                <th style="border:none">Faltante Unidades</th>
                                <?php 

                                if ($_SESSION["grupo"] == "Administrador") {
                                    echo '<th style="border:none">Faltante Monto</th>';
                                }else{
                                    
                                }

                                 ?>
                                <th style="border:none">Fecha</th>
                                <th style="border:none">Estado</th>
                            </tr> 

                        </thead>
                        <tfoot>
                               
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card border-dark mb-3" >
                <div class="card-header">
                    <h3>Almacén 2
                        <button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#alCP2" style="float: right;"><i class="fas fa-minus-square"></i> </button>
                    </h3>
                </div>
                <div class="card-body collapse table-responsive"  id="alCP2">
                    <table class="table table-bordered table-striped dt-responsive tablaAlmacenCapu2" width="100%" id="almacenCapu2" style="border: 2px solid #1F262D">

                        <thead style="background:#1F262D;color: white">
                            <tr>
                                <th style="border:none">#</th>
                                <th style="border:none"><span class="verticalText">Codigo</span></th>
                                <th style="border:none"><span class="verticalText">Producto</span></th>
                                <th style="border:none"><span class="verticalText">Total Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Total Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Total Existencias</span></th>
                                <th style="border:none"><span class="verticalText">Existencias</span></th>
                                <th style="border:none"><span class="verticalText">Stock Minimo</span></th>
                                <th style="border:none"><span class="verticalText">Stock de Seguridad</span></th>
                                <th style="border:none"><span class="verticalText">Stock Maximo</span></th>
                                <?php 

                                if ($_SESSION["grupo"] == "Administrador") {
                                    echo '<th style="border:none"><span class="verticalText">Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Existencias</span></th>';
                                }else{
                                    
                                }

                                 ?>
                                <th style="border:none"><span class="verticalText">% Rotación</span></th>
                                <th style="border:none"><span class="verticalText">Rotación</span></th>
                                <th style="border:none"><span class="verticalText">ClasificacionJ</span></th>
                                <th style="border:none"><span class="verticalText">Clasificacion</span></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane fade" id="pillTorres" role="tabpanel">
    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card border-dark mb-3" >
                <div class="card-header">
                    <h3>Productos por Agotarse Torres 1
                        <button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#porAgotarseTR1" style="float: right;"><i class="fas fa-minus-square"></i></button>
                    </h3>
                </div>
                    
                <div class="card-body collapse table-responsive"  id="porAgotarseTR1">
                    <table class="table table-bordered table-striped dt-responsive tablaPorAgotarseLasTorres1" width="100%" id="porAgotarseLasTorres1" style="border: 2px solid #1F262D">

                        <thead>
                            <?php 

                            if ($_SESSION["grupo"] == "Administrador") {
                                 //$fechaActual = date("Y-m-d");
                                $fechaActual = "2020-08-05";
                                $fechaFinal = date("Y-m-d", strtotime($fechaActual)); 

                                $table = "almacenlastorres1";
                                $select = "MAX(idImportacion) AS ultimoId";
                                $conditions = "WHERE fecha = '".$fechaFinal."'";
                                $idDisponible = ControladorInventarios::ctrBuscarFolioDisponible($table, $select, $conditions);
                                $ultimoId = $idDisponible["ultimoId"];

                                $tabla = "productos AS p INNER JOIN almacenlastorres1 AS al ON p.id = al.idProducto";
                                $campos = "SUM(p.stockMinimoGral2) AS totalStockMinimo, SUM(al.existenciasUnidades) AS existenciasUnidades, SUM(al.ultimoCosto) AS ultimoCosto, al.fecha";
                                $parametros = "WHERE al.existenciasUnidades != 0 AND al.idImportacion = ".$ultimoId." AND al.fecha = '".$fechaFinal."'";

                                $totales = ControladorInventarios::ctrMostrarProductosPorAgotarse($tabla, $campos, $parametros);

                            echo '<tr>
                                <th rowspan="2" colspan="3" style="border:none;color: blue;text-align: right;font-size: 15px;">Total General</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Unidades</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Faltante Unidades</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Faltante en Monto</th>
                            </tr>
                            <tr>';
                                        $ultimoCosto = $totales[0]["ultimoCosto"];
                                        $totalStockMinimo = $totales[0]["totalStockMinimo"];
                                        $totalExistencias = $totales[0]["existenciasUnidades"];
                                        $totalFaltantes = $totalStockMinimo - $totalExistencias;
                                        $totalFaltanteMonto = $ultimoCosto * $totalFaltantes;
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">E '.number_format($totalExistencias,2).' </th>';
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">FU '.number_format($totalFaltantes,2).' </th>';
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">FM '.number_format($totalFaltanteMonto,2).' </th>';
                                   
                                     
                            echo '</tr>';
                        }
                        ?>

                            <tr style="background:#1F262D;color: white">
                                <th style="border:none">#</th>
                                <th style="border:none">Codigo</th>
                                <th style="border:none">Producto</th>
                                <th style="border:none">Stock Minimo</th>
                                <th style="border:none">Existencias</th>
                                <th style="border:none">Faltante Unidades</th>
                                <?php 

                                if ($_SESSION["grupo"] == "Administrador") {
                                    echo '<th style="border:none">Faltante Monto</th>';
                                }else{
                                    
                                }

                                 ?>
                                <th style="border:none">Fecha</th>
                                <th style="border:none">Estado</th>
                            </tr> 

                        </thead>
                        <tfoot>
                                
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card border-dark mb-3" >
                <div class="card-header">
                    <h3>Almacén 1
                        <button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#alTR1" style="float: right;"><i class="fas fa-minus-square"></i> </button>
                    </h3>
                </div>
                <div class="card-body collapse table-responsive"  id="alTR1">
                    <table class="table table-bordered table-striped dt-responsive tablaAlmacenLasTorres1" width="100%" id="almacenLasTorres1" style="border: 2px solid #1F262D">

                        <thead style="background:#1F262D;color: white">
                            <tr>
                                <th style="border:none">#</th>
                                <th style="border:none"><span class="verticalText">Codigo</span></th>
                                <th style="border:none"><span class="verticalText">Producto</span></th>
                                <th style="border:none"><span class="verticalText">Total Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Total Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Total Existencias</span></th>
                                <th style="border:none"><span class="verticalText">Existencias</span></th>
                                <th style="border:none"><span class="verticalText">Stock Minimo</span></th>
                                <th style="border:none"><span class="verticalText">Stock de Seguridad</span></th>
                                <th style="border:none"><span class="verticalText">Stock Maximo</span></th>
                                <?php 

                                if ($_SESSION["grupo"] == "Administrador") {
                                    echo '<th style="border:none"><span class="verticalText">Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Existencias</span></th>';
                                }else{
                                    
                                }

                                 ?>
                                <th style="border:none"><span class="verticalText">% Rotación</span></th>
                                <th style="border:none"><span class="verticalText">Rotación</span></th>
                                <th style="border:none"><span class="verticalText">ClasificacionJ</span></th>
                                <th style="border:none"><span class="verticalText">Clasificacion</span></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card border-dark mb-3" >
                <div class="card-header">
                    <h3>Productos por Agotarse Torres 2
                        <button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#porAgotarseTR2" style="float: right;"><i class="fas fa-minus-square"></i></button>
                    </h3>
                </div>
                    
                <div class="card-body collapse table-responsive"  id="porAgotarseTR2">
                    <table class="table table-bordered table-striped dt-responsive tablaPorAgotarseLasTorres2" width="100%" id="porAgotarseLasTorres2" style="border: 2px solid #1F262D">

                        <thead>
                            <?php 
                            if ($_SESSION["grupo"] == "Administrador") {
                                 //$fechaActual = date("Y-m-d");
                                $fechaActual = "2020-08-05";
                                $fechaFinal = date("Y-m-d", strtotime($fechaActual)); 

                                $table = "almacenlastorres2";
                                $select = "MAX(idImportacion) AS ultimoId";
                                $conditions = "WHERE fecha = '".$fechaFinal."'";
                                $idDisponible = ControladorInventarios::ctrBuscarFolioDisponible($table, $select, $conditions);
                                $ultimoId = $idDisponible["ultimoId"];

                                $tabla = "productos AS p INNER JOIN almacenlastorres2 AS al ON p.id = al.idProducto";
                                $campos = "SUM(p.stockMinimoGral2) AS totalStockMinimo, SUM(al.existenciasUnidades) AS existenciasUnidades, SUM(al.ultimoCosto) AS ultimoCosto, al.fecha";
                                $parametros = "WHERE al.existenciasUnidades != 0 AND al.idImportacion = ".$ultimoId." AND al.fecha = '".$fechaFinal."'";

                                $totales = ControladorInventarios::ctrMostrarProductosPorAgotarse($tabla, $campos, $parametros);
                        
                            echo '<tr >
                                <th rowspan="2" colspan="3" style="border:none;color: blue;text-align: right;font-size: 15px;">Total General</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Unidades</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Faltante Unidades</th>
                                <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Faltante en Monto</th>
                            </tr>
                            <tr>';
                                    
                                        $ultimoCosto = $totales[0]["ultimoCosto"];
                                        $totalStockMinimo = $totales[0]["totalStockMinimo"];
                                        $totalExistencias = $totales[0]["existenciasUnidades"];
                                        $totalFaltantes = $totalStockMinimo - $totalExistencias;
                                        $totalFaltanteMonto = $ultimoCosto * $totalFaltantes;
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">E '.number_format($totalExistencias,2).' </th>';
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">FU '.number_format($totalFaltantes,2).' </th>';
                                        echo '<th colspan="2" style="border:none;color: blue;text-align:right;">FM '.number_format($totalFaltanteMonto,2).' </th>';
                            echo '</tr>';
                        }
                        ?>
                            <tr style="background:#1F262D;color: white">
                                <th style="border:none">#</th>
                                <th style="border:none">Codigo</th>
                                <th style="border:none">Producto</th>
                                <th style="border:none">Stock Minimo</th>
                                <th style="border:none">Existencias</th>
                                <th style="border:none">Faltante Unidades</th>
                                <?php 

                                if ($_SESSION["grupo"] == "Administrador") {
                                    echo '<th style="border:none">Faltante Monto</th>';
                                }else{
                                    
                                }

                                 ?>
                                <th style="border:none">Fecha</th>
                                <th style="border:none">Estado</th>
                            </tr> 

                        </thead>
                        <tfoot>
                                
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card border-dark mb-3" >
                <div class="card-header">
                    <h3>Almacén 2
                        <button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#alTR1" style="float: right;"><i class="fas fa-minus-square"></i> </button>
                    </h3>
                </div>
                <div class="card-body collapse table-responsive"  id="alTR1">
                    <table class="table table-bordered table-striped dt-responsive tablaAlmacenLasTorres2" width="100%" id="almacenLasTorres2" style="border: 2px solid #1F262D">

                        <thead style="background:#1F262D;color: white">
                            <tr>
                                <th style="border:none">#</th>
                                <th style="border:none"><span class="verticalText">Codigo</span></th>
                                <th style="border:none"><span class="verticalText">Producto</span></th>
                                <th style="border:none"><span class="verticalText">Total Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Total Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Total Existencias</span></th>
                                <th style="border:none"><span class="verticalText">Existencias</span></th>
                                <th style="border:none"><span class="verticalText">Stock Minimo</span></th>
                                <th style="border:none"><span class="verticalText">Stock de Seguridad</span></th>
                                <th style="border:none"><span class="verticalText">Stock Maximo</span></th>
                                <?php 

                                if ($_SESSION["grupo"] == "Administrador") {
                                    echo '<th style="border:none"><span class="verticalText">Entradas</span></th>
                                <th style="border:none"><span class="verticalText">Salidas</span></th>
                                <th style="border:none"><span class="verticalText">Existencias</span></th>';
                                }else{
                                    
                                }

                                 ?>
                                <th style="border:none"><span class="verticalText">% Rotación</span></th>
                                <th style="border:none"><span class="verticalText">Rotación</span></th>
                                <th style="border:none"><span class="verticalText">ClasificacionJ</span></th>
                                <th style="border:none"><span class="verticalText">Clasificacion</span></th>
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

</div>

</div>
<script type="text/javascript">
    $(document).ready(function(){

        var sesion = localStorage.idSesion;
        if (sesion == 5 || sesion == 6 || sesion == 7 || sesion == 8 || sesion == 9) {

            switch (sesion) {
            case "5":
                var clase = "pillSanManuel";
                var elemento = "tabSanManuel";
                break;
            case "6":
                var clase = "pillSantiago";
                var elemento = "tabSantiago";
                break;
            case "7":
                var clase = "pillTorres";
                var elemento = "tabTorres";
                break;
            case "8":
                var clase = "pillReforma";
                var elemento = "tabReforma";
                break;
            case "9":
                var clase = "pillCapu";
                var elemento = "tabCapu";
                break;
            default:

                break;
           
        }
        var pilla = document.getElementById(""+clase+"");
        pilla.setAttribute("class", "show active");

        }
        


    })
</script>