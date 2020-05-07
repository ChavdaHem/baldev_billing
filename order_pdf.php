<link rel="stylesheet" type="text/css" href="css/order_pdf.css">
<?php

$content = '';
$content .= "<div>";
	$content .= "<div>";
		$content .= "<table  style='border: solid;border-width: 1px;width: 100%; border-collapse: collapse;'>";
			$content .= "<tr class='invhead' style=''>";
				$content .= "<td colspan='13' style='height:110px;'><span class='invheadtxt'>Ajuba Health and Maintenance</span><br><span class='invheadtxt'>Plot No. 89. Piples Society, Shubhash Nagar Road, Bhavanagar, Gujarat, 364001 </span><br><span class='invheadtxt'> Mob. No.:+91 93130 91130</span><br><span class='invheadtxt'>GSTIN : 24AVEPC5725B1Z8</span><br><span class='invheadtxt'> State GUJARAT </span></td>";
			$content .="</tr>";
			$content .= "<tr class='partyhead' style=''>";
				$content .= "<td>Party</td>";
				$content .= "<td colspan='4'>".$order['party_name']."</td>";
				$content .= "<td colspan='3'>Infra state</td>";
				$content .= "<td colspan='2'></td>";
				$content .= "<td colspan='3'></td>";
			$content .="</tr>";
			$content .= "<tr class='partydetails' style=''>";
				$content .= "<td colspan=8><span>Address:".$order['address'].' ' .$order['city']." </span> <br><span>Ph. No: ".$order['phone_1']." ,".$order['phone_2']."</span><br><span>GSTIN: ".$order['gstin']."</span></td>";
				$content .= "<td colspan='5'><span>Invoice Date : ".date('d/m/Y')."</span><br><span>Due Date : ".date('d/m/Y')."</span><br><span> </span></td>";
			$content .="</tr>";
			$content .="</table>";
			$content .= "<table  style='border: solid;border-width: 1px;width: 100%; border-collapse: collapse;'>";
			$content .= "<tr class='headtr' style=''>";
				$content .= "<td class='srTD'>Sr.</td>";
				$content .= "<td>Name of Item</td>";
				$content .= "<td class='hsnTD'>HSN Code</td>";
				$content .= "<td class='pcsTD'>Pcs</td>";
				$content .= "<td class='rateTD'>Rate</td>";
				$content .= "<td colspan='2'>CGST</td>";
				$content .= "<td colspan='2'>SGST</td>";
				$content .= "<td>Amount</td>";
			$content .="</tr>";
			if($order['product']){
				$i = 1;

				$hsn = $order['hsn'];
				$qty = $order['qty'];
				$cgst = $order['cgst'];
				$sgst = $order['sgst'];
				$amtHD = $order['amtHD'];
				$cgstAmtHD = $order['cgstAmtHD'];
				$sgstAmtHD = $order['sgstAmtHD'];
				$finalAmtHD = $order['finalAmtHD'];
				$sale_rate = $order['sale_rate'];


				foreach ($order['product'] as $key => $item) {
					$content .= "<tr class='itemrow'>";
						$content .= "<td>".$i."</td>";
						$content .= "<td>".$item."</td>";
						$content .= "<td>".$hsn[$key]."</td>";
						$content .= "<td>".$qty[$key]."</td>";
						$content .= "<td>".$amtHD[$key]."</td>";
						$content .= "<td>".$cgst[$key]."</td>";
						$content .= "<td>".$cgstAmtHD[$key]."</td>";
						$content .= "<td>".$sgst[$key]."</td>";
						$content .= "<td>".$sgstAmtHD[$key]."</td>";
						$content .= "<td>".$finalAmtHD[$key]."</td>";
					$content .="</tr>";		
					$i++;
				}
				for($j = 0;$j < 20 - count($order['product']); $j++) {
					$content .= "<tr class='itemrow blackrow'>";
						$content .= "<td></td>";
						$content .= "<td></td>";
						$content .= "<td></td>";
						$content .= "<td></td>";
						$content .= "<td></td>";
						$content .= "<td></td>";
						$content .= "<td></td>";
						$content .= "<td></td>";
						$content .= "<td></td>";
						$content .= "<td></td>";
					$content .="</tr>";		
					$i++;
				}
				$content .= "<tr class='foottr' style=''>";
					$content .= "<td></td>";
					$content .= "<td></td>";
					$content .= "<td></td>";
					$content .= "<td></td>";
					$content .= "<td>".$order['totalAmtHD']."</td>";
					$content .= "<td colspan='2'>".$order['totalCgstAmtHD']."</td>";
					$content .= "<td colspan='2'>".$order['totalSgstAmtHD']."</td>";
					$content .= "<td>".$order['finalTotalHD']."</td>";
				$content .="</tr>";
			}
		$content .= "</table>";
	$content .= "</div>";
$content .= "</div>";

?>