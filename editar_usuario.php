<h1>Editar Usuário</h1>

<?php
$sql = "SELECT * FROM cadastro WHERE id=" . $_REQUEST["id"];

$res = $conn->query($sql);
$row = $res->fetch_object();
?>

<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="editar" value="<?php echo  $row->id; ?>">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" value="<?php echo $row->nome; ?>">
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?php echo $row->email; ?>">
    </div>
    <div class="mb-3">
        <label>Senha</label>
        <input placeholder="Digite a senha" type="password" name="senha" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Data de Nascimento</label>
        <input type="text" name="data_nasc" class="form-control" value="<?php echo $row->data_nasc; ?>">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>