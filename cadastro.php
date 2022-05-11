<?php
$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$email = $_POST['email'];
$escola = $_POST['escola'];
$ra = $_POST['ra'];
$datanasc = $_POST['datanasc'];
$telefone = $_POST['telefone'];
$login = $_POST['login'];
$senha1 = $_POST['senha1'];
$senha2 = $_POST['senha2'];

include('proj_conectar.php');

//elimina erros na digita��o de e-mails
$email = str_replace(" ","",$email);
$email = str_replace("/","",$email);
$email = str_replace("@.","@",$email);
$email = str_replace(".@","@",$email);
$email = str_replace(",",".",$email);
$email = str_replace(";",".",$email);
//vari�vel que informar� a ocorr�ncia de erros
$erro = 0;
//verifica se foi digitado o nome

if(empty($nome)){
$erro = 1;
$msg = "Nome n�o informado";
}
elseif(empty($cidade)){
$erro = 1;
$msg = "Cidade n�o informada";
}
elseif(empty($estado)){
$erro = 1;
$msg = "Estado n�o informado";
}
elseif(empty($escola)){
$erro = 1;
$msg = "Escola n�o informada";
}
elseif(empty($datanasc)){
$erro = 1;
$msg = "Data de nascimento n�o informado";
}

//verifica tamanho m�nimo do e-mail e se existe �@� e ponto.
elseif(strlen($email)<8 || substr_count($email, "@")!=1 ||
substr_count($email,".")==0){
$erro = 1;
$msg = "E-mail n�o foi digitado corretamente";
}
//verifica se o estado foi selecionado
elseif(strlen($telefone)<10){
$erro = 1;
$msg = "Verifique se foi informado o DDD juntamente do telefone";
}
elseif(empty($endereco)){
$erro = 1;
$msg = "Endere�o n�o pode ser vazio!";
}

elseif(strlen($login)<5 || strlen($login)>15){
$erro = 1;
$msg = "Login deve ter entre 5 e 15 caracteres";
}
//verifica se a senha cont�m espa�os em branco
elseif(strstr($senha1,' ')!=false){
$erro = 1;
$msg = "A senha n�o deve conter espa�os em branco";
}
//compara senha1 e senha2
elseif($senha1 != $senha2){
$erro = 1;
$msg = "Senhas digitadas n�o conferem";
}
elseif(empty($senha1)){
$erro = 1;
$msg = "Senha n�o pode ser vazia";
}
if($erro){
	echo "<html><body>";
	echo "<p align='center'>$msg</p>";
	echo "<p align='center'><a href='javascript:history.back()'>Voltar</a></p>";
	echo "</body></html>";
}else{
	$query="insert into alunos values (null, '$nome' ,'$endereco','$cidade','$estado','$email','$escola','$ra','$datanasc','$telefone','$login','$senha1');";

	$grava=mysql_query($query);
	$num_linha=mysql_affected_rows();
	if ($num_linha==1){
		echo "<p align='center'>Cadastro Realizado com sucesso!<br><a href='javascript:history.back()'>Voltar</a></p>";
	}else{
		echo"<p align='center'>N�o foi possivel cadastrar.<br> <a href='javascript:history.back()'>Voltar</a><br></p>";
	}
	mysql_close($con);
}
?>