<?php 	
include "includes/connect.php";
$order_id = $_REQUEST['ord_id'];
//$branch_code = $_REQUEST['branch'];
?>
<?php
			
			$ord = mysqli_query($conn,"SELECT * FROM orders WHERE ord_id='$order_id'");
			while($ord_data = mysqli_fetch_array($ord))
			{
				$id = $ord_data['id'];
				$product_id = $ord_data['product_id'];
				$quantity = $ord_data['quantity'];
				$price = $ord_data['price'];
				$total = $ord_data['total'];
				$address = $ord_data['address'];
				$date = $ord_data['created_at'];
				$user_id = $ord_data['user_id'];
				
			}
		?>

<!DOCTYPE html>
<html>
<head>
	<title>Table</title>
  <style>
table, th, td {
border: 1px solid #e2d7d7;   border-collapse: collapse;
}
td {
text-align:left;
padding:20px;
}
th {
text-align:center;
padding:10px;
}
 @media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}

</style>
	
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
<body>
	
<div class="canvas_div_pdf">	
<div class="toolbar hidden-print">
    <div class="text-right">
        <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
        <!-- <a href="pdf.php?id=<?php echo $order_id ?>" id="" class="btn btn-success"><i class="fa fa-sign-out"></i> Dowload</a>   -->
        <button onclick="getPDF()" id="downloadbtn"  class="btn btn-success">Download</button>
		<a href="view_orders.php?u_id=<?php echo $user_id ?>" id="" class="btn btn-danger"><i class="fa fa-sign-out"></i> Back</a>      
	</div><hr>
</div>
<div class="container invoice"><br>
	<img src="images/logo.png" height="100px" style="align-items: center;display: flex;justify-content: center;margin-left: auto;margin-right: auto;">
	<table class="table table-bordered">
	  	<thead>		
			<?php
				
				$cust_data = mysqli_query($conn,"SELECT * FROM address WHERE id='$address'");
				$cust = mysqli_fetch_array($cust_data);
				{
					$cust_name = $cust['name'];
					$c_address = $cust['address'];
					$c_phone = $cust['mobile'];
					$c_city = $cust['city'];
					$c_state = $cust['state'];
					$c_landmark = $cust['landmark'];
					$id = $cust['id'];
					
				}
			?>

		    <tr>
		      
			    <th scope="col">
			      	<h3 style="text-transform: uppercase;font-size:20px; font-weight: 700"><?php echo $cust_name ?></h3><br>
			      	<p>
				      <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo $c_address ?><br>
				      
				      <i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $c_phone ?>
			  		</p>
				    <p>Invoice No&nbsp;&nbsp; : &nbsp;&nbsp;INV-<?php echo $order_id?></p>
				    <p>Invoice Dated&nbsp;&nbsp; : &nbsp;&nbsp;<?php $date=date_create($date);
						echo date_format($date,"d-m-Y");?></p>
					<p>City&nbsp;&nbsp; : &nbsp;&nbsp;<?php echo $c_city ?></p>
				    <p>State&nbsp;&nbsp; : &nbsp;&nbsp;TAMILNADU  </p>
				</th>
			    <th scope="col">
			      	<h3 style="text-transform: uppercase;font-size:20px; font-weight: 700">Evara</h3><br>
			      	<p>
				      <i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;5th St, Chinthamani Nagar,<br>
				      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kuppakonam Pudur, K K Pudur,<br>
				      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Coimbatore, Tamil Nadu - 641038.<br><br>
				      <i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;hr@reclusesoftwares.in<br><br>
				      <i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;+91-88709-38049
			  		</p>
			  	</th>      
		    </tr>
	  	</thead>
	</table>
</div>
<div class="container">
	<table style="width:100%;" class="display nowrap">
		<tr style="background-color: #ece5e5;">
			<th rowspan="2" style="text-align:center;font-size: 15px;">S.No</th>
			<th rowspan="2" style="text-align:center;font-size: 15px;">Name of Product</th>
			<th rowspan="2" style="text-align:center;font-size: 15px;">Qty</th>
			<th rowspan="2" style="text-align:center;font-size: 15px;">Price</th>
			<th style="text-align:center;font-size: 15px;">Total</th>
		</tr>
		<tr style="background-color: #ece5e5;">
			<th rowspan="" style="text-align:center"></th>
		</tr>
		<?php
			$order = mysqli_query($conn,"SELECT * FROM orders WHERE ord_id='$order_id'");
			$o_grand = 0;
			while($order_data = mysqli_fetch_array($order))
			{
				$o_id = $order_data['id'];
				$o_product_id = $order_data['product_id'];
				$o_quantity = $order_data['quantity'];
				$o_price = $order_data['price'];
				$o_total = $order_data['total'];
				$o_address = $order_data['address'];
				$o_date = $order_data['created_at'];
				$s_no = 1;
				$o_grand += $o_total ;
			
			$prod_data = mysqli_query($conn,"SELECT * FROM products WHERE id='$o_product_id'");
			$prod = mysqli_fetch_array($prod_data);
			{
				$prod_name = $prod['product_name'];
				$prod_brand = $prod['brand'];
				$prod_cat = $prod['cat'];
				$prod_sub = $prod['sub_cat'];
				$prod_image = $prod['product_image'];
				$id = $prod['id'];
				
			}
		?>
		<tr>
			<td style="text-align:center;font-size: 15px;"><?php echo $s_no?></td>
			<td style="text-align:center;font-size: 15px;"><?php echo $prod_name;?></td>
			<td style="text-align:center;font-size: 15px;"><?php echo $o_quantity;?></td>
			<td style="text-align:center;font-size: 15px;"><?php echo $o_price;?></td>
			<td style="text-align:center;font-size: 15px;"><?php echo $o_total;?></td>
		</tr>
		<?php } $s_no++;?>
		<tr>
			<td style="text-align:center;font-size: 15px;font-weight: 700;" colspan="4">Grand Total</td>
			<td style="text-align:center;font-size: 15px;font-weight: 700;"><?php echo $o_grand ?></td>
		</tr>
	</table>
</div>
<div class="container">
<table class="table table-bordered" >

<tbody >
<tr>
<th colspan="1"><?php
   $number = $o_grand;
   $no = floor($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'eEighty', '90' => 'Ninety');
   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  echo "Rupees : " .$result  ; ?> </th>






</tr>
</tbody>
</table>
</div>
<div class="container">
<table style="width:100%;" class="display nowrap">
<tr>
<th  style="padding:10px;text-align: left;">Terms & Conditions :<br>
   1.GOODS ONCE SOLD WILL BE TAKEN BACK<br> 2.SUBJECT TO COIMBATORE JURISDICTION ONLY<br><br><br> </th>
<th  style="padding:10px;text-align: right;">Certified that the particulars given above are true and correct<br><br>
   For Evara<br><br><br> Authorised Signatory</th>


</tr>





</table>
</div>
</div><br><br>

<script>
 $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });
</script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

   

 <script >
    function getPDF(){

        var HTML_Width = $(".canvas_div_pdf").width()*2;
        var HTML_Height = $(".canvas_div_pdf").height()*2;
        var top_left_margin = 15;
        var PDF_Width = HTML_Width+(top_left_margin*2);
        var PDF_Height = (PDF_Width*1.5)+(top_left_margin*2);
        var canvas_image_width = HTML_Width;
        var canvas_image_height = HTML_Height;
        
        var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;
        

        html2canvas($(".canvas_div_pdf")[0],{allowTaint:true}).then(function(canvas) {
            canvas.getContext('2d');
            
            console.log(canvas.height+"  "+canvas.width);
            
            
            var imgData = canvas.toDataURL("image/jpeg", 1.0);
            var pdf = new jsPDF('p', 'pt',  [PDF_Width, PDF_Height]);
            pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);
            
            
            for (var i = 1; i <= totalPDFPages; i++) { 
                pdf.addPage(PDF_Width, PDF_Height);
                pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
            }
            
            pdf.save("Evara.pdf");
        });
    };</script>

</body>
</html> 