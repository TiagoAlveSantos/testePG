<?php
abstract class ClassConexao
{
    protected function conectaDB()
    {
        try {
            $Con = new PDO(
                "mysql:host=localhost;dbname=hotel;charset=utf8",
                "root",
                "",
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
            return $Con;
        } catch (PDOException $Erro) {
            return $Erro->getMessage();
        }
    }
}
?>
