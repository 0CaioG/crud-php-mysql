<?php
session_start();
require '../../conexao.php';

if(isset($_POST['create_user'])){

    //Passando todos os valores pela função mysqli_real_escape_string() para trata-los e previnir SQL injection

    $nome = mysqli_real_escape_string($connect,trim($_POST['nome']));
    $email = mysqli_real_escape_string($connect,trim($_POST['email']));
    $aniversario = mysqli_real_escape_string($connect,trim($_POST['aniversario']));

    //Tratando o valor da senha utilizando hash
    
    $senha = isset($_POST['senha']) ? mysqli_real_escape_string($connect,password_hash(trim($_POST['senha']),PASSWORD_DEFAULT)) : '';

    $sql = "INSERT INTO  users (name,email,aniversario,senha) VALUES('$nome','$email','$aniversario','$senha')";

    mysqli_query($connect,$sql);

    //Verificando se os dados foram inseridos no banco

    if(mysqli_affected_rows($connect) > 0){
        $_SESSION['mensagem'] = 'Usuário criado com sucesso!';
        $_SESSION['status'] = 'success';
        header('location: /app/lista_usuarios.php');
        exit;
    }else{
        $_SESSION['mensagem'] = 'Não foi possível criar o usuário!';
        $_SESSION['status'] = 'failure';
        header('location: /app/lista_usuarios.php');
        exit;
    }
}