<?php 
if(isset($_GET['erro'])){
    if($_GET['erro'] ==1){
        $erro = "Acesso Negado!";
    }else if($_GET['erro'] == 2){
        $erro = "E-mail ou senha inválidos!";
    }else if($_GET['erro'] == 3){
        $erro = "Logout realizado com sucesso!";
    }
}else{
    $erro = "";
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Tarefas</title>
</head>
<body>
    <main>
        <form action="db/verifica_login.php" method="post">
            <div>
                <h3>Login</h3>
            </div>
            <div>
                <label for="login">E-mail: </label>
                <input type="text" name="login" id="login">
            </div>
            <div>
                <label for="senha">Senha: </label>
                <input type="password" name="senha" id="senha">
            </div>
            <div>
                <span id="error"><?php echo $erro; ?></span> <br>
                <button>Enviar</button>
                <div></div>
                <a href="cadastro.php">Cadastre-se</a>
            </div>
        </form>
    </main>
</body>
</html>