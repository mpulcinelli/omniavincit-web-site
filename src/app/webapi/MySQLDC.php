<?php
require_once 'Global.php';

class MySQLDC
{
    var $host;
    var $usr;
    var $pw;
    var $db;
    var $sql; // Query
    var $conn; // Conexão ao banco
    var $resultado; // Resultado de uma consulta

    function loadCredentials()
    {
         $cred = getCredentials();
         $this->host = $cred->{'host'};
         $this->usr = $cred->{'usr'};
         $this->pw = $cred->{'pw'};
         $this->db = $cred->{'db'};
    }

    // Esta função conecta-se ao banco de dados e o seleciona.
    function connMySQL()
    {
        $this->loadCredentials();

        $this->conn = mysqli_connect($this->host, $this->usr, $this->pw, $this->db);

        mysqli_set_charset($this->conn, "utf8");

        if (!$this->conn) {
            exit();
        } elseif (! mysqli_select_db($this->conn, $this->db)) {
            exit();
        }
    }

    // Função para executar SPs (Stored Procedures). Utiliza-se a Função mysqli_multi_query()
    // porque as SPs retornam mais de um conjunto de resultados e a Função mysqli_query() não consegue
    // trabalhar com respostas múltiplas, ocasionando eventuais erros.
    public function execSPForInsUpd($sql)
    {
        $this->connMySQL();
        $this->sql = $sql;
        if (mysqli_multi_query($this->conn, $this->sql)) {

            $this->resultado = mysqli_store_result($this->conn);

            $row = mysqli_fetch_row($this->resultado);

            mysqli_free_result($this->resultado);


            while($this->conn->more_results() && $this->conn->next_result())
            {
            	$extraResult = $this->conn->use_result();
            	if($extraResult instanceof mysqli_result){
            		$extraResult->free();
            	}
            }

            $this->closeConnMySQL();

            return $row[0];

        } else {

            $this->closeConnMySQL();
        }
    }

    // Função para executar SPs (Stored Procedures). Utiliza-se a função mysqli_multi_query()
    // porque as SPs retornam mais de um conjunto de resultados e a função mysqli_query() não consegue
    // trabalhar com respostas múltiplas, ocasionando eventuais erros.
    public function execSPForDataSet($sql)
    {
        $this->connMySQL();

        $this->sql = $sql;

        $table_result=null;

        if (mysqli_multi_query($this->conn, $this->sql)) {

            $this->resultado = mysqli_store_result($this->conn);

            while ($row = mysqli_fetch_assoc($this->resultado)) {

                if ($row)
                    $table_result[] = $row;
            }

            mysqli_free_result($this->resultado);

            while($this->conn->more_results() && $this->conn->next_result())
            {
            	$extraResult = $this->conn->use_result();
            	if($extraResult instanceof mysqli_result){
            		$extraResult->free();
            	}
            }

            $this->closeConnMySQL();

            if (! $table_result)
                return null;
            else
                return $table_result;
        } else {
            exit();
            $this->closeConnMySQL();
        }
    }

    // Função para encerramento da conexão com o banco de dados.
    function closeConnMySQL()
    {
    	$thread_id = mysqli_thread_id($this->conn);
    	mysqli_kill($this->conn, $thread_id);
        return mysqli_close($this->conn);
    }
} // Finaliza a classe MySQL

?>
