<?php
session_start();

include_once 'ClassCrud.php';

$Crud = new ClassCrud();
$turmas = $Crud->getTurmas();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['Acao'])) {
    $idTurma = filter_input(INPUT_POST, 'IdTurma', FILTER_SANITIZE_NUMBER_INT);

    if ($_POST['Acao'] === "ExcluirTurma") {
        $Crud->excluirTurma($idTurma);
    } elseif ($_POST['Acao'] === "VisualizarTurma") {
        $detalhesTurma = $Crud->visualizarTurma($idTurma);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tela Principal do Professor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="Nav">
        <li><a href="index.php">Pagina Inicial</a></li>
        <li><a href="logout.php">Sair</a></li>
        <li><a href="cadastro_turma.php">Cadastro de Turma</a></li>
    </div>

    <div class="container">
        <div class="header">
            <h2>Bem-vindo, Professor Giovanni</h2>
        </div>

        <div class="table-container">
            <h3>Lista de Turmas</h3>
            <table class="table" border="1">
                <tr>
                    <th>Número da Turma</th>
                    <th>Nome da Turma</th>
                    <th>Ações</th>
                </tr>
                <?php
                foreach ($turmas as $turma) {
                    echo "<tr>";
                    echo "<td>{$turma['numero']}</td>";
                    echo "<td>{$turma['nome']}</td>";
                    echo "<td>
                            <form method='POST' action=''>
                                <input type='hidden' name='IdTurma' value='{$turma['id']}'>
                                <input type='hidden' name='Acao' value='ExcluirTurma'>
                                <button type='submit'>
                                    <img src='C:\xampp\htdocs\CrudAulasVer3\Images\delete.png' alt='Excluir'>
                                </button>
                            </form>
                            <form method='POST' action=''>
                                <input type='hidden' name='IdTurma' value='{$turma['id']}'>
                                <input type='hidden' name='Acao' value='VisualizarTurma'>
                                <button type='submit'>
                                    <img src='C:\xampp\htdocs\CrudAulasVer3\Images\edit.png' alt='Visualizar'>
                                </button>
                            </form>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
