<?php $this->Html->addCrumb('Usuarios', ['controller' => 'Departamentos', 'action' => 'index']); ?>
<?php if(isset($id)){ ?>
    <?php $this->Html->addCrumb('Editar departamento', ['controller' => 'Departamentos', 'action' => 'form']); ?>
<?php }else{ ?>
    <?php $this->Html->addCrumb('Añadir departamento', ['controller' => 'Departamentos', 'action' => 'form']); ?>
<?php } ?>

<div class="row">
    <h1 class="page-header">Añadir departamento</h1>    
</div>

<div class="row">
    <div class="col-md-5">
        <div class="panel panel-primary">
            
            <div class="panel-heading">
                <h3 class="panel-title">Departamentos</h3>
            </div>
            
            <?= $this->Form->create($departamento,['action'=>'form']) ?>
            
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