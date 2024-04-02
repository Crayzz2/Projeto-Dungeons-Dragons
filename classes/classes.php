<?php
require_once 'conexao.php';

class Login
{
    private $IdUser;
    private $Username;
    private $Password;
    private $Email;
    private $con;


    function __construct($user, $pass, $email, $id=null)
    {
        $this->Username = $user;
        $this->Password = $pass;
        $this->IdUser = $id;
        $this->Email = $email;

        self::connect();
    }
    function connect(){
        $banco = new ConexaoPDO(null,null,null,null) ;
        $this->con = $banco->conectar();
    }


    public function Insert()
    {
        $ins = $this->con->prepare("INSERT INTO USERS (USERNAME, PASSWORD, EMAIL) VALUES (:PUsername, :PPassword, :PEmail)");
        $ins->execute(array(':PUsername'=>$this->Username, ':PPassword'=>$this->Password, ':PEmail'=>$this->Email));
        return 'Inserido';
    }

    public function Validate(){
        $vali = $this->con->prepare("SELECT * FROM USERS WHERE USERNAME=:PUsername and PASSWORD=:PPassword");
        $vali->execute(array(':PUsername'=>$this->Username, ':PPassword'=>$this->Password));
        $returnVali = $vali->Fetch();
        if ($returnVali>0){
            session_start();
            $_SESSION['ID_USER']=$returnVali['ID_USER'];
            return 'true';
        }else{
            return 'false';
        }
    }
    
    public function ReturnUsers()
    {
        $sel = $this->con->prepare("SELECT * FROM USERS");
        $sel -> execute();
        $return = $sel->fetchAll();
        return $return;
    }
}