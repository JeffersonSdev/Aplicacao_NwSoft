<?php
    if (!empty($_GET['nota_fiscal'])) { //verificando se a nota fical não é vazia, se ela existe mesmo

        include_once('conexao.php'); //conectando ao meu banco
    
        $nota = $_GET['nota_fiscal'];//jogando para minha variavel nota o parametro nota_fiscal da minha URL
    
        $sqlSelect = "SELECT * FROM cadastro_vendas WHERE nota_fiscal=$nota";
        $result = $conexao->query($sqlSelect);
    
        //print_r($result);
        
        //variavel recebendo o script de delete na tabela onde a mesma nota fiscal que puxamos pelo get está
        $sqlDelete = "DELETE FROM cadastro_vendas WHERE nota_fiscal = $nota";
        $resultDelete = $conexao ->query($sqlDelete);

        //print_r($item);
    }
    header('location: consulta.php'); // apos tudo ele volta para minha pagina de registros(para a propria pagina que esta) atualizando automaticamente



?>