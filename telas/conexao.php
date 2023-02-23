<?php 

    //Esse arquivo serve para fazer a conexão com o banco de dados

    $dbHost = "Localhost"; //host do banco de dados (servidor é o meu pc)
    $dbUsername = "root"; //user padrao
    $dbPassword = ""; //senha padrao vazia
    $dbName = "cadastro-nwsoft"; //nome do banco de dados

    //variável de conexao com o meu banco mysql
    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); /*Como se eu estivesse instanciando um novo 
                                                                        banco atraves da variável conexao*/
                                                                      
    // verificando se realmente conectou o banco

    /*if($conexao -> connect_errno){
        echo "Erro";      
    }else{
        echo "Conectado com sucesso !";
    }*/

?>