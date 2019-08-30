<?php

include_once 'conexao.php';

$querySelect = $link->query("select * from tb_aluno");
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
