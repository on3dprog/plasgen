<?php $this->Html->addCrumb('Fabricacions', ['controller' => 'Fabricacions', 'action' => 'index']); ?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Ordenes de Fabricacion</h1>
    </div>
</div>

<div class="row pull-right row-margin">
    <div class="col-lg-12">
        <?php echo $this->Html->link('<button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> A&ntilde;adir fabricacion</button> ','/fabricacions/form',array('escapeTitle'=>false)); ?>
    </div>
</div>
<br /><br />

<!-- LISTADO -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            
            <div class="panel-heading">
                <i class="fa fa-institution fa-fw"></i> Listado de fabricacions
            </div>
        
            <div class="panel-body">
                <div class="dataTable_wrapper">                                                            
                    <table class="dataTables table table-striped table-bordered table-hover" >
                        <thead>                            
                            <tr>
                                <th>Id</th>
                            	<th>Nombre</th>
                            	<th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>                                                
                            <?php foreach ($fabricacions as $fabricacion): ?>
                                <tr>
                                    <td><?= $fabricacion->id; ?></td>
                                    <td><?= $this->Html->link($fabricacion->nombre,['action'=>'form',$fabricacion->id]); ?></td>
                                	<td class="actions">
                                        <?= $this->Html->link($this->Html->image('edit.png',array('title'=>'Editar')),'/fabricacions/form/' . $fabricacion->id,array('escapeTitle'=>false) ); ?>                                        
                                        <?= $this->Form->postLink($this->Html->image('cross.png',array('title'=>'Borrar')),['action' => 'delete', $fabricacion->id],['confirm' => 'Estas seguro de borrar este registro?','escapeTitle'=>false]); ?> 
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