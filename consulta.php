<?php include_once 'includes/header.inc.php' ?>
<?php include_once 'includes/menu.inc.php' ?>

<div class="row container">
    <div class="col s12">
        <h5 class="light">Consulta</h5><hr>
        
        <table class="striped">
            <thead>
                <tr>
                    <th>Registro</th>
                    <th>Nome</th>
                    <th>Professor</th>
                    <th>Entidade</th>
                </tr>
            </thead>
            <tbody>
                <div class="input-field col s12">
                    <i class="material-icons md-light prefix">search</i>
                    <form name="consulta" method="POST" action="consulta.php"> 
                        <input type="text" name="pesquisa" id="pesquisa" maxlenght="40" required autofocus>
                        
                        <label for="pesquisa">Digite o nome do aluno ou o número do registro CBJ</label>
                        <input type="submit" value="Buscar" class="btn black" style="border: 1px solid greenyellow; border-radius: 10px; margin: 18px;">
                    </form>
                </div>
                <?php 
                    $utf8 = header("Content-Type: text/html; charset=utf-8");
                    $link = new mysqli('localhost','root','','db_judoca');
                    $link->set_charset('utf8');
                    $pesquisa = filter_input(INPUT_GET, 'pesquisa', FILTER_SANITIZE_SPECIAL_CHARS);
                    if(isset($_POST['pesquisa'])){
                        $pesquisa = $_POST['pesquisa'];
                    }
                    $querySelect = $link->query("select * from tb_aluno where nome='$pesquisa' || registro='$pesquisa' ");
                    while($registros = $querySelect->fetch_assoc()):
                        $id = $registros['id'];
                        $registro = $registros['registro'];
                        $nome = $registros['nome'];
                        $professor = $registros['professor'];
                        $entidade = $registros['entidade'];

                        echo "<tr>";
                        echo "<td>$registro</td><td>$nome</td><td>$professor</td><td>$entidade</td>";
                        echo "<td><a href = 'editar.php?id=$id'><i class='material-icons md-light' >edit</i></a></td>";
                        echo "<td><a href = 'confirma.php?id=$id'><i class='material-icons md-light'>delete</i></a></td>";
                        echo "</tr>";
                    endwhile;
                ?>
            </tbody>
        </table>
    </div>
</div>
<style>
    td{
        background-color: #222;
    }
</style>
<?php include_once 'includes/footer.inc.php' ?>
