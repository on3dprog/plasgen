<?php $this->Html->addCrumb('Usuarios', ['controller' => 'Aseguradoras', 'action' => 'index']); ?>
<?php if(isset($id)){ ?>
    <?php $this->Html->addCrumb('Editar aseguradora', ['controller' => 'Aseguradoras', 'action' => 'form']); ?>
<?php }else{ ?>
    <?php $this->Html->addCrumb('Añadir aseguradora', ['controller' => 'Aseguradoras', 'action' => 'form']); ?>
<?php } ?>

<div class="row">
    <h1 class="page-header">Añadir aseguradora</h1>    
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            
            <div class="panel-heading">
                <h3 class="panel-title">Aseguradoras</h3>
            </div>
            
            <?= $this->Form->create($aseguradora,['action'=>'form']) ?>
            
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
</div>