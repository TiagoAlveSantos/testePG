<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tela de Autenticação</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="Nav">
        <li><a href="index.php">Pagina Inicial</a></li>
    </div>
    
    <div class="container">
        <div class="header">
            <h1>Bem Vindo</h1>
        </div>

        <?php
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
            if ($error === 'authentication_failed') {
                echo '<p style="color: red;">Erro: Autenticação falhou. Verifique seu e-mail e senha.</p>';
            } elseif ($error === 'invalid_request') {
                echo '<p style="color: red;">Erro: Solicitação inválida.</p>';
            }
        }
        ?>

        <div class="form-container">
            <form action="processa_login.php" method="POST" class="formulario">
                <label for="email">E-mail:</label>
                <input type="email" name="email" required><br>

                <label for="senha">Senha:</label>
                <input type="password" name="senha" required><br>

                <button type="submit">Entrar</button>
            </form>
        </div>
    </div>
</body>
</html>
