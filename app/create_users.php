<?php 
session_start();
require '../conexao.php';
include '../includes/header.php';
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Criar Usuario
                <a href="../index.php" class="btn btn-danger float-end">Voltar</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="./actions/createUser.php" method="POST">
                    <div class="mb-3">
                        <label>Nome</label>
                        <input type="text" name="nome" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>E-mail</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Data de Nascimento</label>
                        <input type="date" name="aniversario" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Senha</label>
                        <input type="password" name="senha" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="create_user" class="btn btn-success btn-sm">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include '../includes/footer.php';
?>