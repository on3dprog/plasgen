<?php $this->Html->addCrumb('Planificación', ['controller' => 'Planificacions', 'action' => 'index']); ?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Planificación por maquina</h1>
    </div>
</div>

<div class="row pull-right row-margin">
    <div class="col-lg-12">
        <strong><?= date('d/m/Y H:i'); ?></strong>
        <?php //echo $this->Html->link('<button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> A&ntilde;adir Maquina</button> ','/producciones/form_maquinas',array('escapeTitle'=>false)); ?>
    </div>
</div>
<br />

<div class="row">

    <?php //----- ORDENES SIN ASIGNAR ----- ?>
    <div class="col-lg-3">
        <div class="panel panel-primary">
        
            <div class="panel-heading">
                <i class="fa fa-wrench fa-fw"></i> Pendientes
            </div>
            <?php //pr($pendientes); ?>
            <div class="panel-body">
                <div class="dataTable_wrapper">                                                            
                    <?php $count=0; ?>
                    <table class="dataTables table table-striped table-bordered table-hover" >
                        <thead>                            
                            <tr>
                                <th>Artículo</th>
                                <th>OF</th> 
                                <th>OM</th>
                                <th>Duración</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <?php foreach ($pendientes as $pendiente){ ?>
                                
                                <tr>                                    
                                    <td><?= $pendiente->pedidos_articulo->articulo->nombre; ?></td>
                                    <td><?= $pendiente->OF; ?></td>
                                    <td><?= $pendiente->OM; ?></td>
                                    <td><?= $pendiente->duracion->format('H:i'); ?></td>
                                </tr>                                
            
                            <?php } ?>
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="panel panel-primary">
        
            <div class="panel-heading">
                <i class="fa fa-wrench fa-fw"></i> Extrusora 1
            </div>

            <div class="panel-body">
                <div class="dataTable_wrapper">                                                            
                    <?php $count=0; ?>
                    <table class="dataTables table table-striped table-bordered table-hover" >
                        <thead>                            
                            <tr>
                                <th>Artículo</th>
                                <th>OF</th> 
                                <th>OM</th>
                                <th>F.inicio</th>
                                <th>F.fin</th>
                                <th>Duración</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <?php foreach ($planificadas as $planificada){ ?>
                                
                                <tr>
                                    <td><?= $planificada->ordene->pedidos_articulo->articulo->nombre; ?></td>
                                    <td><?= $planificada->ordene->OF; ?></td>
                                    <td><?= $planificada->ordene->OM; ?></td>
                                    <td><?= $planificada->fecha_inicio->format('d/m H:i'); ?></td>
                                    <td><?= $planificada->fecha_fin->format('d/m H:i'); ?></td>
                                    <td><?= $planificada->ordene->duracion->format('H:i'); ?></td>                              	                                   
                                </tr>                                
            
                            <?php } ?>
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>   
    


</div>
