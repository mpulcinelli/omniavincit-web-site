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
	$myfile = fopen("F:\Marcio\Desenv\Web\omniavincit-web-site\src\app\webapi\cred.dat", "r") or die("Unable to open file!");
	$file_content = fread($myfile,filesize("F:\Marcio\Desenv\Web\omniavincit-web-site\src\app\webapi\cred.dat"));
	fclose($myfile);

	$data = json_decode($file_content);

	return $data;
}

?>