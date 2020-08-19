<aside class="left-sidebar" data-sidebarbg="skin5">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">

                <?php 

                    if ($_SESSION["grupo"] == "Administrador") {
                        echo'<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Tablero</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="listaRequisiciones" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Requisiciones</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="crearPedido" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Crear Pedido</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="misRecordatorios" aria-expanded="false"><i class="mdi mdi-calendar-clock"></i><span class="hide-menu">Mis Recordatorios</span></a></li>
                            
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="importaciones" aria-expanded="false"><i class="mdi mdi-calendar-clock"></i><span class="hide-menu">Importación de Inventarios</span></a></li>
                           
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="existenciasGenerales" aria-expanded="false"><i class="mdi mdi-search-web"></i><span class="hide-menu">Existencias Generales</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="configuraciones" aria-expanded="false"><i class="mdi mdi-settings-box"></i><span class="hide-menu">Configuración</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="fisicoVSadmin" aria-expanded="false"><i class="mdi mdi-compare"></i><span class="hide-menu">Inventario Fisico</span></a></li>';

                            if ($_SESSION["perfil"] == "Administrador General") {
                               echo '<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="administradores" aria-expanded="false"><i class="mdi mdi-account-settings-variant"></i><span class="hide-menu"> Usuarios</span></a></li>';
                            }else{
                                
                            }
                            
                            
                    }else{
                        echo '
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Inicio</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="requisiciones" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Requisiciones</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="crearPedido" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Crear Pedido</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="miCalendario" aria-expanded="false"><i class="mdi mdi-calendar-clock"></i><span class="hide-menu">Mis Recordatorios</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pedidoSemanal" aria-expanded="false" sucursal="'.$_SESSION["nombre"].'"><i class="mdi mdi-clipboard-outline"></i><span class="hide-menu">Pedido Semanal</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="importaciones" aria-expanded="false"><i class="mdi mdi-calendar-clock"></i><span class="hide-menu">Importación de Inventarios</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="fisicoVSadmin" aria-expanded="false"><i class="mdi mdi-compare"></i><span class="hide-menu">Inventario Fisico</span></a></li>

                       
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="existenciasGenerales" aria-expanded="false"><i class="mdi mdi-search-web"></i><span class="hide-menu">Existencias Generales</span></a></li>
                        ';
                    }
                ?>
                     
             </ul>
        </nav>
    </div>
</aside>
<!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="fisicoVSadmin" aria-expanded="false"><i class="mdi mdi-compare"></i><span class="hide-menu">Fisico VS Admin</span></a></li>-->