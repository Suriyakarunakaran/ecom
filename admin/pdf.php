<?php include'includes/connect.php';

    require 'dompdf/vendor/autoload.php';
    use Dompdf\Dompdf;

    $order_id = $_REQUEST['ord_id'];
    $dompdf = new Dompdf();
    ob_start();
    require('invoice.php');
    $html = ob_get_contents();
    ob_get_clean();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream('Hello' , array("Attachment" => false));
?>