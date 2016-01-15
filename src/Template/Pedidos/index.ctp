<?php $this->Html->addCrumb('Pedidos', ['controller' => 'Pedidos', 'action' => 'index']); ?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Pedidos</h1>
    </div>
</div>

<div class="row pull-right row-margin">
    <div class="col-lg-12">
        <?php echo $this->Html->link('<button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> A&ntilde;adir pedido</button> ','/pedidos/form',array('escapeTitle'=>false)); ?>
    </div>
</div>
<br /><br />

<!-- LISTADO -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            
            <div class="panel-heading">
                <i class="fa fa-shopping-cart fa-fw"></i> Listado de pedidos
            </div>
            <div class="panel-body">
                <div class="dataTable_wrapper">                                                            
                    <table class="dataTables table table-striped table-bordered table-hover" >
                        <thead>                            
                            <tr>
                                <th>Id</th>
                            	<th>Cliente</th>
                                <th>Referencia</th>
                                <th>R.Comercial</th>
                                <th>R.Riesgos</th>
                                <th>R.Producción</th>
                                <th>Activo?</th>
                            	<th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>                                                
                            <?php foreach ($pedidos as $pedido): ?>
                                <tr>
                                    <td><?= $pedido->id; ?></td>
                                    <td><?= $this->Html->link($pedido->nombre,['action'=>'form',$pedido->id]); ?></td>
                                    <td><?= $pedido->referencia; ?></td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                	<td class="actions">
                                        <?= $this->Html->link($this->Html->image('edit.png',array('title'=>'Editar')),'/pedidos/form/' . $pedido->id,array('escapeTitle'=>false) ); ?>                                        
                                        <?= $this->Html->link($this->Html->image('pdf.png',array('title'=>'PDF')),'/pedidos/pedidopdf/pedido_' . $pedido->id.".pdf",array('escapeTitle'=>false,'target'=>'_blank') ); ?>
                                        <?= $this->Form->postLink($this->Html->image('cross.png',array('title'=>'Borrar')),['action' => 'delete', $pedido->id],['confirm' => 'Estas seguro de borrar este registro?','escapeTitle'=>false]); ?> 
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