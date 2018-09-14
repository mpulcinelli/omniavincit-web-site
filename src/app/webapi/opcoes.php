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
		case 'incluir' :
			$cod=getParam('cod');
			$bid=getParam('bid');
			$ask=getParam('ask');
			$last=getParam('last');
			$vol=getParam('vol');
			$deal=getParam('deal');
			$var=getParam('var');

			echo COpcao::incluir($cod, $bid, $ask, $last, $vol, $deal, $var);
			break;



		case 'listarVencimentosOpcoes' :
			echo COpcao::listarVencimentosOpcoes();
			break;

		case 'recuperarOpcoesAcao' :
			$idacao=getParam('idacao');
			$tipo=getParam('tipo');
			$dataVencimento=getParam('dataVencimento');

			echo COpcao::recuperarOpcoesAcao($idacao, $tipo, $dataVencimento);
			break;

		case 'listarCodigosOpcoes':
			$data=getParam('data');
			echo COpcao::listarCodigosOpcoes($data);
			break;

		case 'listarOpcoesVendaCobertaPorAcao' :
			$idacao=getParam('idacao');
			$tipo=getParam('tipo');
			$quantidade=getParam('quantidade');

			echo COpcao::listarOpcoesVendaCobertaPorAcao($idacao, $quantidade, $tipo);
			break;

		case 'listarOpcoesParaPozinho' :
			$idacao=getParam('idacao');
			$limite=getParam('limite');

			echo COpcao::listarOpcoesParaPozinho($idacao, $limite);
			break;

		case 'listarOpcoesParaPozinhoPorVencimento' :
			$idacao=getParam('idacao');
			$limite=getParam('limite');
			$dataVencimento=getParam('dataVencimento');

			echo COpcao::listarOpcoesParaPozinhoPorVencimento($idacao, $limite, $dataVencimento);
			break;



		default :
			break;
	}
}

class COpcao{
	public static function incluir($cod, $bid, $ask, $last, $vol, $deal, $var)
	{
		require_once 'MySQLDC.php';

		$query = "call SP_ATUALIZAR_VALORES_OPCAO('$cod', $bid, $ask, $last, $vol, $deal, $var);";

		$mysql = new MySQLDC();

		$result = $mysql->execSPForInsUpd($query);

		if ($result) {
			return $result;
		} else {
			return -1;
		}
	}

	public static function listarOpcoesVendaCobertaPorAcao($idacao, $quantidade, $tipo)
	{
		require_once 'MySQLDC.php';

		$query = "CALL SP_LISTA_VENDACOBERTA_POR_ACAO($idacao, $quantidade , '$tipo');";

		$mysql = new MySQLDC();

		$result = $mysql->execSPForDataSet($query);

		$JSON = json_encode ( $result );

		if($JSON=="null"){
			$JSON="[]";
		}

		return $JSON;
	}

	public static function listarVencimentosOpcoes()
	{
		require_once 'MySQLDC.php';

		$query = "CALL SP_LISTAR_VENCIMENTOS_OPCOES();";

		$mysql = new MySQLDC();

		$result = $mysql->execSPForDataSet($query);

		$JSON = json_encode ( $result );

		if($JSON=="null"){
			$JSON="[]";
		}

		return $JSON;
	}



	public static function listarOpcoesParaPozinho($idacao, $limite)
	{
		require_once 'MySQLDC.php';

		$query = "CALL SP_LISTAR_OPCAO_POZINHO($idacao, $limite);";

		$mysql = new MySQLDC();

		$result = $mysql->execSPForDataSet($query);

		$JSON = json_encode ( $result );

		if($JSON=="null"){
			$JSON="[]";
		}

		return $JSON;
	}

	public static function listarOpcoesParaPozinhoPorVencimento($idacao, $limite, $data)
	{
		require_once 'MySQLDC.php';

		$query = "CALL SP_LISTAR_OPCAO_POZINHO_POR_VENCIMENTO($idacao, $limite, '$data');";

		$mysql = new MySQLDC();

		$result = $mysql->execSPForDataSet($query);

		$JSON = json_encode ( $result );

		if($JSON=="null"){
			$JSON="[]";
		}

		return $JSON;
	}






	public static function recuperarOpcoesAcao($idacao, $tipo, $dataVencimento)
	{
		require_once 'MySQLDC.php';

		$query = "CALL SP_LISTAR_OPCOES_POR_ACAO($idacao, '$tipo', '$dataVencimento');";

		$mysql = new MySQLDC();

		$result = $mysql->execSPForDataSet($query);

		$JSON = json_encode ( $result );

		if($JSON=="null"){
			$JSON="[]";
		}

		return $JSON;
	}

	public static function listarCodigosOpcoes($data)
	{
		require_once 'MySQLDC.php';

		$query = "CALL SP_RECUPERAR_CODIGOS_OPCOES_CONCAT('$data');";

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
