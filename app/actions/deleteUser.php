<?php
session_start();
require '../../conexao.php';

if(isset($_POST['delete_user'])){

    $userId = mysqli_real_escape_string($connect,$_POST['delete_user']);

    $sql = "DELETE FROM users WHERE id='$userId'";

    mysqli_query($connect,$sql);

    if(mysqli_affected_rows($connect) > 0){
        $_SESSION['mensagem'] = 'Usuário Excluído com sucesso!';
        $_SESSION['status'] = 'success';
        header('location: /app/lista_usuarios.php');
        exit;
    }else{
        $_SESSION['mensagem'] = 'Não foi possível excluir este usuario!';
        $_SESSION['status'] = 'failure';
        header('location: /app/lista_usuarios.php');
        exit;
    }
}