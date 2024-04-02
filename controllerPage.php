<?php
    require 'classes/classes.php';
    require_once 'classes/conexao.php';
    $banco = new ConexaoPDO(null,null,null,null) ;
    $conn = $banco->conectar();

    extract($_POST);

    function InsertUser($formData){
        extract($formData);

        $userObject = new Login($username, $password, $email);

        $ins = $userObject->Insert();

    }
    
    function ReturnUser(){
        $userObject = new Login(null, null);
        $returnUsers = $userObject->ReturnUsers();
        return $returnUsers;
    }

    function ValidateUser($formData){
        extract($formData);
        $userObject = new Login($username, $password, null);
        $vali = $userObject->Validate();
        if($vali=='true'){
            header('Location: index.php');
        }else{
            header('Location: login.php?wrongPassword=True');
        }
    }

    if (isset($save)){
        $return = InsertUser($_POST);
        header('Location: login.php');
    }
    if(isset($login)){
        $validation = ValidateUser($_POST);
    }
    if(isset($_GET['sair'])){
        session_start();
        $_SESSION = array();
        session_destroy();
        header('Location: login.php');
    }

?>