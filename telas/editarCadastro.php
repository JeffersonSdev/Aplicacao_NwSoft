<?php
if (!empty($_GET['nota_fiscal'])) { //Se não estiver vazio o meu parametro nota_fiscal ele vai se conectar ao banco e fazer o select (puxar)

    include_once('conexao.php');

    //colocando a nota fiscal em uma variavel para usar no comando sql 
    $nota = $_GET['nota_fiscal'];

    //variavel para criar um select no meu banco com a posição da minha nota fiscal
    $sqlSelect = "SELECT * FROM cadastro_vendas WHERE nota_fiscal=$nota";

    //variavel colocando para rodar no banco atraves de $coneao a query do sqlSelect
    $result = $conexao->query($sqlSelect);

    //print_r($result);

    // minha $key vai percorrer meu $result que é o resultado da minha query de select, e vai colocar em cada variável o valor que está 
    //no banco na posição do nota fiscal
    while ($key = mysqli_fetch_assoc($result)) {
        $tipoPagamento = $key['tipo_pagamento'];
        $notaFiscal = $key['nota_fiscal'];
        $item = $key['item_vendido'];
        $quantidade = $key['quantidade'];
        $valor = $key['valor'];
        $dataVenda = $key['data_venda'];
        $observacao = $key['observacao'];
    }
    //print_r($item);

} else {
    echo "Nota fiscal inválida";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Cadastre</title>

    <style>
        #update {
            background-color: #8C52FF;
            width: 100%;
            padding: 8px;
            border: none;
            color: white;
            border-radius: 7px;
            cursor: pointer;
            font-style: none;
        }

        #update:hover {
            background-color: #523196;
        }

        a {

            text-decoration: none;
            background-color: #8C52FF;
            color: white;
            border: 2px solid black;
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
    <a href="consulta.php">Voltar</a>

    <div class="box">
        <!-- Meu action vai para meu arquivo salvarCadastro que está responsavel por dar o update na minha tabela-->
        <form action="salvarCadastro.php" method="POST">
            <fieldset>
                <legend><b>Edição de Vendas</b></legend>
                <p class="header-text">Modifique sua venda abaixo!</p><br>

                <!--estou pegando a variável que eu declarei la em cima e colocando como value para aparecer ao usuario e ele editar-->
                <div class="input-box">
                    <input type="text" name="pagamento" id="pagamento" class="input-user" value="<?php echo $tipoPagamento ?>" required>
                    <label for="pagamento" class="label-input">Tipo de pagamento</label>
                </div><br>

                <div class="input-box">
                    <input type="number_format" name="nota" id="nota" class="input-user" value="<?php echo $notaFiscal ?>" required>
                    <label for="nota" class="label-input">Nota fiscal</label>
                </div><br>

                <label for="data">Data da venda</label>
                <input type="date" name="data" id="data" value="<?php echo $dataVenda ?>" required><br><br><br>

                <fieldset>
                    <legend><b>Item Vendido</b></legend><br>

                    <div class="input-box">
                        <input type="text" name="item" id="item" class="input-user" value="<?php echo $item ?>" required>
                        <label for="item" class="label-input">Item</label>
                    </div><br>

                    <div class="input-box">
                        <input type="text" name="quantidade" id="quantidade" class="input-user" value="<?php echo $quantidade ?>" required>
                        <label for="quantidade" class="label-input">Quantidade</label>
                    </div><br>

                    <div class="input-box">
                        <input type="number_format" name="valor" id="valor" class="input-user" value="<?php echo $valor ?>" required>
                        <label for="valor" class="label-input">Valor</label>
                    </div><br>

                </fieldset><br><br>
                <div class="input-box">
                    <input type="text" name="observacao" class="input-user" placeholder="Observação" value="<?php echo $observacao ?>">
                    <label for="valor" class="label-input" id="valor">Observação (opcional)</label>
                </div><br>
                
                <input type="submit" name="update" value="ATUALIZAR CADASTRO" id="update">
                <!--Vou usar como parâmetro o name update no meu arquivo salvarCadastro.php-->
            </fieldset>
        </form>
    </div>
</body>

</html>