<?php
    
    require_once dirname(__FILE__).'/../vendor/autoload.php';
    
    use Spipu\Html2Pdf\Html2Pdf;
    use Spipu\Html2Pdf\Exception\Html2PdfException;
    use Spipu\Html2Pdf\Exception\ExceptionFormatter;
    

    include("conection.php");
    $id= intval($_GET['id']);
    $re=mysqli_query($mysqli,"SELECT * FROM ventas WHERE idVentas='".$id."'");
    $count=mysqli_num_rows($re);
    if ($count==0)
    {
        echo "<script>alert('Factura no encontrada')</script>";
        echo "<script>window.close();</script>";
        exit;
    }
    $rm=mysqli_query($mysqli,"SELECT * FROM ventas WHERE idVentas='".$id."'");
    $f=mysqli_fetch_array($rm);
    $folio=$f['folio_venta'];
    $aid=$f['Administrador_idAdministrador'];
    $fecha_factura=$f['fecha_venta'];
    try {
        ob_start();
        include dirname(__FILE__).'/../recibo.php';
        $content = ob_get_clean();
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content); 
        $html2pdf->Output('Factura.pdf');
    }
    catch(HTML2PDF_exception $e) {
        $html2pdf->clean();
        $formatter = new ExceptionFormatter($e);
        echo $formatter->getHtmlMessage();
        exit;
    }
