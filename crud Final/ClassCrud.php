<?php

class ClassCrud
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "hotel";
    private $conexao;

    public function __construct()
    {
        $this->conexao = new mysqli($this->host, $this->user, $this->password, $this->database);

        if ($this->conexao->connect_error) {
            die("Falha na conexão com o banco de dados: " . $this->conexao->connect_error);
        }
    }

    public function autenticarUsuario($email, $senha)
    {
        $query = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultado = $this->conexao->query($query);

        if ($resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();
            if (password_verify($senha, $usuario['senha'])) {
                return true;
            }
        }

        return false;
    }

    public function cadastrarTurma($numero, $nome)
    {
        $query = "INSERT INTO turmas (numero, nome) VALUES ('$numero', '$nome')";
        $resultado = $this->conexao->query($query);

        return $resultado;
    }

    public function getTurmas()
    {
        // Recupere as turmas do banco de dados
        $query = "SELECT * FROM turmas";
        $resultado = $this->conexao->query($query);

        $turmas = [];

        if ($resultado->num_rows > 0) {
            while ($turma = $resultado->fetch_assoc()) {
                $turmas[] = $turma;
            }
        }

        return $turmas;
    }

    public function excluirTurma($idTurma)
    {
        // Lógica para excluir a turma com o ID '$idTurma'
        $query = "DELETE FROM turmas WHERE id = '$idTurma'";
        $resultado = $this->conexao->query($query);

        return $resultado;
    }

    public function visualizarTurma($idTurma)
    {
        // Lógica para visualizar os detalhes da turma com o ID '$idTurma'
        $query = "SELECT * FROM turmas WHERE id = '$idTurma'";
        $resultado = $this->conexao->query($query);

        if ($resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        }

        return null;
    }

    public function fecharConexao()
    {
        $this->conexao->close();
    }

    public function verificarCredenciais($email, $senha) {
        // Lógica para consultar o banco de dados e verificar as credenciais
        // Certifique-se de usar funções de hash para comparar senhas de forma segura
        // Retorne o usuário se as credenciais estiverem corretas, caso contrário, retorne false
    }

}
?>
