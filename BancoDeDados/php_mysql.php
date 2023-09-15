<?php

//Realizar conexão com o Banco de Dados
$conn = mysqli_connect("10.200.119.115", "admin", "senai");

//Testar a conexão
if (!$conn) {
    echo "Erro ao conectar ao DB: " . mysqli_error();
    exit;
}

//Acessar a base de dados
if (!mysqli_select_db($conn,"mauricio_BD")) {
    echo "Erro ao conectar ao Banco de Dados: " . mysqli_error();
    exit;
}

//Definir a codificação dos caractereres.
mysqli_set_charset($conn,'utf8');

//Inserir o comando SQL que será executado no banco de dados
$sql = "SELECT * FROM MUNICIPIO;";

//Receber a consulta do banco
$result = mysqli_query($conn,$sql);

//Testar se a consulta funcionou
if (!$result) {
    echo "Erro no SQL ($sql) do DB: ".mysqli_error();
    exit;
}
//Avisar se não houver resultados
if (mysqli_num_rows($result) == 0) {
    echo "Nenhum resultado foi encontrado";
    exit;
}
//Iniciar o codiho HTML
echo "<HTML> <title> SENAI - PHP + MySQL </title> <body> ";
echo "<meta http-equiv='content-type' content='text/html;charset=utf-8' />";
echo "Municícios: <br>";

// Vamos criar um laço para mostrar os resultados
while ($row = mysqli_fetch_assoc($result)) {
    echo "Nome: ".$row["nome"]."<br>";
    echo "Cod_Municipio: ".$row["cod_municipio"]."<br>";
    echo "Cod_Cidade: ".$row["cod_cidade"]."<br><br>";
}

//Fechar a conexão com o Banco de Dados
mysqli_free_result($result);

?>