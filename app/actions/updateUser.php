<?php
session_start();
require '../../conexao.php';

if(isset($_POST['update_user'])){
    //Passando todos os valores pela função mysqli_real_escape_string() para trata-los e previnir SQL injection
    
    $userId = mysqli_real_escape_string($connect,$_POST['user_id']);

    $nome = mysqli_real_escape_string($connect,trim($_POST['nome']));
    $email = mysqli_real_escape_string($connect,trim($_POST['email']));
    $aniversario = mysqli_real_escape_string($connect,trim($_POST['aniversario']));
    $senha = mysqli_real_escape_string($connect,trim($_POST['senha']));

    $sql = "UPDATE users SET name='$nome', email='$email', aniversario='$aniversario'";

    //Verifica se o campo senha foi preenchido para fazer o tratamento

    if(!empty($senha)){
        $sql .= ",senha='". password_hash($senha,PASSWORD_DEFAULT) ."'";
    }

    $sql .= " WHERE  id='$userId'";
    
    mysqli_query($connect,$sql);

    //Verificando se os dados foram editados no banco

    if(mysqli_affected_rows($connect) > 0){
        $_SESSION['mensagem'] = 'Usuário editado com sucesso!';
        $_SESSION['status'] = 'success';
        header('location: /app/lista_usuarios.php');
        exit;
    }else{
        $_SESSION['mensagem'] = 'Usuario não foi editado!';
        $_SESSION['status'] = 'failure';
        header('location: /app/lista_usuarios.php');
        exit;
    }
}