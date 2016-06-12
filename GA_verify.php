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

			<form action="GA_verify.php" method="post">
				<fieldset>
					<label for="vName">name</label><br>
					<input name="vName" type="text" value="" /><br>
					<label for="vPassword">password</label><br>
					<input name="vPassword" type="text" value="" /><br>
					<label for="vCode">code</label><br>
					<input name="vCode" type="text" value="" /><br>
					<input type="submit" name="SB" value="Submit">

				</fieldset>
			</form>
		</section>
	</div>
	
	

	<br>
	

<?php
/*
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
	echo "Google Charts URL for the QR-Code: ".$qrCodeUrl."\n\n";
	return $qrCodeUrl;
}
*/
function VerifyCode($vName, $vPassword, $vCode)
{
	//$vName = "Scott@falcon.com";
	//$vPassword = "JXUU3JX4VCVJDVNX";
	/*
	$vName=$_POST["vName"];
	$vPassword=$_POST["vPassword"];
	$vCode=$_POST["vCode"];
	
	echo "Get from HTML sumit 'Name' : ".$vName."\n\n";
	echo "Get from HTML sumit 'Password' : ".$vPassword."\n\n";
	echo "Get from HTML sumit 'Code' : ".$vCode."\n\n";
*/
	require_once 'GoogleAuthenticator.php';
	$ga = new PHPGangsta_GoogleAuthenticator();
	$oneCode = $ga->getCode($vPassword); 
		echo "OneCode: ".$oneCode."\n\n";
	
	$checkResult = $ga->verifyCode($vPassword, $vCode, 2);    // 2 = 2*30sec clock tolerance 
	if ($checkResult) { 
    	echo '...OK...'; 
 	}
 	else { 
     echo '...FAILED...'; 
 	} 
 	

}

$vName=$_POST["vName"];
$vPassword=$_POST["vPassword"];
$vCode=$_POST["vCode"];


echo "Get from HTML sumit: ".$vCode."\n\n";
$data_length=strlen($vCode);

if ($data_length<=0) {
    trigger_error("Code do not exist.",E_USER_ERROR);
    exit;
}
else
 {
	VerifyCode($vName, $vPassword, $vCode);
}


?>

</body>
</html>
