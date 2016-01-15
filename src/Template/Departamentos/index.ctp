<?php $this->Html->addCrumb('Departamentos', ['controller' => 'Departamentos', 'action' => 'index']); ?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Departamentos</h1>
    </div>
</div>

<div class="row pull-right row-margin">
    <div class="col-lg-12">
        <?php echo $this->Html->link('<button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> A&ntilde;adir departamento</button> ','/departamentos/form',array('escapeTitle'=>false)); ?>
    </div>
</div>
<br /><br />

<!-- LISTADO -->
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-primary">
            
            <div class="panel-heading">
                <i class="fa fa-institution fa-fw"></i> Listado de departamentos
            </div>
        
            <div class="panel-body">
                <div class="dataTable_wrapper">                                                            
                    <table class="dataTables table table-striped table-bordered table-hover" >
                        <thead>                            
                            <tr>
                                <th >Id</th> 
                            	<th>Nombre</th>
                            	<th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>                                                
                            <?php foreach ($departamentos as $departamento): ?>
                                <tr>
                                    <td><?= $departamento->id; ?></td>
                                    <td><?= $this->Html->link($departamento->nombre,['action'=>'form',$departamento->id]); ?></td>
                                	<td class="actions">
                                        <?= $this->Html->link($this->Html->image('edit.png',array('title'=>'Editar')),'/departamentos/form/' . $departamento->id,array('escapeTitle'=>false) ); ?>                                        
                                        <?= $this->Form->postLink($this->Html->image('cross.png',array('title'=>'Borrar')),['action' => 'delete', $departamento->id],['confirm' => 'Estas seguro de borrar este registro?','escapeTitle'=>false]); ?> 
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
