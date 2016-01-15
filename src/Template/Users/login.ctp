<div class="row">
    <div class="col-lg-4 col-lg-offset-4">
        <div id="panel-login" >
            <div id="panel-login-image">
                <?php echo $this->Html->image('logo_login.png'); ?>
            </div>

            <?= $this->Form->create() ?>
                
                <?php if($this->Flash->render('auth')){ ?>
                    <div class="alert alert-danger">
                        <?= $this->Flash->render('auth') ?>
                        <?= $this->Flash->render() ?>
                    </div>
                <?php } ?>
                
                <div class="form-group">
                    <?= $this->Form->input('username',array('label'=>false,'class'=>'form-control','placeHolder'=>'Nombre de usuario')) ?>
                </div>
                
                <div class="form-group">
                    <?= $this->Form->input('password',array('label'=>false,'class'=>'form-control','placeHolder'=>'Clave')) ?>
                </div>
                
                <div class="form-group">
                    <?= $this->Form->button(__('Entrar'),array('class'=>'btn btn-outline btn-primary btn-lg btn-block')); ?>
                </div>
            
            <?= $this->Form->end() ?>
        </div>    
    </div>
</div>