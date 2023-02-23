<?php include_once('conexao.php');  ?> <!--Estou conectando-->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastros</title>
    <!-- Puxando o Boostrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <style>
        /* Estilizando algumas coisas na mão sem o boot*/
        body {
            background-image: linear-gradient(to right, rgb(136, 34, 139), rgb(70, 16, 77));
            font-family: Arial, Helvetica, sans-serif;
        }

        .table-bg {
            text-align: center;
            border-radius: 10px;
            border: 2px solid black;
            width: 90%;
            margin: 0 auto;
        }

        header {
            display: flex;
            justify-content: center;
        }

        #titulo {

            border: 2px solid black;
            padding: 5px;
            text-align: center;
            background-color: #8C52FF;
            border-radius: 7px;
            color: white;
            width: 50%;
            margin-bottom: 0;
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


        #novo-cadastro {
            text-align: end;
        }
    </style>
</head>

<body>
    <!--Direcionamento para a tela de cadastros caso o usuário queira fazer um novo cadastro-->
    <div id="novo-cadastro">
        <a href="fazerCadastro.php">Fazer novo cadastro</a>
    </div>

    <div>
        <header>
            <h2 id="titulo">Vendas Cadastradas</h2>
        </header>
        <table class="table table-striped table-dark table-bg">
            <thead>
                <!--Colunas de acordo com o banco de dados-->
                <tr class="centered-col-lg-">
                    <th scope="col">Item Vendido</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Forma de Pagamento</th>
                    <th scope="col">Nota Fiscal</th>


                    <th scope="col">Valor</th>
                    <th scope="col">Data da Venda</th>
                    <th scope="col">Observação</th>
                    <th scope="col">Edit | Del</th>
                </tr>
            </thead>

            <tbody>
                 <!--Aqui estou fazendo uma query select, puxando os dados da minha tabela cadastro_vendas-->
                <?php
                $query = $conexao->query("SELECT * FROM cadastro_vendas");
                $registros = $query->fetch_all(PDO::FETCH_ASSOC);

                //Foreach para percorrer minha query, ou seja as informações puxadas pelo meu select e de acordo
                //com a ordem a variavel $key puxa com o nome da coluna a informação
                foreach ($query as $key) {  
                    echo "<tr>";
                    echo "<td>" . $key['item_vendido'] . "</td>";
                    echo "<td>" . $key['quantidade'] . "</td>";
                    echo "<td>" . $key['tipo_pagamento'] . "</td>"; 
                    echo "<td>" . $key['nota_fiscal'] . "</td>";
                    echo "<td>" . $key['valor'] . "</td>";
                    echo "<td>" . $key['data_venda'] . "</td>";
                    echo "<td>" . $key['observacao'] . "</td>";      //estou passando a posição pelo parametro nota_fiscal (nota_fiscal=$key[nota_fiscal])
                    echo "<td>
                        
                        <a class='btn btn-sm btn-primary' href='editarCadastro.php?nota_fiscal=$key[nota_fiscal]'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                        </svg>
                        </a>
                        <a class='btn btn-sm btn-danger' href='excluirCadastro.php?nota_fiscal=$key[nota_fiscal]'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                            <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                        </svg>
                        </a>
                    </td>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>