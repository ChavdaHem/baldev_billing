 <?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

include_once("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $order = $_POST;

  $partyname = $order['party_name'];
  $city = $order['city'];
  $state = $order['state'];
  $phone_1 = $order['phone_1'];
  $phone_2 = $order['phone_2'];
  $gstin = $order['gstin'];
  $totalAmtHD = $order['totalAmtHD'];
  $totalCgstAmtHD = $order['totalCgstAmtHD'];
  $totalSgstAmtHD = $order['totalSgstAmtHD'];
  $finalTotalHD = $order['finalTotalHD'];


  $quantity = $_POST['quantity'];
  $description = $_POST['description'];
  $sql = "INSERT INTO orders (`partyname`, `city`, `state`, `phone_1`, `phone_2`, `gstin`, `totalAmtHD`, `totalCgstAmtHD`, `totalSgstAmtHD`, `finalTotalHD`) VALUES ('$partyname', '$city', '$state', '$phone_1', '$phone_2', '$gstin', '$totalAmtHD', '$totalCgstAmtHD', '$totalSgstAmtHD', '$finalTotalHD')";
  $conn->query($sql);
  $order_id = $conn->insert_id;
  
  if ($order_id) {
    foreach ($order['product'] as $key => $item) {
      $product_name = $order['product'][$key];
      $hsn = $order['hsn'][$key];
      $sale_price = $order['sale_rate'][$key];
      $cgst = $order['cgst'][$key];
      $sgst = $order['sgst'][$key];
      $cgstAmt = $order['cgstAmtHD'][$key];
      $sgstAmt = $order['sgstAmtHD'][$key];
      $amt = $order['amtHD'][$key];
      $finalAmt = $order['finalAmtHD'][$key];
      $qty = $order['qty'][$key];

      $sql1 = "INSERT INTO order_items (`order_id`, `product_name`, `hsn`, `sale_price`, `cgst`, `sgst`, `cgstAmt`, `sgstAmt`, `amt`, `finalAmt`, `qty`) VALUES ('$order_id', '$product_name', '$hsn', '$sale_price', '$cgst', '$sgst', '$cgstAmt', '$sgstAmt', '$amt', '$finalAmt', '$qty')";
      $conn->query($sql1);
    }
  }
  require_once 'vendor/mpdf/vendor/autoload.php';
  $mpdf = new \Mpdf\Mpdf([ 'mode' => 'utf-8','format' => 'A4-P', 'margin_left' => '5px','margin_right' => '5px','margin_top' => '5px','margin_bottom' => '5px','margin_header' => '5px','margin_footer' => '5px']);
  $mpdf->justifyB4br = true;
  require_once 'order_pdf.php';
  //$html = load_template_part('sparkle_pdf', $key);
  $mpdf->list_indent_first_level = 0;
  $stylesheet = file_get_contents('css/order_pdf.css');
  $mpdf->WriteHTML($stylesheet,1);
  $html = "<div><div><></div></div>";
  //echo $content;exit;
  $mpdf->WriteHTML($content,2);
  ob_clean();
  $pdfname = "Sparkling-times.pdf";
  $mpdf->Output($pdfname, 'I');
}
  ?>