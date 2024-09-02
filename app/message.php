<?php
if(isset($_SESSION['mensagem']) && isset($_SESSION['status'])){

    /*Verificando se a alteração/inserção no banco foi bem sucedida
    *A cor do container da mensagem muda de acordo com o valor de $_SESSION['status']
    */
    
    if($_SESSION['status'] == "success"){
?>
<div class="alert alert-warning alert-dismissible fade show">
    <?=$_SESSION['mensagem']?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php
    }elseif($_SESSION['status'] == "failure"){
?>
<div class="alert alert-danger alert-dismissible fade show">
    <?=$_SESSION['mensagem']?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
    }
    unset($_SESSION['status']);
    unset($_SESSION['mensagem']);
}
?>