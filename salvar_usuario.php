<?php
// Verifica se a ação foi fornecida
if (isset($_REQUEST["acao"])) {
    $acao = $_REQUEST["acao"];

    switch ($acao) {
        case 'cadastrar':
            if (isset($_POST["nome"], $_POST["email"], $_POST["senha"], $_POST["data_nasc"])) {
                $nome = $_POST["nome"];
                $email = $_POST["email"];
                $senha = md5($_POST["senha"]);
                $data_nasc = $_POST["data_nasc"];

                $sql = "INSERT INTO cadastro (nome, email, senha, data_nasc) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssss", $nome, $email, $senha, $data_nasc);

                if ($stmt->execute()) {
                    echo "<script>alert('Cadastro feito com sucesso');</script>";
                    echo "<script>location.href='?page=listar';</script>";
                } else {
                    echo "<script>alert('Não foi possível cadastrar');</script>";
                    echo "<script>location.href='?page=listar';</script>";
                }
            } else {
                echo "<script>alert('Dados incompletos para cadastrar');</script>";
                echo "<script>location.href='?page=listar';</script>";
            }
            break;

        case 'editar':
            if (isset($_POST["nome"], $_POST["email"], $_POST["senha"], $_POST["data_nasc"], $_REQUEST["id"])) {
                $nome = $_POST["nome"];
                $email = $_POST["email"];
                $senha = md5($_POST["senha"]);
                $data_nasc = $_POST["data_nasc"];
                $id = $_REQUEST["id"];

                $sql = "UPDATE cadastro SET nome=?, email=?, senha=?, data_nasc=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssi", $nome, $email, $senha, $data_nasc, $id);

                if ($stmt->execute()) {
                    echo "<script>alert('Operação concluída com sucesso');</script>";
                } else {
                    echo "<script>alert('Não foi possível completar a operação');</script>";
                }

                echo "<script>location.href='?page=listar';</script>";
            } else {
                echo "<script>alert('Dados incompletos para editar');</script>";
                echo "<script>location.href='?page=listar';</script>";
            }
            break;

        case 'excluir':
            if (isset($_REQUEST["id"])) {
                $id = $_REQUEST["id"];

                $sql = "DELETE FROM cadastro WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);

                if ($stmt->execute()) {
                    echo "<script>alert('Excluído com sucesso');</script>";
                    echo "<script>location.href='?page=listar';</script>";
                } else {
                    echo "<script>alert('Não foi possível completar a operação');</script>";
                    echo "<script>location.href='?page=listar';</script>";
                }
            } else {
                echo "<script>alert('ID não fornecido na requisição');</script>";
            }
            break;

        default:
            echo "<script>alert('Ação desconhecida');</script>";
            break;
    }
} else {
    echo "<script>alert('Ação não fornecida na requisição');</script>";
}
?>
