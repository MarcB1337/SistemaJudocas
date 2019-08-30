<?php
session_start();
include_once 'conexao.php';

$nome        = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email       = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone    = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
$registro    = filter_input(INPUT_POST, 'registro', FILTER_SANITIZE_NUMBER_INT);
$rg          = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_NUMBER_INT);
$cpf         = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);
$nascimento  = filter_input(INPUT_POST, 'nascimento', FILTER_SANITIZE_NUMBER_INT);
$expedidor   = filter_input(INPUT_POST, 'expedidor', FILTER_SANITIZE_SPECIAL_CHARS);
$telefone2   = filter_input(INPUT_POST, 'telefone2', FILTER_SANITIZE_NUMBER_INT);
$rua         = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_SPECIAL_CHARS);
$numero      = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_NUMBER_INT);
$bairro      = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_SPECIAL_CHARS);
$cidade      = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
$estado      = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_SPECIAL_CHARS);
$cep         = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_NUMBER_INT);
$faixa       = filter_input(INPUT_POST, 'faixa', FILTER_SANITIZE_SPECIAL_CHARS);
$datafaixa   = filter_input(INPUT_POST, 'datafaixa', FILTER_SANITIZE_NUMBER_INT);
$observacoes = filter_input(INPUT_POST, 'observacoes', FILTER_SANITIZE_SPECIAL_CHARS);
$professor   = filter_input(INPUT_POST, 'professor', FILTER_SANITIZE_SPECIAL_CHARS);
$entidade    = filter_input(INPUT_POST, 'entidade', FILTER_SANITIZE_SPECIAL_CHARS);

$querySelect = $link->query("select email from tb_aluno");
$array_emails = [];

while($emails = $querySelect->fetch_assoc()):
    $emails_existentes = $emails['email'];
    array_push($array_emails,$emails_existentes);
endwhile;
//////////////////////////////
$querySelect = $link->query("select registro from tb_aluno");
$array_registros = [];

while($registros = $querySelect->fetch_assoc()):
    $registros_existentes = $registros['registro'];
    array_push($array_registros,$registros_existentes);
endwhile;
/////////////////////////////////////////
$querySelect = $link->query("select rg from tb_aluno");
$array_rgs = [];

while($rgs = $querySelect->fetch_assoc()):
    $rgs_existentes = $rgs['rg'];
    array_push($array_rgs,$rgs_existentes);
endwhile;
////////////////////////////////////////
$querySelect = $link->query("select cpf from tb_aluno");
$array_cpfs = [];

while($cpfs = $querySelect->fetch_assoc()):
    $cpfs_existentes = $cpfs['cpf'];
    array_push($array_cpfs,$cpfs_existentes);
endwhile;

////////////////////////////////////////
if(in_array($email,$array_emails)):
    $_SESSION['msg'] = "<p class='center red-text'>".'Já existe um aluno cadastrado com esse email'."</p>";
    header("Location:../");
elseif(in_array($registro,$array_registros)):
    $_SESSION['msg'] = "<p class='center red-text'>".'Já existe um aluno cadastrado com esse registro'."</p>";
    header("Location:../");
elseif(in_array($cpf,$array_cpfs)):
    $_SESSION['msg'] = "<p class='center red-text'>".'Já existe um aluno cadastrado com esse CPF'."</p>";
    header("Location:../");
elseif(in_array($rg,$array_rgs)):
    $_SESSION['msg'] = "<p class='center red-text'>".'Já existe um aluno cadastrado com esse RG'."</p>";
    header("Location:../");
else:
    $queryInsert = $link->query("insert into tb_aluno values(default, '$nome','$registro','$cpf','$nascimento','$rg','$expedidor','$email','$telefone','$telefone2','$rua','$numero','$bairro','$cidade','$estado','$cep','$professor','$entidade','$faixa','$datafaixa','$observacoes')");
    $affected_rows = mysqli_affected_rows($link);
    
    if($affected_rows > 0):
        $_SESSION['msg'] = "<p class='center green-text'>".'Cadastro efetuado com sucesso!'."</p>";
        header("Location:../");
    endif;
endif;
