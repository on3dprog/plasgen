<style>
    #tabla_datos_plasgen{ margin-top: -30px; }
    .tabla th{ padding: 5px; background-color: #01aef2; text-align: center; }
    .tabla td{ padding: 5px; text-align: center; }
    .tabla_datos_cliente{ padding: 3px; }
    #tabla_small{ font-size: 6px !important; }
    #oscura{ background-color: #0078a7 !important; }
</style>

<?php 

    foreach($datos_pedido as $pedido)
    {
       echo $pedido;
    }    
?>

<table id="tabla_datos_plasgen">
    <tr>
        <td></td>                
        <td rowspan="2" align="right">
            <table>
                <tr>
                    <td><br /><br /><br /><br /><br /><br /><?php echo $this->Html->Image('http://localhost/plasgen/webroot/img/certificados-aenor-iqnet.png',array('width'=>'60px','height'=>'30px')); ?></td>
                    <td>
                        Pol&iacute;gono el Mirador,11<br />
                        41400 Ecija (Sevilla), Espa&ntilde;a<br />
                        Apartado de correos, 337<br />
                        Tel: +34 955 901 065<br />
                        Fax: +34 955 900 233<br />
                        comercial@plasgen.es<br />
                        www.plasgen.es<br />
                        CIF: B41577222
                    </td>
                </tr>
            </table>            
        </td>
    </tr>
    <tr>
        <td><br /><br /><br /><h1>PEDIDO DE VENTA</h1></td>                                      
    </tr>
</table>
<br /><br />

<table>
    <tr>
        <td>
            <table border="0">
                <tr><td width="50">Tel:</td><td></td></tr>
                <tr><td>Fax:</td><td>957684902</td></tr>
                <tr><td>Email:</td><td>info@forjajimenezcampos.com</td></tr>
                <tr><td>CIF/NIF:</td><td>E14530877</td></tr>
            </table>   
        </td>
        <td>
            <table class="tabla_datos_cliente" border="1">
                <tr>
                    <td>
                        <table>
                            <tr><td>CTRA MONTILLA KM 1</td></tr>
                            <tr><td>LA RAMBLA</td></tr>
                            <tr><td>14540   C&oacute;rdoba</td></tr>
                            <tr><td>Espa&ntilde;a</td></tr>                
                        </table> 
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<br /><br />


<table class="tabla" border="1" cellpadding="1" >
    <tr>
        <th align="center"><strong>N PEDIDO</strong></th>
        <th>FECHA</th>
        <th>CLIENTE</th>
        <th>REFERENCIA</th>
        <th>ENTREGA</th>
        <th>AGENTE</th>
    </tr>
    <tr>
        <td class="navbar-brand">0/ <strong>1626</strong></td>
        <td>xx</td>
        <td>xx</td>
        <td>xx</td>
        <td>xx</td>
        <td>xx</td>
    </tr>
    <tr>
        <th colspan="3">MEDIO ENVIO</th>
        <th colspan="2">FORMA DE PAGO</th>
        <th></th>
    </tr>
    <tr>
        <td colspan="3">XX</td>
        <td colspan="2">XX</td>
        <td></td>
    </tr>
</table>
<br /><br />

<?php ?>

<table class="tabla">
    <tr>
        <th border="1">CANTIDAD</th>
        <th border="1" colspan="3">C&Oacute;DIGO - DESCRIPCI&Oacute;N DEL PRODUCTO</th>
        <th border="1">PRECIO</th>
        <th border="1">IMPORTE</th>
    </tr>
    <tr>
        <td align="right">&nbsp;&nbsp;</td>
        <td colspan="3" align="left">&nbsp;&nbsp;</td>
        <td align="right">&nbsp;&nbsp;</td>
        <td align="right">&nbsp;&nbsp;</td>
    </tr>
    
    <?php foreach($elementos_pedido as $elemento){ ?>
        
        <tr>
            <td align="right"><?php echo $elemento->cantidad; ?> Kg&nbsp;&nbsp;</td>
            <td colspan="3" align="left">&nbsp;&nbsp;<?php echo str_pad($elemento->articulo_id,6,0,STR_PAD_LEFT); ?>&nbsp;&nbsp;<?php echo $elemento->articulo->nombre; ?></td>
            <td align="right"><?php echo number_format($elemento->articulo->precio,4,",","."); ?> &euro;</td>
            <td align="right"><?php echo number_format(($elemento->articulo->precio*$elemento->cantidad),2,",","."); ?> &euro;</td>
        </tr>
    <?php } ?>
</table>

<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<table class="tabla">
    <tr>
        <th border="1" colspan="4" id="oscura" align="right">TOTAL&nbsp;&nbsp;</th>
        <td border="1">1.080 &euro;</td>
    </tr>
</table>
<br /><br />

<table border="1" class="tabla">
    <tr><th align="center">OBSERVACIONES</th></tr>
    <tr><td></td></tr>
</table>
<br /><br />

<table class="tabla" border="1">
    <tr>
        <th>DESTINO</th>
        <th>CONFORME CLIENTE</th>
        <th>CONFORME EMPRESA</th>
    </tr>
    <tr>
        <td>XX</td>
        <td>XX</td>
        <td>XX</td>
    </tr>
</table>
<br/><br/>
<table>
    <tr>
        <td id="tabla_small">NOTA: Rogamos devuelvan firmado y sellado al n&uacute;mero de fax 95 590 02 33, de no recibir respuesta en 24 horas, lo entenderemos conforme.<br />
        De acuerdo con la nueva ley org&aacute;nica 15 13/12/1999 de protecci&oacute;n de datos espa&ntilde;ola, le comunicamos que sus datos forman parte de un fichero
        autom&aacute;tizado perteneciente a la empresa de este documento, con la finalidad de tratarlos en nuestras tareas de administraci&oacute;n y gesti&oacute;n. Sus datos ser&aacute;n de
        uso exclusivo de la entidad, salvo que las leyes dispongan de otra cosa. Queda usted informado de sus derechos de oposici&oacute;n, acceso, rectificaci&oacute;n y
        cancelaci&oacute;n de sus datos.
        </td>
    </tr>
</table>