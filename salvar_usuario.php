<?php
switch ($_REQUEST["acao"]) {
    case 'cadastrar';
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        $dara_nasc = $_POST["data_nasc"];

        $sql = "INSERT INTO cadastro (nome, email, senha, data_nasc) VALUES ('{$nome}','{$email}','{$senha}','{$dara_nasc}')";

        $res = $conn->query($sql);

        if ($res == true) {
            echo "<script>alert('Cadastro feito com sucesso');</script>";
            echo    "<script>location.href='?page=listar';</script>";
        } else {
            echo "<script>Não foi possível cadastrar;</script>";
            echo "<script>location.href=?page=listar;</script>";
        }
        break;
    case 'editar';
        //code...
        break;
    case 'excluir';
        //code...
        break;
}
