<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">

            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>

            <a class="navbar-brand" href="index.html">
            
                <b class="logo-icon p-l-10">
                 
                    <img src="vistas/assets/images/logo-icon.png" alt="homepage" class="light-logo" />

                </b>
      
                <span class="logo-text">

                </span>

            </a>

            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>
 
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
          
            <ul class="navbar-nav float-left mr-auto">
                <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
           
                
        </ul>
  
        <ul class="navbar-nav float-right">
      
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-bell font-24"></i>
                </a>
                 <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
                    <ul class="list-style-none">
                        <li>
                            <div class="">
                             <!-- Message -->
                             <a href="javascript:void(0)" class="link border-top">
                                <div class="d-flex no-block align-items-center p-10">
                                    <span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
                                    <div class="m-l-10">
                                        <h5 class="m-b-0">Importacion</h5> 
                                        <span class="mail-desc">Se importó el inventario del almacén 1 de San Manuel</span> 
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="link border-top">
                                <div class="d-flex no-block align-items-center p-10">
                                    <span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
                                    <div class="m-l-10">
                                        <h5 class="m-b-0">Importacion</h5> 
                                        <span class="mail-desc">Se importó el inventario del almacén 2 de San Manuel</span> 
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="link border-top">
                                <div class="d-flex no-block align-items-center p-10">
                                    <span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
                                    <div class="m-l-10">
                                        <h5 class="m-b-0">Importacion</h5> 
                                        <span class="mail-desc">Se importó el inventario del almacén 1 de Capu </span> 
                                    </div>
                                </div>
                            </a>
                             <a href="javascript:void(0)" class="link border-top">
                                <div class="d-flex no-block align-items-center p-10">
                                    <span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
                                    <div class="m-l-10">
                                        <h5 class="m-b-0">Importacion</h5> 
                                        <span class="mail-desc">Se importó el inventario del almacén 2 de Capu </span> 
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="link border-top">
                                <div class="d-flex no-block align-items-center p-10">
                                    <span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
                                    <div class="m-l-10">
                                        <h5 class="m-b-0">Importacion</h5> 
                                        <span class="mail-desc">Se importó el inventario del almacén 1 de Santiago</span> 
                                    </div>
                                </div>
                            </a>

                        </div>
                    </li>
                </ul>
            </div>
                
            </li>
          

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php  echo'
                <img src="vistas/assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>';?>
            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                
                <?php

                if($_SESSION["foto"] == ""){

                    echo '<a class="dropdown-item" href="javascript:void(0)">
                    <img src="vistas/img/users/default/anonymous.png" class="rounded-circle" width="31" alt="User Images">
                    <span class="hidden-xs">&nbsp;';echo($_SESSION["nombre"]);echo'</span></a>';

                }else{

                    echo '<a class="dropdown-item" href="javascript:void(0)">
                    <img src="'.$_SESSION["foto"].'" class="rounded-circle" width="31" alt="User Image"><span class="hidden-xs">&nbsp;';
                    echo($_SESSION["nombre"]);echo'</span></a>';

                }


                ?>  
                <div class="p-l-30 p-30">
                    <strong style="margin-left: 10px;"><?php echo $_SESSION["perfil"]; ?></strong>
                    <a href="salir" class="btn btn-sm btn-danger btn-rounded" style="float: right; margin-right: 10px;"><i class="fa fa-power-off m-r-10 m-l-10"></i>  Salir</a></div>
            </div>
        </li>
   
    </ul>
</div>
</nav>
</header>