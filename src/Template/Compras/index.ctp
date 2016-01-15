<?php $this->Html->addCrumb('Compras', ['controller' => 'Compras', 'action' => 'index']); ?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Compras</h1>
    </div>
</div>

<div class="row pull-right row-margin">
    <div class="col-lg-12">
        <?php echo $this->Html->link('<button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> A&ntilde;adir compra</button> ','/compras/form',array('escapeTitle'=>false)); ?>
    </div>
</div>
<br /><br />

<!-- LISTADO -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            
            <div class="panel-heading">
                <i class="fa fa-institution fa-fw"></i> Listado de compras
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
                            <?php foreach ($compras as $compra): ?>
                                <tr>
                                    <td><?= $compra->id; ?></td>
                                    <td><?= $this->Html->link($compra->nombre,['action'=>'form',$compra->id]); ?></td>
                                	<td class="actions">
                                        <?= $this->Html->link($this->Html->image('edit.png',array('title'=>'Editar')),'/compras/form/' . $compra->id,array('escapeTitle'=>false) ); ?>                                        
                                        <?= $this->Form->postLink($this->Html->image('cross.png',array('title'=>'Borrar')),['action' => 'delete', $compra->id],['confirm' => 'Estas seguro de borrar este registro?','escapeTitle'=>false]); ?> 
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