<?php
    switch ($acao) {
        case 'cadastrar':
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = md5($_POST["senha"]);
            $dara_nasc = $_POST["data_nasc"];

            $sql = "INSERT INTO cadastro (nome, email, senha, data_nasc) VALUES ('{$nome}','{$email}','{$senha}','{$dara_nasc}')";

            $res = $conn->query($sql);

            if ($res == true) {
                echo "<script>alert('Cadastro feito com sucesso');</script>";
                echo "<script>location.href='?page=listar';</script>";
            } else {
                echo "<script>alert('Não foi possível cadastrar');</script>";
                echo "<script>location.href='?page=listar';</script>";
            }
            break;
        case 'editar':
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = md5($_POST["senha"]);
            $data_nasc = $_POST["data_nasc"];

            if (isset($_REQUEST["id"])) {
                $id = $_REQUEST["id"];

                $sql = "UPDATE cadastro SET
                    nome = ?,
                    email = ?,
                    senha = ?,
                    data_nasc = ?
                WHERE id = ?";

                $stmt = $conn->prepare($sql);

                // Bind parameters
                $stmt->bind_param("ssssi", $nome, $email, $senha, $data_nasc, $id);

                // Executar a consulta
                if ($stmt->execute()) {
                    echo "<script>alert('Operação concluída com sucesso');</script>";
                } else {
                    echo "<script>alert('Não foi possível completar a operação');</script>";
                }
            } else {
                echo "<script>alert('ID não fornecido na requisição');</script>";
            }

            echo "<script>location.href='?page=listar';</script>";
            break;
        case 'excluir':
            if (isset($_REQUEST["id"])) {
                $id = $_REQUEST["id"];

                $sql = "DELETE FROM cadastro WHERE id = $id";

                $res = $conn->query($sql);

                if ($res==true) {
                    echo "<script>alert('Excluído com sucesso');</script>";
                    echo "<script>location.href='?page=listar';</script>";
                } else {
                    echo "<script>alert('Não foi possível completar a operação');</script>";
                    echo "<script>location.href='?page=listar';</script>";
                }
            break;;
    }
?>
