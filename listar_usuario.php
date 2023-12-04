<h1>Listar Usuário</h1>
<?php
$sql = "SELECT * FROM cadastro";

$res = $conn->query($sql);

$qtd = $res->num_rows;

if ($qtd > 0) {
    echo "<table class='table table-hover table-striped table-bordered'>";
    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>Nome</th>";
    echo "<th>Email</th>";
    echo "<th>Nascimento</th>";
    echo "<th>Ações</th>";
    echo "</tr>";
    while ($row = $res->fetch_object()) {
        echo "<tr>";
        echo "<td>" . $row->id . "</td>";
        echo "<td>" . $row->nome . "</td>";
        echo "<td>" . $row->email . "</td>";
        echo "<td>" . $row->data_nasc . "</td>";
        echo "<td>
                <button onClick=\"location.href=?page=editar&id=".$row->id;"\"  class='btn btn-success'>Editar</button>
                <button class='btn btn-danger'>Excluir</button>
        </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p class='alert alert-danger'>Não encontrou resultado</p>";
}
?>