<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    $conexao = new mysqli("localhost", "root", "", "hotel");

    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }

   
    $consulta = $conexao->prepare("SELECT id, email, senha FROM usuarios WHERE email = ? AND senha = ?");
    $consulta->bind_param("ss", $email, $senha);

  
    $consulta->execute();

  
    $resultado = $consulta->get_result();

    
    if ($resultado->num_rows === 1) {
        $_SESSION['email'] = $email;
        header("Location: tela_principal_professor.php");
        exit;
    } else {
        
        header("Location: index.php?error=authentication_failed");
        exit;
    }
} else {
    
    header("Location: index.php?error=invalid_request");
    exit;
}
?>
