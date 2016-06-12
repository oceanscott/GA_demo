<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Google Authentication Demo</title>
</head>
<body>
	<div id="span16" >
		<h1>Google Authentication Demo</h1>
	</div><hr><br>
	<div id="DIV1" style="width:600px;float:left">
		<section>
			<div class="page-header">
				<h2>Create Account</h2>
			</div>

			<form action="GA_creat.php" method="post">
				<fieldset>
					<label for="cName">Name</label><br>
					<input name="cName" type="text" value="" /><br>	
					<input type="submit" name="SB" value="Submit">

				</fieldset>
			</form>
		</section>
	</div>
	
	

	<br>
	

<?php

function CreateSecret()
{
	require_once 'GoogleAuthenticator.php';
	$ga = new PHPGangsta_GoogleAuthenticator(); 
	$secret = $ga->createSecret(); 
	echo "Secret is: ".$secret."\n\n"; 
	return $secret;
}
function GetQRCode($Name, $secret)
{
	require_once 'GoogleAuthenticator.php';
	$ga = new PHPGangsta_GoogleAuthenticator(); 
	$qrCodeUrl = $ga->getQRCodeGoogleUrl($Name, $secret); 
	//echo "Google Charts URL for the QR-Code: ".$qrCodeUrl."\n\n";
	//echo "<img src=\"".$qrCodeUrl."\">"; 

	echo "<img src=qr_img.php?d=$secret&e=M&s=4&v=1>";
	
	return $qrCodeUrl;
}


$cName=$_POST["cName"];
echo "Get from HTML sumit: ".$cName."\n\n";
$data_length=strlen($cName);

if ($data_length<=0) {
    trigger_error("Name do not exist.",E_USER_ERROR);
    exit;
}
else
{
	$secret = CreateSecret();
	$qrCodeUrl = GetQRCode($cName, $secret);
}
//$cName = "Scott@falcon.com";

//$secret = CreateSecret();
//$qrCodeUrl = "";
//$GLOBALS['qrCodeUrl'] = GetQRCode($cName, $secret);
//$qrCodeUrl = GetQRCode($cName, $secret);
//$GLOBALS['secret'];
//Header("Content-type: image/png"); 

//echo "<img src=\"".$qrCodeUrl."\">"; 
//echo "<form name=\"".verify.".\" value=\"".$secret.".\" >";


//echo "<br><br><input type='code'><br>";
//echo "<input type='button' name='call_function' value='呼叫PHP Function:' onclick='<?PHP VerifyCode() 
//echo $GLOBALS[qrCodeUrl];
?>

</body>
</html>
