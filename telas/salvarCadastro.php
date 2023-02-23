<?php 
    include_once('conexao.php'); //incluindo minha conexao com o banco de dados para funcionar o update

    if(isset($_POST['update'])){ //caso exista o parametro update que é o name do meu submit no form de edição, ele vai funcionar
        //echo 'funciona';
        
        $tipoPagamento = $_POST['pagamento'];   //Colocando cada parametro em uma variavel para efetuar o update
        $notaFiscal = $_POST['nota'];
        $item = $_POST['item'];
        $quantidade = $_POST['quantidade'];
        $valor = $_POST['valor'];
        $dataVenda = $_POST['data'];
        $observacao = $_POST['observacao'];

        //variável com o script de update dentro passando as colunas e seus novos valores com a posicao da nota fiscal
        $sqlUpdate = "UPDATE cadastro_vendas 
        SET tipo_pagamento='$tipoPagamento', nota_fiscal='$notaFiscal', item_vendido='$item', quantidade='$quantidade', 
        valor='$valor', data_venda='$dataVenda', observacao='$observacao' WHERE nota_fiscal=$notaFiscal";

        //colocando para rodar o select na variavel conexao e em seguida executar a query sqlUpdate
        $result = $conexao -> query($sqlUpdate);
    }
        //logo apos isso ele vai voltar para onde está os registros já atualizado
        header('location: consulta.php');
