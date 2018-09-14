<?php
header ( 'Content-Type: text/html; charset=utf-8' );
header ( 'Expires: Sat, 26 Jul 1997 05:00:00 GMT' );
header ( 'Last-Modified: ' . gmdate ( 'D, d M Y H:i:s' ) . ' GMT' );
header ( 'Cache-Control: no-store, no-cache, must-revalidate' );
header ( 'Cache-Control: post-check=0, pre-check=0', false );
header ( 'Pragma: no-cache' );

require_once 'Global.php';

$param = getParam('param');

if ($param!=null)
{
	switch ($param)
	{
		case 'enviarContato' :
			$nome=getParam('nome');
			$email=getParam('email');
			$conteudo=getParam('conteudo');

			echo CContato::enviarContato($nome, $email, $conteudo);
			break;

		default :
			break;
	}
}

class CContato{
	public static function enviarContato($nome, $email, $conteudo)
	{
		require_once 'MySQLDC.php';

		$query = "call SP_INCLUIR_CONTATO_SITE('$nome', '$email', '$conteudo');";

		$mysql = new MySQLDC();

		$result = $mysql->execSPForInsUpd($query);

		if ($result) {
			return $result;
		} else {
			return -1;
		}
	}
}

?>
