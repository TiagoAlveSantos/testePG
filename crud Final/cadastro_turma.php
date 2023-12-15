<?php
include_once 'ClassCrud.php';

$Crud = new ClassCrud();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['Acao']) && $_POST['Acao'] === "CadastrarTurma") {
    $nomeTurma = filter_input(INPUT_POST, 'NomeTurma', FILTER_SANITIZE_STRING);

    if (empty($nomeTurma)) {
        echo "<p>Nome da turma não pode estar vazio.</p>";
    } else {
        $numeroTurma = uniqid(); 

        $resultadoCadastro = $Crud->cadastrarTurma($numeroTurma, $nomeTurma);

        if ($resultadoCadastro) {
            echo "<p>Turma cadastrada com sucesso!</p>";
        } else {
            echo "<p>Ocorreu um erro ao cadastrar a turma.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Tela Principal do Professor</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .Content {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
        }

        input {
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .btn {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 13rem;
            overflow: hidden;
            height: 3rem;
            background-size: 300% 300%;
            backdrop-filter: blur(1rem);
            border-radius: 5rem;
            transition: 0.5s;
            animation: gradient_301 5s ease infinite;
            border: double 4px transparent;
            background-image: linear-gradient(#212121, #212121),  linear-gradient(137.48deg, #ffdb3b 10%,#FE53BB 45%, #8F51EA 67%, #0044ff 87%);
            background-origin: border-box;
            background-clip: content-box, border-box;
        }

        #container-stars {
            position: absolute;
            z-index: -1;
            width: 100%;
            height: 100%;
            overflow: hidden;
            transition: 0.5s;
            backdrop-filter: blur(1rem);
            border-radius: 5rem;
        }

        strong {
            z-index: 2;
            font-family: 'Avalors Personal Use';
            font-size: 12px;
            letter-spacing: 5px;
            color: #FFFFFF;
            text-shadow: 0 0 4px white;
        }

        #glow {
            position: absolute;
            display: flex;
            width: 12rem;
        }

        .circle {
            width: 100%;
            height: 30px;
            filter: blur(2rem);
            animation: pulse_3011 4s infinite;
            z-index: -1;
        }

        .circle:nth-of-type(1) {
            background: rgba(254, 83, 186, 0.636);
        }

        .circle:nth-of-type(2) {
            background: rgba(142, 81, 234, 0.704);
        }

        .btn:hover #container-stars {
            z-index: 1;
            background-color: #212121;
        }

        .btn:hover {
            transform: scale(1.1);
        }

        .btn:active {
            border: double 4px #FE53BB;
            background-origin: border-box;
            background-clip: content-box, border-box;
            animation: none;
        }

        .btn:active .circle {
            background: #FE53BB;
        }

        #stars {
            position: relative;
            background: transparent;
            width: 200rem;
            height: 200rem;
        }

        #stars::after {
            content: "";
            position: absolute;
            top: -10rem;
            left: -100rem;
            width: 100%;
            height: 100%;
            animation: animStarRotate 90s linear infinite;
        }

        #stars::after {
            background-image: radial-gradient(#ffffff 1px, transparent 1%);
            background-size: 50px 50px;
        }

        #stars::before {
            content: "";
            position: absolute;
            top: 0;
            left: -50%;
            width: 170%;
            height: 500%;
            animation: animStar 60s linear infinite;
        }

        #stars::before {
            background-image: radial-gradient(#ffffff 1px, transparent 1%);
            background-size: 50px 50px;
            opacity: 0.5;
        }

        @keyframes animStar {
            from {
                transform: translateY(0);
            }

            to {
                transform: translateY(-135rem);
            }
        }

        @keyframes animStarRotate {
            from {
                transform: rotate(360deg);
            }

            to {
                transform: rotate(0);
            }
        }

        @keyframes gradient_301 {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes pulse_3011 {
            0% {
                transform: scale(0.75);
                box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.7);
            }

            70% {
                transform: scale(1);
                box-shadow: 0 0 0 10px rgba(0, 0, 0, 0);
            }

            100% {
                transform: scale(0.75);
                box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
            }
        }
    </style>
</head>
<body>
    <div class="Nav">
        <li><a href="index.php">Pagina Inicial</a></li>
        <li><a href="logout.php">Sair</a></li>
        <li><a href="tela_principal_professor.php">Tela do professor</a></li>
    </div>

    <div class="Content">
        <h1>Cadastro de Turma</h1>

        <form action="cadastro_turma.php" method="POST">
            <input type="hidden" name="Acao" value="CadastrarTurma">
            
            <label for="NomeTurma">Nome da Turma:</label>
            <input type="text" name="NomeTurma" required>

            <button class="btn" type="submit">
                <strong>CADASTRAR</strong>
                <div id="container-stars">
                    <div id="stars"></div>
                </div>

                <div id="glow">
                    <div class="circle"></div>
                    <div class="circle"></div>
                </div>
            </button>
        </form>
    </div>
</body>
</html>
