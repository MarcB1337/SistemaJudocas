<?php
session_start();
include_once 'includes/header.inc.php';
include_once 'includes/menu.inc.php';
?>

<?php
include_once 'banco_de_dados/conexao.php';
    
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$_SESSION['id'] = $id;
$querySelect = $link->query("select * from tb_aluno where id='$id'");
    
while($registros = $querySelect->fetch_assoc()):
    $nome = $registros['nome'];
    $registro = $registros['registro'];
    $cpf = $registros['cpf'];
    $nascimento = $registros['nascimento'];
    $rg = $registros['rg'];
    $expedidor = $registros['expedidor'];
    $email = $registros['email'];
    $telefone = $registros['telefone'];
    $telefone2 = $registros['telefone2'];
    $rua = $registros['rua'];
    $numero = $registros['numero'];
    $bairro = $registros['bairro'];
    $cidade = $registros['cidade'];
    $estado = $registros['estado'];
    $cep = $registros['cep'];
    $professor = $registros['professor'];
    $entidade = $registros['entidade'];
    $faixa = $registros['faixa'];
    $datafaixa = $registros['datafaixa'];
    $observacoes = $registros['observacoes'];
endwhile;
?>

<!--FORMULARIO DE CADASTRO-->
        <div class="row container">
            <p>&nbsp;</p>
            <form action="banco_de_dados/update.php" method="post" class="col s12">
                <fieldset class="formulario" style="padding: 15px">
                    <legend><img src="imagens/avatar-2.png" alt="(imagem)" width="200px" height="200px"></legend>
                    <h5 class="light center">Alterar Aluno</h5>
                    
                    <div class="container">
                        <p>&nbsp;</p>
                        <h6 class="light center-align">Informações Pessoais</h6>
                            <fieldset class="formulario" style="padding: 15px">
                            <!--INFORMAÇÕES PESSOAIS-->   
                                <!--CAMPO NOME-->
                                    <div class="input-field col s12">
                                        <i class="material-icons md-light prefix">account_circle</i>
                                        <input type="text" name="nome" id="nome" value ="<?php echo $nome ?>" maxlenght="40" required autofocus>
                                        <label for="nome">Nome Completo</label>
                                    </div>
                    
                                <!--CAMPO REGISTRO CBJ-->
                                    <div class="input-field col s12">
                                        <i class="material-icons md-light prefix">picture_in_picture_alt</i>
                                        <input type="tel" name="registro" id="registro" value ="<?php echo $registro ?>" maxlenght="15">
                                        <label for="registro">Registro CBJ</label>
                                    </div>
                    
                                <!--CAMPO CPF-->
                                <div class="input-field col s12">
                                    <i class="material-icons md-light prefix">featured_play_list</i>
                                    <input type="tel" name="cpf" id="cpf" value ="<?php echo $cpf ?>" maxlenght="11" required>
                                    <label for="cpf">CPF</label>
                                </div>
                    
                                <!--CAMPO DATA NASCIMENTO-->
                                <div class="input-field col s12">
                                    <i class="material-icons md-light prefix">date_range</i>
                                    <input type="date" name="nascimento" id="nascimento" value ="<?php echo $nascimento ?>" maxlenght="10" required>
                                    <label for="aniversario">Data de Aniversário</label>
                                </div>
                    
                            <!--CAMPO RG-->
                            <div class="input-field col s12">
                               <i class="material-icons md-light prefix">featured_video</i>
                                <input type="tel" name="rg" id="rg" value ="<?php echo $rg ?>" maxlenght="9" required>
                                <label for="rg">RG</label>
                            </div>
                    
                            <!--CAMPO ORGAO EXPEDIDOR DO RG-->
                            <div class="input-field col s12">
                                <i class="material-icons md-light prefix">business</i>
                                <input type="text" name="expedidor" id="expedidor" value ="<?php echo $expedidor ?>" maxlenght="8" required>
                                <label for="orgao">Orgão Expedidor do RG</label>
                            </div>
                    </div>
                    
                    <!--Contato-->
                    <div class="container">
                        <p>&nbsp;</p>
                        <h6 class="light center-align">Contato</h6>
                            <fieldset class="formulario" style="padding: 15px">
                             <!--CAMPO EMAIL-->
                             <div class="input-field col s12">
                                <i class="material-icons md-light prefix">email</i>
                                <input type="email" name="email" id="email" value ="<?php echo $email ?>" maxlenght="50" required>
                                <label for="email">Email</label>
                             </div>
                    
                            <!--CAMPO TELEFONE 1-->
                             <div class="input-field col s12">
                                <i class="material-icons md-light prefix">phone</i>
                                <input type="tel" name="telefone" id="telefone" value ="<?php echo $telefone ?>" maxlenght="15" required>
                                <label for="telefone">Telefone</label>
                            </div>
                            <!--CAMPO TELEFONE 2-->
                            <div class="input-field col s12">
                                <i class="material-icons md-light prefix">phone</i>
                                <input type="tel" name="telefone2" id="telefone2" value ="<?php echo $telefone2 ?>" maxlenght="15">
                                <label for="telefone2">Telefone 2 (opcional)</label>
                            </div>
                     </div>
                    
                    <!--ENDEREÇO-->
                    <div class="container">
                        <p>&nbsp;</p>
                        <h6 class="light center-align">Endereço</h6>
                            <fieldset class="formulario" style="padding: 15px">
                                <!--CAMPO RUA-->
                                    <div class="input-field col s12">
                                       <i class="material-icons md-light prefix">home</i>
                                       <input type="text" name="rua" id="rua" value ="<?php echo $rua ?>" maxlenght="50" required>
                                       <label for="rua">Rua</label>
                                    </div>  
                                <!--CAMPO NUMERO-->
                                    <div class="input-field col s12">
                                        <i class="material-icons md-light prefix">local_convenience_store</i>
                                        <input type="number" name="numero" id="numero" min="1" max="5500" value ="<?php echo $numero ?>" maxlenght="4" required>
                                        <label for="num">Número do Local</label>
                                    </div>
                                <!--CAMPO BAIRRO-->
                                    <div class="input-field col s12">
                                        <i class="material-icons md-light prefix">location_city</i>
                                        <input type="text" name="bairro" id="bairro" value ="<?php echo $bairro ?>" maxlenght="35" required>
                                        <label for="bairro">Bairro</label>
                                    </div>
                                 <!--CAMPO CIDADE-->
                                    <div class="input-field col s12">
                                        <i class="material-icons md-light prefix">outlined_flag</i>
                                        <input type="text" name="cidade" id="cidade" value ="<?php echo $cidade ?>" maxlenght="35" required>
                                        <label for="cidade">Cidade</label>
                                    </div>
                                 <!--CAMPO ESTADO-->
                                    <div class="input-field col s12">
                                        <i class="material-icons md-light prefix">flag</i>
                                        <input type="text" name="estado" id="estado" value ="<?php echo $estado ?>" maxlenght="35" required>
                                        <label for="estado">Estado</label>
                                    </div>
                                 <!--CAMPO CEP-->
                                    <div class="input-field col s12">
                                        <i class="material-icons md-light prefix">format_list_numbered</i>
                                        <input type="tel" name="cep" id="cep" value ="<?php echo $cep ?>" maxlenght="8" required>
                                        <label for="cep">CEP</label>
                                    </div>
                    </div>
                    
                    <!--ASSOCIÇÃO MATRICULAR-->
                    <div class="container">
                        <p>&nbsp;</p>
                        <h6 class="light center-align">Associação Matricular</h6>
                            <fieldset class="formulario" style="padding: 15px">
                            <!--CAMPO PROFESSOR-->
                            <div class="input-field col s12">
                               <i class="material-icons md-light prefix">perm_identity</i>
                                <input type="text" name="professor" id="professor" value ="<?php echo $professor ?>" maxlenght="60" required>
                                <label for="professor">Nome do Professor</label>
                            </div>
                            <!--CAMPO ENTIDADE-->
                            <div class="input-field col s12">
                                <i class="material-icons md-light prefix">school</i>
                                <input type="text" name="entidade" id="entidade" value ="<?php echo $entidade ?>" maxlenght="75" required>
                                <label for="entidade">Nome da Entidade</label>
                            </div>
                            <!--CAMPO FAIXAS-->
                            <div class="input-field col s12">
                                <i class="material-icons md-light prefix">sports_hockey</i>
                                <input type="text" name="faixa" id="faixa" value ="<?php echo $faixa ?>" maxlenght="20" required>
                                <label for="faixa">Cor da Faixa</label>
                            </div>
                            <!--CAMPO DATA DAS FAIXAS-->
                            <div class="input-field col s12">
                                <i class="material-icons md-light prefix">date_range</i>
                                <input type="date" name="datafaixa" id="datafaixa" value ="<?php echo $datafaixa ?>" maxlenght="10" required>
                                <label for="datafaixa">Data de Recebimento da Faixa</label>
                            </div>
                    </div>
                    
                    <!--CAMPO OBSERVACOES-->
                    <div class="container">
                        <p>&nbsp;</p>
                        <h6 class="light center-align">Observações</h6>
                            <fieldset class="formulario" style="padding: 15px">
                                <form action="/action_page.php">
                                <textarea id="observacoes" name="observacoes" value ="<?php echo $observacoes ?>"  rows="10" cols="30"></textarea>
                                </form>
                    </div>
                    <!--BOTÕES-->
                    <div class="input-field col s12" id="centralizar">
                        <p>&nbsp;</p>
                        <input type="submit" value="alterar" class="btn black" style="border: 1px solid greenyellow; border-radius: 10px; margin: 18px;">
                        <a href="consulta.php" class="btn black" style="border: 1px solid red; border-radius: 10px; margin: 18px;">Cancelar</a>
                    </div>
                </fieldset>
            </form>
        </div>
        
<?php include_once 'includes/footer.inc.php' ?>