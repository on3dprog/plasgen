<?php $this->Html->addCrumb('Produccion', ['controller' => 'Producciones', 'action' => 'index']); ?>
<?php $this->Html->addCrumb('Maquinas', ['controller' => 'Producciones', 'action' => 'index_maquinas']); ?>
<?php if(isset($id)){ ?>
    <?php $this->Html->addCrumb('Editar maquina', ['controller' => 'Maquinas', 'action' => 'form']); ?>
<?php }else{ ?>
    <?php $this->Html->addCrumb('Añadir maquina', ['controller' => 'Maquinas', 'action' => 'form']); ?>
<?php } ?>

<div class="row">
    <h1 class="page-header">Añadir maquina</h1>    
</div>

<div class="row">
    <div class="col-md-5">
        <div class="panel panel-primary">
            
            <div class="panel-heading">
                <h3 class="panel-title">Maquinas</h3>
            </div>
            
            <?= $this->Form->create($maquina,['action'=>'form_maquinas']) ?>
            
            <div class="panel-body">
                                      
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <?= $this->Form->input('tipo',array('label'=>false,'class'=>'form-control','placeHolder'=>__('Nombre'),'options'=>$tipos)) ?>
                        </div>
                    </div>
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
</div>