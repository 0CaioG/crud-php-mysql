<?php 
session_start();
require '../conexao.php';
include '../includes/header.php';
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Editar Usuario
                <a href="../index.php" class="btn btn-danger float-end">Voltar</a>
                </h4>
            </div>
            <div class="card-body">
                <?php
                    if(isset($_GET['id'])){
                        $user_id = mysqli_real_escape_string($connect,$_GET['id']);
                        $sql = "SELECT * FROM users WHERE id='".$user_id."'";
                        $query = mysqli_query($connect, $sql);

                        if(mysqli_num_rows($query) > 0) {
                            $user = mysqli_fetch_array($query);
                ?>
                <form action="./actions/updateUser.php" method="POST">
                    <input type="hidden" value="<?=$user['id']?>" name="user_id">
                    <div class="mb-3">
                        <label>Nome</label>
                        <input type="text" name="nome" value="<?=$user['name']?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>E-mail</label>
                        <input type="text" name="email" value="<?=$user['email']?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Data de Nascimento</label>
                        <input type="date" name="aniversario" value="<?=$user['aniversario']?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Senha</label>
                        <input type="password" name="senha" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="update_user" class="btn btn-success btn-sm">Atualizar</button>
                    </div>
                </form>
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