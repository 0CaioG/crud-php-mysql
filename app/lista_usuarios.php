<?php
session_start();
require '../conexao.php';
include '../includes/header.php';
?>
<?php include('./message.php');?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Lista de Usuarios
                <a href="create_users.php" class="btn btn-success float-end">Adicionar Usuarios</a>
                </h4>
            </div>
            <div class="card-body mt-4">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>E-Mail</th>
                            <th>Data de Nascimento</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = 'SELECT * FROM users';
                            $users = mysqli_query($connect,$query);
                            if(mysqli_num_rows($users) > 0){
                                foreach($users as $user){
                        ?>
                        <tr>
                            <td><?=$user['id'];?></td>
                            <td><?=$user['name'];?></td>
                            <td><?=$user['email']?></td>
                            <td><?=date('d/m/Y', strtotime($user['aniversario']))?></td>
                            <td>
                                <a href="view_user.php?id=<?=$user['id'];?>" class="btn btn-secondary btn-sm"><span class="bi-eye-fill">
                                </span>&nbsp; Visualizar</a>
                                <a href="update_user.php?id=<?=$user['id'];?>" class="btn btn-warning btn-sm">
                                    <span class="bi-pencil-fill"></span>&nbsp;Editar</a>
                                <form action="./actions/deleteUser.php" method="POST" class="d-inline">
                                    <button onclick="return confirm('Você deseja mesmo excluir o usuario <?=$user['name'];?>?')" type="submit" name="delete_user" value="<?=$user['id'];?>" class="btn btn-danger btn-sm">
                                        <span class="bi-trash3-fill"></span>&nbsp;Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                                }
                            }else{
                                echo '<h5>Nenhum Usuario encontrado</h5>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
include '../includes/footer.php';
?>