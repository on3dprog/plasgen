<?php $this->Html->addCrumb('Articulos', ['controller' => 'Articulos', 'action' => 'index']); ?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Articulos</h1>
    </div>
</div>

<div class="row pull-right row-margin">
    <div class="col-lg-12">
        <?php echo $this->Html->link('<button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> A&ntilde;adir articulo</button> ','/articulos/form',array('escapeTitle'=>false)); ?>
    </div>
</div>
<br /><br />

<!-- LISTADO -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            
            <div class="panel-heading">
                <i class="fa fa-th-list fa-fw"></i> Listado de articulos
            </div>
        
            <div class="panel-body">
                <div class="dataTable_wrapper">                                                            
                    <table class="dataTables table table-striped table-bordered table-hover" >
                        <thead>                            
                            <tr>
                                <th>Ref</th>
                            	<th>Nombre</th>
                                <th width="80">Formato</th>
                                <th>Tipo</th>
                                <th>Anchura</th>
                                <th>Plegado</th>
                                <th>Grosor</th>
                            	<th width="80">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>                                                
                            <?php foreach ($articulos as $articulo): ?>
                                <tr>
                                    <td><?= $articulo->referencia; ?></td>
                                    <td><?= $this->Html->link($articulo->nombre,['action'=>'form',$articulo->id]); ?></td>
                                    <td class="ac"><?= $articulo->formato; ?></td>
                                    <td class="ac"><?= $articulo->tipo; ?></td>
                                    <td class="ar"><?= $articulo->anchura; ?> cm</td>
                                    <td class="ar"><?= $articulo->plegado; ?> cm</td>
                                    <td class="ar"><?= $articulo->grosor; ?></td>
                                	<td class="actions">
                                        <?= $this->Html->link($this->Html->image('edit.png',array('title'=>'Editar')),'/articulos/form/' . $articulo->id,array('escapeTitle'=>false) ); ?>                                        
                                        <?= $this->Form->postLink($this->Html->image('cross.png',array('title'=>'Borrar')),['action' => 'delete', $articulo->id],['confirm' => 'Estas seguro de borrar este registro?','escapeTitle'=>false]); ?> 
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