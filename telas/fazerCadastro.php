<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Cadastre</title>
    <style>
        a {

            text-decoration: none;
            background-color: #8C52FF;
            color: white;
            border: 2px solid black;
            border-radius: 7px;
            padding: 6px;
            outline: none;

        }
        /* Quando passar o mouse em cima a cor de fundo vai dar uma escurecida */
        a:hover {
            background-color: #523196;
        }
        
    </style>
</head>

<body>
    <!-- Direcionando para a tela index-->
    <a href="index.php">Home</a>
    <!-- Direcionando para a tela de registros-->
    <a href="consulta.php" id="registro">Registros</a>
    <div class="box">
        <!-- Formulario com direcionamento para a tela de realização de cadastros-->
        <form action="cadastro.php" method="POST">
            <fieldset>
                <legend><b>Cadastro de Vendas</b></legend>
                <p class="header-text">Cadastre sua venda abaixo!</p><br>
                <!--Input para informar o tipo de pagamento com campo obrigatório-->
                <div class="input-box">
                    <input type="text" name="pagamento" id="pagamento" class="input-user" required>
                    <label for="pagamento" class="label-input">Tipo de pagamento</label>
                </div><br>

                <div class="input-box">
                    <input type="number_format" name="nota" id="nota" class="input-user" required>
                    <label for="nota" class="label-input">Nota fiscal</label>
                </div><br>

                <label for="data">Data da venda</label>
                <input type="date" name="data" id="data" required><br><br><br>
                <!--Outro fildset para dar uma separação nas informações-->
                <fieldset>
                    <legend><b>Item Vendido</b></legend><br>

                    <div class="input-box">
                        <input type="text" name="item" id="item" class="input-user" required>
                        <label for="item" class="label-input">Item</label>
                    </div><br>

                    <div class="input-box">
                        <input type="text" name="quantidade" id="quantidade" class="input-user" required>
                        <label for="quantidade" class="label-input">Quantidade</label>
                    </div><br>

                    <div class="input-box">
                        <input type="number_format" name="valor" id="valor" class="input-user" step="0.01" min="0.01" required>
                        <label for="valor" class="label-input">Valor</label>
                    </div><br>

                </fieldset><br><br>
                <!--Input para deixar uma observação opcional podendo ser vazio-->
                <div class="input-box">
                    <input type="text" name="observacao" class="input-user" placeholder="Observação">
                    <label for="valor" class="label-input" id="valor">Observação (opcional)</label>
                </div><br>
                <!--Direcionamento para a tela de realização de cadastros cadastro.php-->
                <input type="submit" name="cadastrar" value="FINALIZAR CADASTRO" id="button">
            </fieldset>
        </form>
    </div>
</body>

</html>