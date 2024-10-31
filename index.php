<?php 

if (isset($_POST['submit'])) {
    include_once('config.php'); // Corrigido: falta de ponto e vírgula

    // Escapando as variáveis para evitar injeção SQL
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
    $sexo = mysqli_real_escape_string($conexao, $_POST['genero']);
    $data_nasc = mysqli_real_escape_string($conexao, $_POST['data_nascimento']);
    $cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);
    $estado = mysqli_real_escape_string($conexao, $_POST['estado']);
    $endereco = mysqli_real_escape_string($conexao, $_POST['endereco']);

    // Montando a consulta SQL com aspas para strings
    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome, email, telefone, sexo, data_nasc, cidade, estado, endereco) 
    VALUES ('$nome','$email','$telefone','$sexo','$data_nasc','$cidade','$estado','$endereco')");

    // Verificando se a inserção foi bem-sucedida
    if ($result) {
        echo "Usuário inserido com sucesso!";
    } else {
        echo "Erro ao inserir usuário: " . mysqli_error($conexao);
    }
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Clients - Formulary (by SilenceCode)</title>
</head>
<body>
    <div class="box">
        <form action="index.php" method="POST">
            <fieldset>
                <legend><b>Formulário de Clientes</b></legend>
                <br>
                <div class="input-box">
                    <label for="">Nome</label>
                    <input type="text" name="nome" id="nome" class="inputuser" required>
                </div>
                <br><br>
                <div class="input-box">
                    <label for="">Emai-l</label>
                    <input type="email" name="email" id="email" class="inputuser" required>
                </div>
                <br><br>
                <div class="input-box">
                    <label for="">Telefone</label>
                    <input type="tel" name="telefone" id="telefone" class="inputuser" required>
                </div>
                <br><br>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">Feminino</label>
                <input type="radio" id="masculino" name="genero" value="masculino" required>
                <label for="masculino">Masculino</label>
                <input type="radio" id="outro" name="genero" value="outro" required>
                <label for="outro">Outro</label>
                <br><br>
                <div class="input-box">
                    <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                    <input type="date" name="data_nascimento" id="data_nascimento" class="inputuser" required>
                </div>
                <br><br>
                <div class="input-box">
                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" id="cidade" class="inputuser" required>
                </div>
                <br><br>
                <div class="input-box">
                    <label for="estado">Estado</label>
                    <input type="text" name="estado" id="estado" class="inputuser" required>
                </div>
                <br><br>
                <div class="input-box">
                    <label for="endereco">Endereço</label>
                    <input type="text" name="endereco" id="endereco" class="inputuser" required>
                </div>
                <br><br>
                <input type="submit" name="submit" placeholder="Enviar" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>