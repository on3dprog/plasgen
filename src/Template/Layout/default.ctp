<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Plasgen ERP - Herramienta de Gestión';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?php //$this->Html->css('base.css') ?>
    <?php //$this->Html->css('cake.css') ?>
    
    <!-- CSS COMUNES-->
    <?= $this->Html->css('comunes/bootstrap/bootstrap.min.css') ?>
    <?= $this->Html->css('comunes/menu/metisMenu.min.css') ?>
    <?= $this->Html->css('comunes/font-awesome.min.css') ?>
    <?= $this->Html->css('comunes/sb-admin-2.css') ?>
    <?= $this->Html->css('base.css') ?>

    <!-- DATATABLES -->
    <?php if(isset($datatables) && $datatables > 0){ ?>
        <?= $this->Html->css('datatables/dataTables.bootstrap.css') ?>
        <?= $this->Html->css('datatables/dataTables.responsive.css') ?>
    <?php } ?>

    <!-- GRÁFICAS -->
    <?php if(isset($mostrar_graficas) && $mostrar_graficas==1){ ?>
        <?= $this->Html->css('graficas/timeline.css') ?>
        <?= $this->Html->css('graficas/morris.css') ?>
    <?php } ?>
    
    <!-- JQUERY -->
    <?= $this->Html->script('jquery.min.js'); ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

    <?php
        if($this->request->session()->read('Auth.User.username')){
    ?>
        <body>
            <div id="wrapper">                
                <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Alternar navigación</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <?php echo $this->Html->link($this->Html->image('logo.png',array('title'=>'Logo Plasgen')),'/',array('escapeTitle'=>false,'class'=>'navbar-brand')); ?>
                    </div>
                    <?php echo $this->element('cabecera'); ?>
                    <?php echo $this->element('menu'); ?>            
                </nav>
        
                <div id="page-wrapper">
                    <div class="breadcrumb">
                        <?php echo $this->Html->getCrumbs(' > ', 'Inicio'); ?>
                    </div>
                    <?= $this->Flash->render() ?>                    
            		<?= $this->fetch('content') ?>
                </div>    
            </div>            
    
    <?php        
        }else{
    ?>
        <body id="loginwindow">
            <div class="container">                
        		<?= $this->fetch('content') ?>
            </div>
    
    <?php
        }
    ?>
    
    <footer></footer>
    
    <!-- CSS COMUNES-->
    <?= $this->Html->script('bootstrap/bootstrap.min.js'); ?>
    <?= $this->Html->script('comunes/menu/metisMenu.min.js'); ?>
    <?= $this->Html->script('comunes/sb-admin-2.js'); ?>
    
    
    <?php if(isset($datatables) && $datatables > 0){ ?>
        <?= $this->Html->script('datatables/jquery.dataTables.min.js'); ?>
        <?= $this->Html->script('datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js'); ?>
        
        <script type="text/javascript">
            
            <?php if($datatables == 1){ //DATATABLES ESTANDAR ?>
                $(document).ready(function() {
                    $('.dataTables').DataTable({
                        responsive: true,
                        "aLengthMenu": [[10, 20, 30, 50, -1], [10, 20, 30, 50, "Todos"]],
                        "iDisplayLength": 20,
                        "language": { "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json" },                    
                    });
                });
            <?php }else if($datatables == 2){ //DATATABLES RESUMIDAS ?>
                $(document).ready(function() {
                    $('.dataTables').DataTable({
                        responsive: true,
                        "ordering": false,
                        "info": false,
                        "paging": false,
                        "bFilter": false,
                        "aLengthMenu": [[10, 20, 30, 50, -1], [10, 20, 30, 50, "Todos"]],
                        "iDisplayLength": 20,
                        "language": { "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json" },                    
                    });
                });
            <?php } ?>
        </script> 
        
    <?php } ?>
    
    <!-- GRÁFICAS -->    
    <?php if(isset($mostrar_graficas) && $mostrar_graficas==1){ ?>
        <?= $this->Html->script('graficas/raphael/raphael-min.js'); ?>
        <?= $this->Html->script('graficas/morrisjs/morris.min.js'); ?>
        <?= $this->Html->script('graficas/morris-data.js'); ?>
    <?php } ?> 
    
    
    
</body>
</html>