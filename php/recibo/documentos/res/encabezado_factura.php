<?php 
	if ($mysqli){
?>
    <table cellspacing="0" style="width: 100%;">
        <tr>

            <td style="width: 25%; color: #444444;">
                <img style="width: 100%;" src="" alt="Logo"><br>
                
            </td>
			<td style="width: 50%; color: #34495e;font-size:12px;text-align:center">
                <span style="color: #34495e;font-size:14px;font-weight:bold">nombre_empresa</span>
				<br>direccion<br> 
				Teléfono: telefono<br>
				Email: email
                
            </td>
			<td style="width: 25%;text-align:right">
			FOLIO Nº <?php echo $folio;?>
			</td>
			
        </tr>
    </table>
	<?php }?>	