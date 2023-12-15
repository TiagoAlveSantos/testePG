<php
if (isset($_POST['Acao'])) {
    $Acao = filter_input(INPUT_POST, 'Acao', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['Acao'])) {
    $Acao = filter_input(INPUT_GET, 'Acao', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $Acao = "";
}

if (isset($_POST['Id'])) {
    $Id = filter_input(INPUT_POST, 'Id', FILTER_SANITIZE_SPECIAL_CHARS);
} elseif (isset($_GET['Id'])) {
    $Id = filter_input(INPUT_GET, 'Id', FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    $Id = 0;
}

// Variáveis relacionadas à autenticação de usuários (login)
$EmailLogin = isset($_POST['EmailLogin']) ? filter_input(INPUT_POST, 'EmailLogin', FILTER_VALIDATE_EMAIL) : "";
$SenhaLogin = isset($_POST['SenhaLogin']) ? filter_input(INPUT_POST, 'SenhaLogin', FILTER_SANITIZE_SPECIAL_CHARS) : "";

// Variáveis relacionadas à tela principal do professor
$NomeProfessor = isset($_POST['NomeProfessor']) ? filter_input(INPUT_POST, 'NomeProfessor', FILTER_SANITIZE_SPECIAL_CHARS) : "";
$AcaoProfessor = isset($_POST['AcaoProfessor']) ? filter_input(INPUT_POST, 'AcaoProfessor', FILTER_SANITIZE_SPECIAL_CHARS) : "";
$IdTurma = isset($_POST['IdTurma']) ? filter_input(INPUT_POST, 'IdTurma', FILTER_SANITIZE_SPECIAL_CHARS) : "";

// Variáveis relacionadas à tela de cadastro de turma
$NumeroTurma = isset($_POST['NumeroTurma']) ? filter_input(INPUT_POST, 'NumeroTurma', FILTER_SANITIZE_SPECIAL_CHARS) : "";
$NomeTurma = isset($_POST['NomeTurma']) ? filter_input(INPUT_POST, 'NomeTurma', FILTER_SANITIZE_SPECIAL_CHARS) : "";
?>
