<?php $this->Html->addCrumb('Produccion', ['controller' => 'Produccion', 'action' => 'index']); ?>
<?php $this->Html->addCrumb('Maquinas', ['controller' => 'Maquinas', 'action' => 'index']); ?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Maquinas</h1>
    </div>
</div>

<div class="row pull-right row-margin">
    <div class="col-lg-12">
        <?php echo $this->Html->link('<button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> A&ntilde;adir Maquina</button> ','/producciones/form_maquinas',array('escapeTitle'=>false)); ?>
    </div>
</div>
<br /><br />

<!-- LISTADO -->
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-primary">
            
            <div class="panel-heading">
                <i class="fa fa-wrench fa-fw"></i> Listado de Maquinas
            </div>
        
            <div class="panel-body">
                <div class="dataTable_wrapper">                                                            
                    <?php $count=0; ?>
                    <table class="dataTables table table-striped table-bordered table-hover" >
                        <thead>                            
                            <tr>
                                <th>Id</th> 
                                <th>Tipo</th>
                            	<th>Nombre</th>
                            	<th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>                        
                                                
                            <?php foreach ($maquinas as $maquina): ?>
                                <tr class="<?php $count++; if(($count & 1)==0){ echo 'even'; }else{ echo 'odd'; } ?>">
                                    <td><?= $maquina->id; ?></td>
                                    <td><?= $maquina->tipo; ?></td>
                                    <td><?= $this->Html->link($maquina->nombre,'/producciones/form_maquinas/'.$maquina->id); ?></td>
                                	<td class="actions">
                                        <?= $this->Html->link($this->Html->image('edit.png',array('title'=>'Editar')),'/producciones/form_maquinas/' . $maquina->id,array('escapeTitle'=>false) ); ?>                                        
                                        <?= $this->Form->postLink($this->Html->image('cross.png',array('title'=>'Borrar')),['action' => 'deleteMaquinas', $maquina->id],['confirm' => 'Estas seguro de borrar este registro?','escapeTitle'=>false])
            ?>
                                        
                                        
                                	</td>                                    
                                </tr>
                            <?php endforeach; ?>
                        
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>
