<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

include('delhicab-admin/connection.php');

$booking_from=$_POST['booking_from'];
$booking_to=$_POST['booking_to'];
$pick_date=$_POST['pick_date'];
$drop_date=$_POST['drop_date'];
$trip_type=$_POST['trip_type'];
$vehicle_name=$_POST['vehicle_name'];
$total_charges=$_POST['total_charges'];
$Customer_type=$_POST['Customer_type'];
$cust_ref_no = $_POST['CUST_ID'];
$customer_name=$_POST['customer_name'];
$customer_email=$_POST['customer_email'];
$customer_phone=$_POST['customer_phone'];
$customer_address=$_POST['customer_address'];
$additional=$_POST['additional'];

$booking_number = $_POST['ORDER_ID'];
	
$q = "INSERT INTO booking_details (cust_reference_no,customer_name, Customer_type, customer_email, customer_phone, customer_address, additional, booking_from, booking_to, pick_date, drop_date, trip_type, vehicle_name, total_charges, payment_status, transaction_number, booking_status, booking_date, booking_number) values ('$cust_ref_no','$customer_name', '$Customer_type', '$customer_email', '$customer_phone', '$customer_address', '$additional', '$booking_from', '$booking_to', '$pick_date', '$drop_date', '$trip_type', '$vehicle_name', '$total_charges', 'Pending', 'Pending', 'Pending', NOW(), '$booking_number')";
$run=mysqli_query($admin_con, $q);

if($run)
{
	$checkSum = "";
	$paramList = array();

	$ORDER_ID = $_POST["ORDER_ID"];
	$CUST_ID = $_POST["CUST_ID"];
	$INDUSTRY_TYPE_ID = $_POST["INDUSTRY_TYPE_ID"];
	$CHANNEL_ID = $_POST["CHANNEL_ID"];
	$TXN_AMOUNT = $_POST["total_charges"];

	// Create an array having all required parameters for creating checksum.
	$paramList["MID"] = PAYTM_MERCHANT_MID;
	$paramList["ORDER_ID"] = $ORDER_ID;
	$paramList["CUST_ID"] = $CUST_ID;
	$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
	$paramList["CHANNEL_ID"] = $CHANNEL_ID;
	$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
	$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;

	
	$paramList["CALLBACK_URL"] = "http://delhicarbooking.in/thank-you.php";
	
	/*

	$paramList["MSISDN"] = $MSISDN; //Mobile number of customer
	$paramList["EMAIL"] = $EMAIL; //Email ID of customer
	$paramList["VERIFIED_BY"] = "EMAIL"; //
	$paramList["IS_USER_VERIFIED"] = "YES"; //

	*/

	//Here checksum string will return by getChecksumFromArray() function.
	$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
}

?>
<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
		<table border="1">
			<tbody>
			<?php
			foreach($paramList as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
			<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
			</tbody>
		</table>
		<script type="text/javascript">
			document.f1.submit();
		</script>
	</form>
</body>
</html>