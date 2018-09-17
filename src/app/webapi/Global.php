<?php
function getParam($param) {
	if (isset ( $_GET [$param] ))
		return $_GET [$param];
	if (isset ( $_POST [$param] ))
		return $_POST [$param];
	if (isset ( $_REQUEST [$param] ))
		return $_REQUEST [$param];

	return null;
}

function getCredentials()
{
	$myfile = fopen("cred.dat", "r") or die("Unable to open file!");
	$file_content = fread($myfile,filesize("cred.dat"));
	fclose($myfile);

	$data = json_decode($file_content);

	return $data;
}

function getImageBase64($img_path)
{
	$type = pathinfo($img_path, PATHINFO_EXTENSION);
	$img_data = file_get_contents($img_path);
	$base64 = 'data:image/' . $type . ';base64,' . base64_encode($img_data);

	return $base64;
}
?>
