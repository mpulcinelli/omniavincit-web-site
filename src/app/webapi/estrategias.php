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
		case 'incluirTravaAlta' :
			$id=getParam('id');
			$codigoopcaocompra=getParam('codigoopcaocompra');
			$strikeopcaocompra=getParam('strikeopcaocompra');
			$premioopcaocompra=getParam('premioopcaocompra');
			$codigoopcaovenda=getParam('codigoopcaovenda');
			$strikeopcaovenda=getParam('strikeopcaovenda');
			$premioopcaovenda=getParam('premioopcaovenda');
      $spreadoperacao=getParam('spreadoperacao');
      $tamanhotrava=getParam('tamanhotrava');
      $percentuallucromaximo=getParam('percentuallucromaximo');

			echo CEstrategia::incluirTrava($id, $codigoopcaocompra,
                                         $strikeopcaocompra, $premioopcaocompra,
                                         $codigoopcaovenda, $strikeopcaovenda,
                                         $premioopcaovenda, $spreadoperacao,
                                         $tamanhotrava, $percentuallucromaximo);
			break;

      case 'recuperarTravaAlta' :
  			$id=getParam('id');

  			echo CEstrategia::recuperarTrava($id);
  			break;

		default :
			break;
	}
}

class CEstrategia{

  public static function incluirTrava($id, $codigoopcaocompra,
                                     $strikeopcaocompra, $premioopcaocompra,
                                     $codigoopcaovenda, $strikeopcaovenda,
                                     $premioopcaovenda, $spreadoperacao,
                                     $tamanhotrava, $percentuallucromaximo)
  {
    require_once 'MySQLDC.php';

    $query = "call SP_INCLUIR_ESTRATEGIA_TRAVA('$id', '$codigoopcaocompra', $strikeopcaocompra, $premioopcaocompra,
                                                    '$codigoopcaovenda', $strikeopcaovenda, $premioopcaovenda, $spreadoperacao,
                                                     $tamanhotrava, $percentuallucromaximo);";

    $mysql = new MySQLDC();

    $result = $mysql->execSPForInsUpd($query);

    if ($result) {
      return $result;
    } else {
      return -1;
    }
  }

  public static function recuperarTrava($id)
	{
		require_once 'MySQLDC.php';

		$query = "CALL SP_RECUPERAR_ESTRATEGIA_TRAVA('$id');";

		$mysql = new MySQLDC();

		$result = $mysql->execSPForDataSet($query);

		$JSON = json_encode ( $result );

		if($JSON=="null"){
			$JSON="[]";
		}

		return $JSON;
	}

}
