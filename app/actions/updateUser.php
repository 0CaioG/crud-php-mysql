<?php
session_start();
require '../../conexao.php';

if(isset($_POST['update_user'])){

    $userId = mysqli_real_escape_string($connect,$_POST['user_id']);

    $nome = mysqli_real_escape_string($connect,trim($_POST['nome']));
    $email = mysqli_real_escape_string($connect,trim($_POST['email']));
    $aniversario = mysqli_real_escape_string($connect,trim($_POST['aniversario']));
    $senha = mysqli_real_escape_string($connect,trim($_POST['senha']));

    $sql = "UPDATE users SET name='$nome', email='$email', aniversario='$aniversario'";

    if(!empty($senha)){
        $sql .= ",senha='". password_hash($senha,PASSWORD_DEFAULT) ."'";
    }

    $sql .= " WHERE  id='$userId'";
    
    mysqli_query($connect,$sql);

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