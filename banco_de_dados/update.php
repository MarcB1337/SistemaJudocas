<?php
session_start();
include_once 'conexao.php';
$id = $_SESSION['id'];

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


$queryUpdate = $link->query("update tb_aluno set nome='$nome', registro='$registro', cpf='$cpf', nascimento='$nascimento', rg='$rg', expedidor='$expedidor', email='$email', telefone='$telefone', telefone2='$telefone2', rua='$rua', numero='$numero', bairro='$bairro', cidade='$cidade', estado='$estado', cep='$cep', professor='$professor', entidade='$entidade', faixa='$faixa', datafaixa='$datafaixa', observacoes='$observacoes' where id='$id'");
$affected_rows = mysqli_affected_rows($link);

if($affected_rows > 0):
    $_SESSION['msg'] = "<p class='center green-text'>".'Alteração efetuada com sucesso!'."</p>";
    header("Location:../");
endif;


