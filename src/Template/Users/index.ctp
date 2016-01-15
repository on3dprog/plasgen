<?php $this->Html->addCrumb('Usuarios', ['controller' => 'Users', 'action' => 'index']); ?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Usuarios</h1>
    </div>
</div>

<div class="row pull-right row-margin">
    <div class="col-lg-12">
        <?php echo $this->Html->link('<button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> A&ntilde;adir usuario</button> ','/users/form',array('escapeTitle'=>false)); ?>
    </div>
</div>
<br />

<!-- LISTADO -->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            
            <div class="panel-heading">
                <i class="fa fa-user fa-fw"></i> Listado de usuarios
            </div>
        
            <div class="panel-body">
                <div class="dataTable_wrapper">                                                            
                    <?php $count=0; ?>
                    <table class="dataTables table table-striped table-bordered table-hover" >
                        <thead>                            
                            <tr>
                                <th>Id</th> 
                            	<th>Perfil</th>
                            	<th>Nombre</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                            	<th>Activo</th>
                            	<th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>                        
                                                
                            <?php foreach ($usuarios as $usuario): ?>
                                <tr class="<?php $count++; if(($count & 1)==0){ echo 'even'; }else{ echo 'odd'; } ?>">
                                    <td><?php echo $usuario->id; ?></td>
                                    <td><?php echo $usuario->role; ?></td>  
                                    <td><?php echo $this->Html->link($usuario->nombre.' '.$usuario->apellido_1.' '.$usuario->apellido_2,['action'=>'form',$usuario->id]); ?></td>
                                    <td><?php echo $usuario->telefono; ?></td>
                                    <td><?php echo $usuario->email; ?></td>
                                    <td style="text-align:center;">
                                    <?php /* //ACTIVO        
                                		echo '<span id="LicitacionActiva_'.$licitacion['Licitacion']['id'].'">';
                                		if($licitacion['Licitacion']['active'] == 0){
                                			echo $ajax->link($html->image('publish_x.png', array('class'=>"actions", 'style' => 'border:none;', 'title'=>'Click para activar' )),'/licitaciones/activar/'.$licitacion['Licitacion']['id'],array('update'=> 'LicitacionActiva_'.$licitacion['Licitacion']['id']), null ,false);
                                		}else{
                                			echo $ajax->link($html->image('publish_g.png', array('class'=>"actions", 'style' => 'border:none;', 'title'=>'Click para desactivar' )),'/licitaciones/activar/'.$licitacion['Licitacion']['id'],array('update'=> 'LicitacionActiva_'.$licitacion['Licitacion']['id']), null ,false);
                                		}	
                                		echo '</span>';		*/			
                                	?>
                                    </td>
                                	<td class="actions">
                                        <?php echo $this->Html->link($this->Html->image('edit.png',array('title'=>'Editar')),'/users/form/' . $usuario->id,array('escapeTitle'=>false) ); ?>
                                        <?php echo $this->Html->link($this->Html->image('cross.png',array('title'=>'Borrar')),['controller'=>'Users','action'=>'delete',$usuario->id],['confirm'=>__('Esta seguro de borrar este registro?'),'escapeTitle'=>false]); ?>
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
