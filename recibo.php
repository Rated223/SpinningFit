<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.midnight-blue{
    background:#2c3e50;
    padding: 4px 4px 4px;
    color:white;
    font-weight:bold;
    font-size:12px;
}
.silver{
    background:white;
    padding: 3px 4px 3px;
}
.clouds{
    background:#ecf0f1;
    padding: 3px 4px 3px;
}
.border-top{
    border-top: solid 1px #bdc3c7;
    
}
.border-left{
    border-left: solid 1px #bdc3c7;
}
.border-right{
    border-right: solid 1px #bdc3c7;
}
.border-bottom{
    border-bottom: solid 1px #bdc3c7;
}
table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
}
-->
</style>
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
        <page_footer>
        <table class="page_footer">
            <tr>

                <td style="width: 50%; text-align: left">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
                <td style="width: 50%; text-align: right">
                    &copy; <?php echo "Spinnignfit "; echo  $anio=date('Y'); ?>
                </td>
            </tr>
        </table>
    </page_footer>

    <table cellspacing="0" style="width: 100%;">
        <tr>

            <td style="width: 25%; color: #444444;">
                <img style="width: 100%;" src="../images/LOGO2.jpg" alt="Logo"><br>
            </td>
            <td style="width: 50%; color: #34495e;font-size:12px;text-align:center">
                <span style="color: #34495e;font-size:14px;font-weight:bold">Gimnasio <i>SpinningFit</i></span>
                <br>Calle Hidalgo #910-Col. concordia Santa Catarina<br>  CP. 66168- Local #906<br> 
                Teléfono: + 1235 2355 98<br>
                Email: info@spinningfit.com
                
            </td>
            <td style="width: 25%;text-align:right">
            FOLIO Nº <?php echo $folio;?>
            </td>
            
        </tr>
    </table>
   <br>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
            <td style="width:35%;" class='midnight-blue'>VENDEDOR</td>
            <td style="width:25%;" class='midnight-blue'>FECHA</td>
        </tr>
        <tr>
            <td style="width:35%;">
            <?php 
                $sql_user=mysqli_query($mysqli,"SELECT * FROM administrador WHERE idadministrador='$aid'");
                $rw_user=mysqli_fetch_array($sql_user);
                echo $rw_user['nombre_administrador']." ".$rw_user['apellido_administrador'];
            ?>
            </td>
            <td style="width:25%;"><?php echo date("d/m/Y", strtotime($fecha_factura));?></td>
        </tr>
    </table>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
            <th style="width: 10%;text-align:center" class='midnight-blue'>CANT.</th>
            <th style="width: 60%" class='midnight-blue'>PRODUCTO</th>
            <th style="width: 15%;text-align: right" class='midnight-blue'>PRECIO UNIT.</th>
            <th style="width: 15%;text-align: right" class='midnight-blue'>PRECIO TOTAL</th>
        </tr>

<?php
$nums=1;
$sumador_total=0;
$sql=mysqli_query($mysqli, "SELECT * FROM productos, detalles_venta, ventas     WHERE productos.idProductos=detalles_venta.id_producto && detalles_venta.id_venta=ventas.idVentas && ventas.idVentas='".$id."'");

while ($row=mysqli_fetch_array($sql))
    {
    $id_producto=$row["id_producto"];
    $codigo_producto=$row['codigo_producto'];
    $cantidad=$row['cantidad_producto_venta'];
    $nombre_producto=$row['nombre_producto'];
    $precio_venta=$row['precio_producto'];
    $precio_venta_f=number_format($precio_venta,2);//Formateo variables
    $precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
    $precio_total=$precio_venta_r*$cantidad;
    $precio_total_f=number_format($precio_total,2);//Precio total formateado
    $precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
    $sumador_total+=$precio_total_r;//Sumador
    $total_factura=$row['total_venta'];
    if ($nums%2==0){
        $clase="clouds";
    } else {
        $clase="silver";
    }
    ?>

        <tr>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: center"><?php echo $cantidad; ?></td>
            <td class='<?php echo $clase;?>' style="width: 60%; text-align: left"><?php echo $nombre_producto;?></td>
            <td class='<?php echo $clase;?>' style="width: 15%; text-align: right"><?php echo $precio_venta_f;?></td>
            <td class='<?php echo $clase;?>' style="width: 15%; text-align: right"><?php echo $precio_total_f;?></td>
            
        </tr>

    <?php 

    
    $nums++;
    }
?>
      <tr>
            <td colspan="3" style="widtd: 85%; text-align: right;">TOTAL $ </td>
            <td style="widtd: 15%; text-align: right;"> <?php echo number_format($total_factura,2);?></td>
        </tr>
    </table>
    
    
    
    <br>
    <div style="font-size:11pt;text-align:center;font-weight:bold">Gracias por su compra!</div>
    
    
      

</page>

