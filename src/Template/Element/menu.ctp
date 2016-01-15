<div class="navbar-default sidebar" role="navigation">                            
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
        
            <!-- BUSCADOR GENERAL -->
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Buscar...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                </div>
            </li>
            
            <li><?php echo $this->Html->link('<i class="fa fa-home fa-fw"></i> Inicio', '/',array('escapeTitle'=>false));?></li>                            
            <li><?php echo $this->Html->link('<i class="fa fa-users"></i> Clientes', '/clientes/index/',array('escapeTitle'=>false));?></li>
            <li><?php echo $this->Html->link('<i class="fa fa-cubes"></i> Pedidos', '/pedidos/index/',array('escapeTitle'=>false));?></li>
            <li>
                <?php echo $this->Html->link('<i class="fa fa-gears fa-fw"></i> Producción', '/producciones/index_ordenes/',array('escapeTitle'=>false));?>
                <ul class="nav nav-second-level">                    
                    <li><?php echo $this->Html->link('<i class="fa fa-steam fa-fw"></i> Fabricación', '/producciones/index_ordenes/',array('escapeTitle'=>false));?></li>
                    <li><?php echo $this->Html->link('<i class="fa glyphicon-time fa-fw"></i> Planificador', '/planificacions/index/',array('escapeTitle'=>false));?></li>
                    <li><?php echo $this->Html->link('<i class="fa fa-bar-chart-o fa-fw"></i> Tipos de artículo', '/articulos/index/',array('escapeTitle'=>false));?></li>
                    <li>
                        <?php echo $this->Html->link('<i class="fa fa-th-list fa-fw"></i> Parámetros', '/producciones/index_maquinas/',array('escapeTitle'=>false));?>                    
                        <ul class="nav nav-third-level">
                            <?php echo $this->Html->link('<i class="fa fa-wrench fa-fw"></i> Máquinas', '/producciones/index_maquinas/',array('escapeTitle'=>false));?>    
                        </ul>
                    </li>                                            
                </ul>
            </li>
            <li><?php echo $this->Html->link('<i class="fa fa-th-list fa-fw"></i>&nbsp;Ajustes', '/users/index/',array('escapeTitle'=>false));?>                                                    
                <ul class="nav nav-second-level">
                    <li><?php echo $this->Html->link('<i class="fa fa-user fa-fw"></i> Lista de usuarios', '/users/index/',array('escapeTitle'=>false));?></li>
                    <li><?php echo $this->Html->link('<i class="fa fa-institution fa-fw"></i> Departamentos', '/departamentos/index/',array('escapeTitle'=>false));?></li>                   
                </ul>
            </li>							
        </ul>
    </div>
</div>