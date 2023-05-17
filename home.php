<?php
require_once("header.php");?>

<main>
    <form action="">
        <div>
            <input type="text" name="busca" id="busca">
            <label for="busca">Digite para buscar</label>
        </div>
        <div>
            <button><i>Pesquisa</i></button>
        </div>
    </form>
    <table>
        <thead>
            <tr>
            <?php
                if($_SESSIONA['perfil']==''){
            ?>
                <th>Usario</th>        
                <?php } ?>
                <th>Título</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Categoria</th>
                <th>Opções</th>
            </tr>
        </thead>
        <?php foreach ($result_tarefas as $tarefa){ ?>
        <tr>
            <?php
                if($_SESSION['perfil']==1){ ?>
            <td> <?= $tarefa['nome']?></td>
            <?php } ?>
            <td><a href="visualizar_tarefa.php?cod=<?=$tarefa['codt']?>"><?=$tarefa['titulo']?></a></td>
            <td><?= date("d/m/Y", strtotime($tarefa['data'])); ?> </td>
            <td><?= $tarefa['hora']?></td>
            <?php
                $cod_tarefa=$tarefa['categoria_cod'];
                $sql="SELECT * FROM categoria_tarefa WHERE cod = $cod_tarefa";
                $result_cat=mysqli_query($con, $sql);
                $cat_tarefa = mysqli_fetch_array($result_cat);
            ?>
            <td><?= $cat_tarefa['nome']?></td>
            <td>
                <a href="editar_tarefa.php?cod=<?= $tarefa['codt']?>"><i>edit</i></a>
                <?php
                    if($_SESSION['perfil']==''){
                ?>
                <a href="db/excluir_tarefa.php?cod<?= $tarefa['codt']?>"><i>delete</i></a>
                <?php
                    }
                ?>
            </td>
        </tr>
        <?php } ?>
    </table>
</main>
<?php require_once "footer.php"; ?>