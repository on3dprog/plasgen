<?php $this->Html->addCrumb('Usuarios', ['controller' => 'Pedidos', 'action' => 'index']); ?>
<?php if(isset($id)){ ?>
    <?php $this->Html->addCrumb('Editar pedido', ['controller' => 'Pedidos', 'action' => 'form']); ?>
<?php }else{ ?>
    <?php $this->Html->addCrumb('Añadir pedido', ['controller' => 'Pedidos', 'action' => 'form']); ?>
<?php } ?>

<div class="row">
    <h1 class="page-header">Añadir pedido</h1>    
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            
            <div class="panel-heading">
                <h3 class="panel-title">Pedidos</h3>
            </div>
            
            <?= $this->Form->create($pedido,['action'=>'form']) ?>
            
            <div class="panel-body">
                 
                <div class="row">
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            Autocomplete
                            <?= $this->Form->input('nombre',array('label'=>'Nombre del cliente','class'=>'form-control','placeHolder'=>__('Escriba el nombre del cliente'))) ?>
                        </div>
                    </div>
                </div> 
                                      
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <?= $this->Form->input('referencia',array('label'=>false,'class'=>'form-control','placeHolder'=>__('Referencia'))) ?>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <?= $this->Form->input('nombre',array('label'=>'Añadir artículos al pedido','class'=>'form-control','placeHolder'=>__('Escriba el nombre del artículo'))) ?>
                        </div>
                    </div>
                </div>
                
                <div class="row" id="carrito">
                    *** AQUI SE AÑADIRÁN LOS ARTÍCULOS AL PEDIDO ***
                </div>
                                
            </div>
            
            <div class="panel-footer">
                <?= $this->Form->button(__('Guardar')); ?> 
            </div>
                
            <?= $this->Form->end() ?>
            
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
        
            <ul class="nav nav-tabs">
                <li class="active"><a href="#caracteristicas">Características</a></li>
                <li><a href="#fases">Fases</a></li>
                <li><a href="#componentes">Componentes</a></li>
                <li><a href="#cliente">Cliente</a></li>                
                <li><a href="#historico">Histórico</a></li>
            </ul>
        
            <div class="tab-content">
            
                <?php /******************************************************/ ?>
                <?php /*************** CARACTERÍSTICAS  *********************/ ?>
                <?php /******************************************************/ ?>
                
                <div id="caracteristicas" class="tab-pane fade in active">
                    <h3>Características</h3>
                    
                    <div class="col-md-4">//TODO
                        <?php
                        $this->Form->addWidget(
                                'autocomplete', ['Autocomplete', 'App\View\Widget\Autocomplete']
                        );
                        $options = array("Arena", "Bambu", "Canela", "Perlita");
                        echo $this->Form->input('School', ['type' => 'autocomplete']);
                        echo $this->Form->input('search', ['type' => 'autocomplete', 'label' => 'School *', 'id' => 'school', 'required' => true, 'placeholder' => 'School']);
                        echo $this->Form->autocomplete('search', $options);
                        ?>
                    </div>
                    
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
                                                <?php /* foreach ($historicos as $historico): ?>
                                                    <tr>                                                        
                                                        <td style="width: 100px;"><?= $historico->created->format('d-m-Y'); ?></td>
                                                        <td style="width: 150px;"><?= $historico->user->username; ?></td>
                                                        <td><?= $historico->cambio; ?></td>                                    
                                                    </tr>
                                                <?php endforeach; */ ?>                                            
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
        </div> <!-- FIN panel -->
            
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