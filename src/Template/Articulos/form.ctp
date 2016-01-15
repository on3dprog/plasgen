<?php $this->Html->addCrumb('Artículos', ['controller' => 'Articulos', 'action' => 'index']); ?>
<?php if(isset($id)){ ?>
    <?php $this->Html->addCrumb('Editar articulo', ['controller' => 'Articulos', 'action' => 'form']); ?>
<?php }else{ ?>
    <?php $this->Html->addCrumb('Añadir articulo', ['controller' => 'Articulos', 'action' => 'form']); ?>
<?php } ?>

<?php if(!isset($id)){ //------------ AÑADIR ------------------- ?>
    
    <div class="row">
        <h1 class="page-header">Añadir artículo</h1>    
    </div>
    
    <div class="row">
        <div class="col-md-12">
        
            <?= $this->Form->create($articulo,['action'=>'form']) ?>
            
            <div class="panel panel-primary">
            
                <div class="panel-heading">
                    <h3 class="panel-title">Datos del artículo</h3>
                </div>
                
                <div class="panel-body">
                
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <?= $this->Form->input('referencia',array('label'=>false,'class'=>'form-control','placeHolder'=>__('Referencia'))) ?>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <?= $this->Form->input('nombre',array('label'=>false,'class'=>'form-control','placeHolder'=>__('Nombre'))) ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <?= $this->Form->input('formato',array('label'=>false,'type'=>'select','class'=>'form-control','placeHolder'=>__('Formato'))) ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <?= $this->Form->input('tipo',array('label'=>false,'type'=>'select','class'=>'form-control','placeHolder'=>__('Tipo'))) ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <?= $this->Form->input('anchura',array('label'=>false,'class'=>'form-control','placeHolder'=>__('Anchura (cm)'))) ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <?= $this->Form->input('longitud',array('label'=>false,'class'=>'form-control','placeHolder'=>__('Longitud (cm)'))) ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <?= $this->Form->input('plegado',array('label'=>false,'class'=>'form-control','placeHolder'=>__('Plegado (cm)'))) ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <?= $this->Form->input('grosor',array('label'=>false,'class'=>'form-control','placeHolder'=>__('Grosor'))) ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        
                        <div class="col-md-2">
                            <div class="form-group">
                                <?= $this->Form->input('peso_bobina',array('label'=>false,'class'=>'form-control','placeHolder'=>__('Peso bobina'))) ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <?= $this->Form->input('tubo',array('label'=>false,'class'=>'form-control','placeHolder'=>__('Tubo'))) ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <?= $this->Form->input('peso_tubo',array('label'=>false,'class'=>'form-control','placeHolder'=>__('Peso tubo'))) ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <?= $this->Form->input('color',array('label'=>false,'class'=>'form-control','placeHolder'=>__('Color'))) ?>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="row">
                    
                        <div class="col-md-2">
                            <div class="form-group">
                                <?= $this->Form->input('tratado',array('label'=>'Tratado','type' => 'checkbox')) ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <?= $this->Form->input('tintado',array('label'=>'Tintado','type' => 'checkbox')) ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <?= $this->Form->input('refilado',array('label'=>'Refilado','type' => 'checkbox')) ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <?= $this->Form->input('microperforado',array('label'=>'Microperforado','type' => 'checkbox')) ?>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= $this->Form->input('observaciones',array('label'=>false,'type' => 'textarea','class'=>'form-control','placeHolder'=>__('Observaciones'))) ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <div class="panel-footer">
                    <?= $this->Form->button(__('Guardar y continuar')); ?> 
                </div>
                    
                <?= $this->Form->end() ?>
                
            </div>
        </div>
    </div>
        
    
<?php //------------------------------------------------------------------ ?>
<?php //---------------------------- EDITAR ------------------------------ ?>    
<?php //------------------------------------------------------------------ ?>
<?php }else{   ?>

    <div class="row">
        <h1 class="page-header">Editar artículo</h1>
    </div>
    
    <div class="row">
        <div class="col-md-12">            
            
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#caracteristicas" onclick="$('#tabactiva').val('caracteristicas');">Características</a></li>
                    <li><a href="#componentes" onclick="$('#tabactiva').val('componentes');">Componentes</a></li>
                </ul>
                
                <?= $this->Form->create($articulo,['action'=>'form']) ?>
                
                <div class="tab-content">
                
                    <?php /******************************************************/ ?>
                    <?php /*************** CARACTERÍSTICAS **********************/ ?>
                    <?php /******************************************************/ ?>
                    
                    <div id="caracteristicas" class="tab-pane fade in active">
                        <h3>Características</h3>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?= $this->Form->input('referencia',array('label'=>false,'class'=>'form-control','placeHolder'=>__('Referencia'))) ?>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <?= $this->Form->input('nombre',array('label'=>false,'class'=>'form-control','placeHolder'=>__('Nombre'))) ?>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?= $this->Form->input('formato',array('label'=>false,'type'=>'select','class'=>'form-control','placeHolder'=>__('Formato'))) ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?= $this->Form->input('tipo',array('label'=>false,'type'=>'select','class'=>'form-control','placeHolder'=>__('Tipo'))) ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?= $this->Form->input('anchura',array('label'=>false,'class'=>'form-control','placeHolder'=>__('Anchura (cm)'))) ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?= $this->Form->input('longitud',array('label'=>false,'class'=>'form-control','placeHolder'=>__('Longitud (cm)'))) ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?= $this->Form->input('plegado',array('label'=>false,'class'=>'form-control','placeHolder'=>__('Plegado (cm)'))) ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?= $this->Form->input('grosor',array('label'=>false,'class'=>'form-control','placeHolder'=>__('Grosor'))) ?>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="row">                                
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?= $this->Form->input('peso_bobina',array('label'=>false,'class'=>'form-control','placeHolder'=>__('Peso bobina'))) ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?= $this->Form->input('tubo',array('label'=>false,'class'=>'form-control','placeHolder'=>__('Tubo'))) ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?= $this->Form->input('peso_tubo',array('label'=>false,'class'=>'form-control','placeHolder'=>__('Peso tubo'))) ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?= $this->Form->input('color',array('label'=>false,'class'=>'form-control','placeHolder'=>__('Color'))) ?>
                                    </div>
                                </div>                                
                            </div>
                        
                        <div class="row">                        
                            <div class="col-md-2">
                                <div class="form-group">
                                    <?= $this->Form->input('tratado',array('label'=>'Tratado','type' => 'checkbox')) ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <?= $this->Form->input('tintado',array('label'=>'Tintado','type' => 'checkbox')) ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <?= $this->Form->input('refilado',array('label'=>'Refilado','type' => 'checkbox')) ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <?= $this->Form->input('microperforado',array('label'=>'Microperforado','type' => 'checkbox')) ?>
                                </div>
                            </div>                            
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= $this->Form->input('observaciones',array('label'=>false,'type' => 'textarea','class'=>'form-control','placeHolder'=>__('Observaciones'))) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php /******************************************************/ ?>
                    <?php /*************** COMPONENTES **************************/ ?>
                    <?php /******************************************************/ ?>
                    <div id="componentes" class="tab-pane fade">
                        <h3>Componentes</h3>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-primary">
                                                                
                                    <div class="panel-body">
                                        <div class="dataTable_wrapper">                                                                                            
                                            <table class="dataTables table table-striped table-bordered table-hover" >
                                                <thead>                            
                                                    <tr>
                                                        <th>Componente</th>
                                                        <th>Nombre</th>
                                                        <th>Cantidad teórica</th>
                                                    	<th>% Capa A</th>
                                                        <th>% Capa B</th>
                                                        <th>% Capa C</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($componentes as $componente): ?>
                                                        <tr>
                                                            <td><?= $componente->mprima->id; ?></td>                           
                                                            <td><?= $componente->mprima->nombre; ?></td>
                                                            <td class="ar"><?= number_format($componente->cantidad,2); ?></td>
                                                            <td class="ar"><?= number_format($componente->capa_a,2); ?></td>
                                                            <td class="ar"><?= number_format($componente->capa_b,2); ?></td>
                                                            <td class="ar"><?= number_format($componente->capa_c,2); ?></td>
                                                            <td class="ac">xxx</td>
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
                
                
                <?= $this->form->hidden('redireccion',array('id'=>'redireccion','value'=>0)); ?>
                <?= $this->form->hidden('tabactiva',array('id'=>'tabactiva','value'=>"caracteristicas")); ?>
                
                <div class="panel-footer">
                    <?= $this->Form->button(__('Guardar y cerrar')); ?>&nbsp;&nbsp;
                    <?= $this->Form->button(__('Guardar y continuar'),array("onclick"=>"$('#redireccion').val(1);")); ?>
                </div>
                    
                <?= $this->Form->end() ?>
                
        </div>
    </div>
       
    <script>
        $(document).ready(function(){
            $(".nav-tabs a").click(function(){
                $(this).tab('show');
            });
            
            //REDIRECCIONAMOS A LA TAB ACTIVA
            var ancla = window.location.hash.substring(1);            
            $('.nav-tabs a[href="#'+ancla+'"]').tab('show');
        });
    </script>   

<?php } ?>