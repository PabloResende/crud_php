<h1>Editar Usuário</h1>

<?php
if (isset($_REQUEST["id"])) {
    $id = $_REQUEST["id"];

    $sql = "SELECT * FROM cadastro WHERE id=" . $id;

    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        $row = $res->fetch_object();
?>

        <form action="?page=salvar" method="POST">
            <input type="hidden" name="acao" value="editar">
            <input type="hidden" name="id" value="<?php echo $row->id; ?>">
            <div class="mb-3">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control" id="nome" value="<?php echo $row->nome; ?>">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo $row->email; ?>">
            </div>
            <div class="mb-3">
                <label>Senha</label>
                <input placeholder="Digite a senha" id="senha" type="password" name="senha" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Data de Nascimento</label>
                <input type="text" name="data_nasc" id="data_nasc" class="form-control" value="<?php echo $row->data_nasc; ?>">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>

<?php
    } else {
        echo "<p>Usuário não encontrado.</p>";
    }
} else {
    echo "<p>ID não fornecido na requisição.</p>";
}
?>