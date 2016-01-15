<?php $this->Html->addCrumb('Clientes', ['controller' => 'Clientes', 'action' => 'index']); ?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Clientes</h1>
    </div>
</div>

<div class="row pull-right row-margin">
    <div class="col-lg-12">
        <?php echo $this->Html->link('<button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> A&ntilde;adir cliente</button> ','/clientes/form',array('escapeTitle'=>false)); ?>
    </div>
</div>
<br /><br />

<!-- LISTADO -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            
            <div class="panel-heading">
                <i class="fa fa-institution fa-fw"></i> Listado de clientes
            </div>
        
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="dataTables table table-striped table-bordered table-hover" >
                        <thead>                            
                            <tr>
                                <th>Id</th>
                            	<th>Nombre</th>
                                <th>Direxxx</th>                                
                            	<th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>                                                
                            <?php foreach ($clientes as $cliente): ?>
                                <tr>
                                    <td><?= $cliente->id; ?></td>
                                    <td><?= $cliente->nombre; ?></td>
                                    <td><?= $cliente->telefono; ?></td>
                                    <td><?= $this->Html->link($cliente->nombre,['action'=>'form',$cliente->id]); ?></td>
                                	<td class="actions">
                                        <?= $this->Html->link($this->Html->image('edit.png',array('title'=>'Editar')),'/clientes/form/' . $cliente->id,array('escapeTitle'=>false) ); ?>                                        
                                        <?= $this->Form->postLink($this->Html->image('cross.png',array('title'=>'Borrar')),['action' => 'delete', $cliente->id],['confirm' => 'Estas seguro de borrar este registro?','escapeTitle'=>false]); ?> 
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