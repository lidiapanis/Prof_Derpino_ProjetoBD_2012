<?php
     session_start();

     include('proj_conectar.php');
     /*abaixo iremos criar as variaveis globais post para pegar os dados do formul�rio html*/

         $login= $_POST['login'];
         $senha = $_POST['senha'];

         /*abaixo fica a query para validacao do usuario caso ele exista o c�digo continua sua execu��o*/
         $query = mysql_query("SELECT * FROM alunos WHERE login ='$login' AND senha1 = '$senha'");

       /*na linha abaixo � criado um array dos resultados da consulta feita acima*/
            $consulta_sessao = mysql_fetch_array($query);

                 /*o if esta dizendo que se existir 1 registro na consulta acima, o
                 c�digo continua a ser executado , caso contrario a valida��o entra em a��o*/

                 if(mysql_num_rows($query) == 1 ){
            /*na linha abaixo atribuimos um nome para sess�o. Obrigat�rio!*/
            session_name("login_site_escola");
            /*abaixo iremos criar nossas vari�veis de sess�o e atribuir os valores das variaveis la encima as sess�es*/

            $_SESSION['id_usuario'] = $consulta_sessao['id_usuario'];
            $_SESSION['login'] = $login;
            $_SESSION['senha'] = $senha;
            
            /*abaixo faremos uma din�mica com as variaveis de sess�o atribuindo uma variavel as pr�prias,
            assim caso queira utilizar as variaveis de sess�o na frente  , n�o ser� necess�rio utilizar a variavel global
            SESSION , ou seja , para utilizar , basta escrever a variavel que chama a sess�o como criamos abaixo.*/

            $id_usuario_sessao = $_SESSION['id_usuario'];
            $login_nome_sessao = $_SESSION['login'];
            $login_senha_sessao = $_SESSION['senha'];
                                if($login_nome_sessao =='derpino'){
                                header("Location: painelprofessor.html");
                                }else{
                                header("Location: arquivos.html");
                                 }
}else {
            echo "Verifique se usuario e senha est�o corretos.";


}

?>

