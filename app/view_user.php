<?php 
session_start();
require '../conexao.php';
include '../includes/header.php';
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Visualização de Usuario
                <a href="../index.php" class="btn btn-danger float-end">Voltar</a>
                </h4>
            </div>
            <div class="card-body">
                <?php
                    if(isset($_GET['id'])){
                        $user_id = mysqli_real_escape_string($connect,$_GET['id']);
                        $sql = "SELECT * FROM users WHERE id='".$user_id."'";
                        $query = mysqli_query($connect, $sql);

                        //Verificando se o usuario com o respectivo id existe
                        
                        if(mysqli_num_rows($query) > 0) {
                            $user = mysqli_fetch_array($query);
                ?>
                    <div class="mb-3">
                        <label>Nome</label>
                        <p class="form-control">
                            <?=$user['name']?>
                        </p>
                    </div>
                    <div class="mb-3">
                        <label>E-mail</label>
                        <p class="form-control">
                            <?=$user['email']?>
                        </p>
                    </div>
                    <div class="mb-3">
                        <label>Data de Nascimento</label>
                        <p class="form-control">
                            <?=date('d/m/Y', strtotime($user['aniversario']));?>
                        </p>
                    </div>
                <?php
                    }else{
                        echo '<h5>Nenhum Usuario encontrado</h5>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
include '../includes/footer.php';
?>