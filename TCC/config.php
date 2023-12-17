<?php
class banco
{
 private $host = "localhost";
    private $user = "root";
    private $senha = "";
    private $dbname = "campezan";
    public $con;

    function conecta()
    {
        $this->con = @mysqli_connect($this->host, $this->user, $this->senha, $this->dbname);
        if (!$this->con) {
            die("Problemas com a conexăo");
        }
    }
}
?>