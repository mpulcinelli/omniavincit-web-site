<?php
header ( 'Content-Type: text/html; charset=utf-8' );
header ( 'Expires: Sat, 26 Jul 1997 05:00:00 GMT' );
header ( 'Last-Modified: ' . gmdate ( 'D, d M Y H:i:s' ) . ' GMT' );
header ( 'Cache-Control: no-store, no-cache, must-revalidate' );
header ( 'Cache-Control: post-check=0, pre-check=0', false );
header ( 'Pragma: no-cache' );

require_once 'Global.php';
require_once 'opcoes.php';

set_time_limit(300);

$param = getParam('param');


/*
$file = fopen("lista_opcao.txt","w");
echo fwrite($file,$param);
fclose($file);

$handle = fopen("lista_opcao.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {

			$col = array_filter(explode (",", $line));
			file_put_contents('lista_opcao_result.txt', $line, FILE_APPEND | LOCK_EX);

			if($col[0]!=NULL){
				COpcao::incluir(trim($col[0]),
												$col[9]==''?0:$col[9],
												$col[14]==''?0:$col[14],
												$col[15]==''?0:$col[15],
												$col[13]==''?0:$col[13],
												$col[11]==''?0:$col[11]);
			}
    }

  fclose($handle);
} else {
    // error opening the file.
}

*/

$row =preg_split('/[\r\n]+/', $param);
//$row = explode (PHP_EOL, $param);

for ($i = 0; $i < count($row)-1; $i++) {
	$col = explode (",", $row[$i]);

	//file_put_contents('lista_opcao_result.txt', print_r($col, true), FILE_APPEND | LOCK_EX);

	if($col[0]!=NULL){

		$code = trim($col[0]);
		$bid  = floatval ($col[14]);
		$ask  = floatval ($col[15]);
		$last = floatval ($col[9]);
		$deal = floatval ($col[11]);
		$vol  = floatval ($col[13]);
		$var  = floatval ($col[16]);


		COpcao::incluir($code,
										$bid,
										$ask,
										$last,
										$vol,
										$deal,
										$var);
	}

}

echo "OK";


?>
