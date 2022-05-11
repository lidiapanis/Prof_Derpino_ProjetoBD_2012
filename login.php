<?php
     session_start();

     include('proj_conectar.php');
     /*abaixo iremos criar as variaveis globais post para pegar os dados do formulário html*/

         $login= $_POST['login'];
         $senha = $_POST['senha'];

         /*abaixo fica a query para validacao do usuario caso ele exista o código continua sua execução*/
         $query = mysql_query("SELECT * FROM alunos WHERE login ='$login' AND senha1 = '$senha'");

       /*na linha abaixo é criado um array dos resultados da consulta feita acima*/
            $consulta_sessao = mysql_fetch_array($query);

                 /*o if esta dizendo que se existir 1 registro na consulta acima, o
                 código continua a ser executado , caso contrario a validação entra em ação*/

                 if(mysql_num_rows($query) == 1 ){
            /*na linha abaixo atribuimos um nome para sessão. Obrigatório!*/
            session_name("login_site_escola");
            /*abaixo iremos criar nossas variáveis de sessão e atribuir os valores das variaveis la encima as sessões*/

            $_SESSION['id_usuario'] = $consulta_sessao['id_usuario'];
            $_SESSION['login'] = $login;
            $_SESSION['senha'] = $senha;
            
            /*abaixo faremos uma dinâmica com as variaveis de sessão atribuindo uma variavel as próprias,
            assim caso queira utilizar as variaveis de sessão na frente  , não será necessário utilizar a variavel global
            SESSION , ou seja , para utilizar , basta escrever a variavel que chama a sessão como criamos abaixo.*/

            $id_usuario_sessao = $_SESSION['id_usuario'];
            $login_nome_sessao = $_SESSION['login'];
            $login_senha_sessao = $_SESSION['senha'];
                                if($login_nome_sessao =='derpino'){
                                header("Location: painelprofessor.html");
                                }else{
                                header("Location: arquivos.html");
                                 }
}else {
            echo "Verifique se usuario e senha estão corretos.";


}

?>

