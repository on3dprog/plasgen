<?php $this->Html->addCrumb('Usuarios', ['controller' => 'Clientes', 'action' => 'index']); ?>
<?php if(isset($id)){ ?>
    <?php $this->Html->addCrumb('Editar cliente', ['controller' => 'Clientes', 'action' => 'form']); ?>
<?php }else{ ?>
    <?php $this->Html->addCrumb('Añadir cliente', ['controller' => 'Clientes', 'action' => 'form']); ?>
<?php } ?>

<?php if(!isset($id)){ //------------ AÑADIR ------------------- ?>
    
    <div class="row">
        <h1 class="page-header">Añadir cliente</h1>    
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <h3>Datos del cliente</h3>
                <p>Nombre, apellido_1, apellido_2,</p>
            </div>
        </div>
    </div>
    
    
<?php }else{ //------------ EDITAR -------------------  ?>

    <div class="row">
        <h1 class="page-header">Editar cliente</h1>    
    </div>
    
    <input type="text" name="seccion_activa" value="variable oculta para indicar seccion" />
    
    <div class="row">
        <div class="col-md-12">            
            
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#datos">Datos cliente</a></li>
                    <li><a href="#comercial">Ficha comercial</a></li>                
                    <li><a href="#pedidos">Pedidos</a></li>
                    <li><a href="#facturacion">Facturación</a></li>
                    <li><a href="#direcciones">Direcciones</a></li>
                    <li><a href="#seguros">Seguros</a></li>                
                    <li><a href="#historico">Histórico</a></li>
                </ul>
            
                <div class="tab-content">
                
                    <?php /******************************************************/ ?>
                    <?php /*************** DATOS PERSONALES *********************/ ?>
                    <?php /******************************************************/ ?>
                    
                    <div id="datos" class="tab-pane fade in active">
                        <h3>Datos del cliente</h3>
                        <p>Nombre, apellido_1, apellido_2,</p>
                    </div>
                    
                    <?php /******************************************************/ ?>
                    <?php /*************** COMERCIAL ****************************/ ?>
                    <?php /******************************************************/ ?>
                    <div id="comercial" class="tab-pane fade">
                        <h3>Ficha comercial</h3>
                        <p>Descuentos, tipos de facturacion</p>
                    </div>
                                                    
                    <?php /******************************************************/ ?>
                    <?php /*************** PEDIDOS ******************************/ ?>
                    <?php /******************************************************/ ?>
                                    
                    <div id="pedidos" class="tab-pane fade">
                        <h3>Pedidos</h3>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-primary">
                                                                
                                    <div class="panel-body">
                                        <div class="dataTable_wrapper">                                                            
                                            <table class="dataTables table table-striped table-bordered table-hover" >
                                                <thead>                            
                                                    <tr>
                                                        <th>Ref</th>
                                                        <th>Nombre</th>
                                                        <th>Rev.Comercial</th>
                                                    	<th>Cambio</th>                                                    
                                                    </tr>
                                                </thead>
                                                <tbody>                                                
                                                    <?php foreach ($pedidos as $pedido): ?>
                                                        <tr>                                                        
                                                            <td style="width: 100px;"><?php //$historico->created->format('d-m-Y'); ?></td>
                                                            <td style="width: 150px;"><?= $historico->user->username; ?></td>
                                                            <td><?= $historico->cambio; ?></td>                                    
                                                        </tr>
                                                    <?php endforeach; ?>                                            
                                                </tbody>
                                            </table>
                                        </div>                
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <?php /******************************************************/ ?>
                    <?php /*************** FACTURACIÓN **************************/ ?>
                    <?php /******************************************************/ ?>
                    
                    <div id="facturacion" class="tab-pane fade">
                        <h3>Facturación</h3>
                        <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div>
                                    
                    <?php /******************************************************/ ?>
                    <?php /*************** DIRECCIONES  *************************/ ?>
                    <?php /******************************************************/ ?>
                    
                    <div id="direcciones" class="tab-pane fade">
                        <h3>Direcciones del cliente</h3>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-primary">
                                                                
                                    <div class="panel-body">
                                        <div class="dataTable_wrapper">                                                            
                                            <table class="dataTables table table-striped table-bordered table-hover" >
                                                <thead>                            
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Tipo</th>
                                                    	<th>Dirección</th>
                                                        <th>CP</th>
                                                        <th>Población</th>
                                                    	<th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>                                                
                                                    <?php foreach ($direcciones as $direccion): ?>
                                                        <tr>
                                                            <td><?= $direccion->id; ?></td>
                                                            <td><?= $direccion->direccion; ?></td>
                                                            <td><?= $cliente->cp; ?></td>
                                                            <td><?= $cliente->poblacion; ?></td>                                                        
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
                    </div>
                    
                    <?php /******************************************************/ ?>
                    <?php /*************** SEGUROS ******************************/ ?>
                    <?php /******************************************************/ ?>
                                    
                    <div id="seguros" class="tab-pane fade">
                        <h3>Seguros</h3>
                        <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div>
                    
                    
                    
                    <?php /******************************************************/ ?>
                    <?php /*************** HISTORICO ****************************/ ?>
                    <?php /******************************************************/ ?>
                    
                    <div id="historico" class="tab-pane fade">
                    
                        <h3>Histórico</h3>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-primary">
                                                                
                                    <div class="panel-body">
                                        <div class="dataTable_wrapper">                                                            
                                            <table class="dataTables table table-striped table-bordered table-hover" >
                                                <thead>                            
                                                    <tr>
                                                        <th>Fecha</th>
                                                        <th>Usuario</th>
                                                    	<th>Cambio</th>                                                    
                                                    </tr>
                                                </thead>
                                                <tbody>                                                
                                                    <?php foreach ($historicos as $historico): ?>
                                                        <tr>                                                        
                                                            <td style="width: 100px;"><?= $historico->created->format('d-m-Y'); ?></td>
                                                            <td style="width: 150px;"><?= $historico->user->username; ?></td>
                                                            <td><?= $historico->cambio; ?></td>                                    
                                                        </tr>
                                                    <?php endforeach; ?>                                            
                                                </tbody>
                                            </table>
                                        </div>                
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <?php /******************************************************/ ?>
                    <?php /******************************************************/ ?>
                    
                </div> <!-- FIN tab-content -->
            
                
                <?= $this->Form->create($cliente,['action'=>'form']) ?>
                
                <div class="panel-body">
                                          
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= $this->Form->input('nombre',array('label'=>false,'class'=>'form-control','placeHolder'=>__('Nombre'))) ?>
                            </div>
                        </div>
                    </div>
                                    
                </div>
                
                <div class="panel-footer">
                    <?= $this->Form->button(__('Guardar')); ?> 
                </div>
                    
                <?= $this->Form->end() ?>
                
        </div>
    </div>
       
    <script>
        $(document).ready(function(){
            $(".nav-tabs a").click(function(){
                $(this).tab('show');
                $("#seccion_activa").value('1');
            });
            
            $('.nav-tabs a[href="#historico"]').tab('show');
        });
    </script>   

<?php } ?>