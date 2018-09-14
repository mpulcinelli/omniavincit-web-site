<?php
header ( 'Content-Type: text/html; charset=utf-8' );
header ( 'Expires: Sat, 26 Jul 1997 05:00:00 GMT' );
header ( 'Last-Modified: ' . gmdate ( 'D, d M Y H:i:s' ) . ' GMT' );
header ( 'Cache-Control: no-store, no-cache, must-revalidate' );
header ( 'Cache-Control: post-check=0, pre-check=0', false );
header ( 'Pragma: no-cache' );

require_once 'Global.php';
require_once 'acoes.php';

set_time_limit(300);

$param = getParam('param');
/*
$file = fopen("lista_acao.txt","w");
echo fwrite($file,$param);
fclose($file);

$handle = fopen("lista_acao.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {

			file_put_contents('lista_acao_result.txt', $line, FILE_APPEND | LOCK_EX);

			$col = array_filter(explode (",", $line));

			if($col[0]!=NULL){
				CAcao::incluir(trim($col[0]),
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


$row = array_filter(explode (PHP_EOL, $param));

for ($i = 0; $i < count($row)-1; $i++) {
	$col = array_filter(explode (",", $row[$i]));
	if($col[0]!=NULL){
		CAcao::incluir(trim($col[0]),
										$col[9]==''?0:$col[9],
										$col[14]==''?0:$col[14],
										$col[15]==''?0:$col[15],
										$col[13]==''?0:$col[13],
										$col[11]==''?0:$col[11],
										$col[16]==''?0:$col[16]);
	}

}



echo "OK";


?>
