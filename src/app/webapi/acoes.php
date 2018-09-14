<?php
header('Access-Control-Allow-Origin: *');
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
		case 'teste':
			$cred=getCredentials();
			echo var_dump($cred);
			break;
		case 'incluir' :
			$cod=getParam('cod');
			$last=getParam('last');
			$bid=getParam('bid');
			$ask=getParam('ask');
			$vol=getParam('vol');
			$deal=getParam('deal');
			$var=getParam('var');

			echo CAcao::incluir($cod, $last, $bid, $ask, $vol, $deal, $var);
			break;
		case 'listar' :

			echo CAcao::listar();
			break;

		case 'recuperarCotacao' :

			$id=getParam('id');

			echo CAcao::recuperarCotacao($id);
			break;

		case 'recuperarAcaoPorCodigo' :

			$id=getParam('cod');

			echo CAcao::recuperarAcaoPorCodigo($id);
			break;


		case 'listarCarteiraSemanal' :
			echo CAcao::listarCarteiraSemanal();
			break;

		case 'listarCodigosAcoes':
			echo CAcao::listarCodigosAcoes();
			break;


		default :
			break;
	}
}

class CAcao{
	public static function incluir($cod, $last, $bid, $ask, $vol, $deal, $var)
	{
		require_once 'MySQLDC.php';

		$query = "call SP_ATUALIZAR_VALORES_ACAO('$cod', $last, $bid, $ask, $vol, $deal, $var);";

		$mysql = new MySQLDC();

		$result = $mysql->execSPForInsUpd($query);

		if ($result) {
			return $result;
		} else {
			return -1;
		}
	}


	public static function listar()
	{
		require_once 'MySQLDC.php';

		$query = "CALL SP_LISTARACOES();";

		$mysql = new MySQLDC();

		$result = $mysql->execSPForDataSet($query);

		$JSON = json_encode ( $result );

		if($JSON=="null"){
			$JSON="[]";
		}

		return $JSON;
	}

	public static function listarCarteiraSemanal()
	{
		require_once 'MySQLDC.php';

		$query = "CALL SP_LISTAR_CARTEIRA_ACOES();";

		$mysql = new MySQLDC();

		$result = $mysql->execSPForDataSet($query);

		$JSON = json_encode ( $result );

		if($JSON=="null"){
			$JSON="[]";
		}

		return $JSON;
	}



public static function recuperarAcaoPorCodigo($id)
{
	require_once 'MySQLDC.php';

	$query = "CALL SP_RECUPERAR_ACAO_BY_CODIGO('$id');";

	$mysql = new MySQLDC();

	$result = $mysql->execSPForDataSet($query);

	$JSON = json_encode ( $result );

	if($JSON=="null"){
		$JSON="[]";
	}

	return $JSON;
}



	public static function recuperarCotacao($id)
	{
		require_once 'MySQLDC.php';

		$query = "CALL SP_RECUPERAR_COTACAO($id);";

		$mysql = new MySQLDC();

		$result = $mysql->execSPForDataSet($query);

		$JSON = json_encode ( $result );

		if($JSON=="null"){
			$JSON="[]";
		}

		return $JSON;
	}

	public static function listarCodigosAcoes()
	{
		require_once 'MySQLDC.php';

		$query = "CALL SP_RECUPERAR_CODIGOS_ACOES_CONCAT();";

		$mysql = new MySQLDC();

		$result = $mysql->execSPForDataSet($query);

		//$JSON = json_encode ( $result );

		//if($JSON=="null"){
		//	$JSON="[]";
		//}

		return $result[0]['COD'];
	}


}

?>
