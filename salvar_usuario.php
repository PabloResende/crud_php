<?php
switch ($_REQUEST["acao"]) {
    case 'cadastrar';
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $dara_nasc = $_POST["data_nasc"];

        $sql = "INSERT INTO cadastro (nome, email, senha, data_nasc) VALUES ('{$nome}','{$email}','{$senha}','{$dara_nasc}')";

        $res = $conn->query($sql);
        break;
    case 'editar';
        //code...
        break;
    case 'excluir';
        //code...
        break;
}
