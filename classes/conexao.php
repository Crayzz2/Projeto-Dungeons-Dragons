<?php
class ConexaoPDO {
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $conn;

    public function __construct($host=null, $dbname=null, $username=null, $password=null) {
        $this->host = 'localhost';
        $this->dbname = 'DDSITE';
        $this->username = 'root';
        $this->password = '';
    }

    public function conectar() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $this->conn = new PDO($dsn, $this->username, $this->password, $options);
            return $this->conn;
        } catch (PDOException $e) {
            throw new Exception("Erro na conexão com o banco de dados: " . $e->getMessage());
        }
    }

    public function desconectar() {
        $this->conn = null;
    }
}
