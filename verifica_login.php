<?php
require_once("conexao.php");

session_start();

$email=$_POST['login'];
$senha=md5($_POST['senha']);

$query="select * from $banco.usuario where email = '".$email."'and senha = '".$senha."'";

$result=mysqli_query($con, $query);

if (mysqli_num_rows($result) >0)
{
    $dados=mysqli_fetch_array($result);
    $_SESSION['cod'] = $dados['cod'];
    $_SESSION['nome'] = $dados['nome'];
    $_SESSION['email'] = $dados['email'];
    $_SESSION['perfil'] = $dados['perfil_cod'];
    header('location:http://'.$site.'home.php');
}
else {
    echo "<script>alert('Login ou Senha inválido(a), tente novamente.');</script>";
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    echo $login;
    echo $senha;
    header('location:http://'.$site.'index.php?erro=2');

}

?>