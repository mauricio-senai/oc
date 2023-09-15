<?php

$email = $_POST['email'];
$senha = $_POST['senha'];

//Realizar conexão com o Banco de Dados
$conn = mysqli_connect('localhost','senai','senai','Site_DB');

//Testar a conexão
if (!$conn) {
    echo "Erro ao conectar ao DB: " . mysqli_error();
    exit;
}

//Acessar a base de dados
if (!mysqli_select_db($conn,"Site_DB")) {
    echo "Erro ao conectar ao Banco de Dados: " . mysqli_error();
    exit;
}

//Definir a codificação dos caractereres.
mysqli_set_charset($conn,'utf8');

//Inserir o comando SQL que será executado no banco de dados
$sql = "INSERT INTO users (email, senha) VALUES ('".$email."','".$senha."')";

//Receber a consulta do banco
$result = mysqli_query($conn,$sql);

//Testar se a consulta funcionou
if (!$result) {
    echo "Erro no SQL ($sql) do DB: ".mysqli_error();
    exit;
}

//Fechar a conexão com o Banco de Dados
mysqli_close($conn);

echo "
<html>
    <head>
        <title> Login salvo com sucesso!!</title>
        <meta http-equiv=\"refresh\" content=\"10; URL='index.html'\"/>
<style>
    body{
        background-color: azure;
        color: blue;
        align-items: center;
    }
    h1{
        font-size: 20px;
        font-family: Georgia, 'Times New Roman', Times, serif;
    }

    </style>
    </head>
<body>
    <h1> Seu login foi realizado com sucesso!! </h1>
</body>
</html>



";

?>

