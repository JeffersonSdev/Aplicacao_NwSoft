<?php
/*  aqui eu estava verificando se quando o usuario apertasse em cadastrar, se não fosse vazio ele traria as informações certas 

    if(isset($_POST['cadastrar'])){  //se existir a variável 'cadastrar', (no caso é o name do submit do form) ele vai puxar e printar
        print_r($_POST['pagamento']);
        echo '<br>';
        print_r($_POST['nota']);
        echo '<br>';
        print_r($_POST['data']);
        echo '<br>';                    verificando se está recebendo todos os parâmetros do form
        print_r($_POST['item']);
        echo '<br>';
        print_r($_POST['quantidade']);
        echo '<br>';
        print_r($_POST['valor']);
        echo '<br>';
        print_r($_POST['data']);
        echo '<br>';
        print_r($_POST['observacao']);
        
    }else{
        echo 'erro';
    }
*/


include_once('conexao.php'); //incluindo a nossa conexao com o banco de dados

//Colocando as informações puxadas do meu formulário em variáveis
$tipoPagamento = $_POST['pagamento'];
$notaFiscal = $_POST['nota'];
$item = $_POST['item'];
$quantidade = $_POST['quantidade'];
$valor = $_POST['valor'];
$dataVenda = $_POST['data'];
$observacao = $_POST['observacao'];

//Comando Insert puxando as colunas e respectivamente colocando valores das varáveis, como as variáveis estão recebendo
//os valores do formulario atraves do metodo post e o name do input, eles já vão corretamente no INSERT

$result = mysqli_query($conexao, "INSERT INTO cadastro_vendas(tipo_pagamento, nota_fiscal, item_vendido, quantidade, valor, 
         data_venda, observacao)  VALUES ('$tipoPagamento','$notaFiscal','$item','$quantidade','$valor','$dataVenda','$observacao')");

//depois disso ele vai inserir de acordo com o que puxou no formulario ao banco de dados
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styleconsulta.css">

     <!--Aqui uma tela para mostrar ao usuário que o cadastro funcionou e dar alguma opção de consulta ou um novo cadastro-->

    <title>Cadastro Realizado!</title>
    <style>
        a {
            text-decoration: none;
            background-color: #8C52FF;
            color: white;
            border: none;
            border-radius: 7px;
            padding: 6px;
            outline: none;
        }

        a:hover {
            background-color: #523196;
        }
    </style>

</head>

<body>
    <div class="box">
        <form action="#" method="POST">
            <fieldset>
                <legend><b>Cadastro Realizado!</b></legend><br>
                <p class="header-text"><b>Deseja Realizar Mais Alguma Ação ?</b></p>

                <br>
                <div class="align-button">
                    <a href="index.php"     name="cadastro">Cadastrar Vendas</a>
                    <a href="consulta.php"  name="consulta">Consultar Vendas</a>
                </div>
            </fieldset>

        </form>
    </div>
</body>

</html>