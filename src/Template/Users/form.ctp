<?php $this->Html->addCrumb('Usuarios', ['controller' => 'Users', 'action' => 'index']); ?>
<?php if(isset($id)){ ?>
    <?php $this->Html->addCrumb('Editar usuario', ['controller' => 'Users', 'action' => 'form']); ?>
<?php }else{ ?>
    <?php $this->Html->addCrumb('Añadir usuario', ['controller' => 'Users', 'action' => 'form']); ?>
<?php } ?>

<?php /*
<?= $this->Form->autocomplete('search', $options) ?> 
*/ ?>

<div class="row">
    <h1 class="page-header">Añadir usuario</h1>    
</div>

<div class="row">
    <div class="col-md-10">
        <div class="panel panel-primary">
            
            <div class="panel-heading">
                <h3 class="panel-title">Acceso de usuarios</h3>
            </div>
            
            <?= $this->Form->create($user,['action'=>'form']) ?>
            
            <div class="panel-body">
                
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <?= $this->Form->input('role',array('label'=>__('Perfil de usuario'),'class'=>'form-control','type'=>'select','options'=>$roles)) ?>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <?= $this->Form->input('username',array('label'=>false,'class'=>'form-control','placeHolder'=>__('Nombre de usuario'))) ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?= $this->Form->input('password',array('label'=>false,'class'=>'form-control','placeHolder'=>__('Clave'))) ?>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <?= $this->Form->input('nombre',array('label'=>false,'class'=>'form-control','placeHolder'=>__('Nombre'))) ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?= $this->Form->input('apellido_1',array('label'=>false,'class'=>'form-control','placeHolder'=>__('Primer apellido'))) ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?= $this->Form->input('apellido_2',array('label'=>false,'class'=>'form-control','placeHolder'=>__('Segundo Apellido'))) ?>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <?= $this->Form->input('telefono',array('label'=>false,'class'=>'form-control','placeHolder'=>__('Teléfono'))) ?>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <?= $this->Form->input('email',array('label'=>false,'class'=>'form-control','placeHolder'=>'Clave','placeHolder'=>__('Email'))) ?>
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