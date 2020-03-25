<?php


session_start(); 
if((substr_compare($_SESSION['permissao']['cliente'], '0', 1, 1)) == 0) {
    header("Location: ../Erro/permissao.php");
}

if(!empty($_POST)) {
    include_once '../../domain/cliente.php';
    include_once '../../domain/endereco.php';
    include_once '../../controller/clientecontrole.php';
    include_once '../../controller/enderecocontrole.php';

    $cliente = new Cliente();
    if (filter_has_var(INPUT_POST, "nome")) {
        $cliente->setNome($_POST['nome']);
    }
    if (filter_has_var(INPUT_POST, "cpf_cnpj")) {
        $cliente->setCpf_cnpj($_POST['cpf_cnpj']);  
        if ($cliente->getCpf_cnpj()=="")
            $cliente->setCpf_cnpj(NULL);
    }
    if (filter_has_var(INPUT_POST, "telefone1")) {
        $cliente->setTelefone1($_POST['telefone1']);
        if ($cliente->getTelefone1()=="")
            $cliente->setTelefone1(NULL);
    }
    if (filter_has_var(INPUT_POST, "telefone2")) {
        $cliente->setTelefone2($_POST['telefone2']);
        if ($cliente->getTelefone2()=="")
            $cliente->setTelefone2(NULL);
    }
    if (filter_has_var(INPUT_POST, "email")) {
        $cliente->setEmail($_POST['email']);
        if ($cliente->getEmail()=="")
            $cliente->setEmail(NULL);
    }

    $endereco = new Endereco();
    if (filter_has_var(INPUT_POST, "cep")) {
        $endereco->setCEP($_POST['cep']);
        if ($endereco->getCEP()=="")
            $endereco->setCEP(NULL);
    }
    if (filter_has_var(INPUT_POST, "rua")) {
        $endereco->setRua($_POST['rua']);
        if ($endereco->getRua()=="")
            $endereco->setRua(NULL);
    }
    if (filter_has_var(INPUT_POST, "numero")) {
        $endereco->setNumero($_POST['numero']);
        if ($endereco->getNumero()=="")
            $endereco->setNumero(NULL);
    }
    if (filter_has_var(INPUT_POST, "bairro")) {
        $endereco->setBairro($_POST['bairro']);  
        if ($endereco->getBairro()=="")
            $endereco->setBairro(NULL);
    }
    if (filter_has_var(INPUT_POST, "cidade")) {
        $endereco->setCidade($_POST['cidade']);
        if ($endereco->getCidade()=="")
            $endereco->setCidade(NULL);
    }
    if (filter_has_var(INPUT_POST, "uf")) {
        $endereco->setEstado(strtoupper($_POST['uf']));
        if ($endereco->getEstado()=="")
            $endereco->setEstado(NULL);
    }

    $clienteControle = new ClienteControle();
    $try = $clienteControle->inserirCliente($cliente);
    
    
    if(empty($try)) {
        if (!empty($endereco->getRua())) {
            $enderecoControle = new EnderecoControle();
            $try = $enderecoControle->inserirEndereco($endereco, "cliente");
        }
    }
}
?>

<html>
    <head>
        <title>PMA - Cadastrar Cliente</title>
        <link rel="icon" href="../../util/icon.png" type="image/icon type">
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../util/links/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
        <link href="../../util/sizes.css" rel="stylesheet" type="text/css" />
        <link href="../../util/styles.css" rel="stylesheet" type="text/css" />
        
        <script src="../../util/links/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../../util/validationForm.js"></script>
        <script type="text/javascript" src="../../util/jquery.mask.js"></script>
    </head>
    <body>
    <div class="container">
        <div class="jumbotron row">
            <div>
                <h2>Cadastro de Clientes</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
            </div>
            
            <div class="header-user">
                <div class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="../../util/user.png" width="30px" height="30px">
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#"><?php
                                                                if(isset($_SESSION['usuario'])) {
                                                                    echo 'Usuário: '. $_SESSION['usuario'];
                                                                } else {
                                                                    header("Location: ../login/login.php");
                                                                } ?></a>
                        <a class="dropdown-item" href="../Registro/list_registro.php">Log de registros</a>
                        <a class="dropdown-item" href="../Home/logout.php">Sair</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div clas="span10 offset1">
          <div class="card">
            <div class="card-header">
                <h3 class="well"> Adicionar Cliente </h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal needs-validation" novalidate action="create_cliente.php" method="post">

                <fieldset>
                <legend>Novo Cliente</legend>
                
                <div class="form-group col-md-8">
                    <label for="nome">Nome: </label>
                    <input class="form-control nome" type="text" required name="nome" id="nome" placeholder="Nome" value="<?php if(!empty($try)) echo $cliente->getNome(); ?>" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ][A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ\s*?]{3,50}" />
                    <div class="valid-feedback">
                        Ok!
                    </div>
                    <div class="invalid-feedback">
                        Nome inválido.
                    </div>
                </div>
                
                <div class="form-group col-md-2">
                    <label for="telefone">Documento: </label>
                    <input class="form-control documento" type="text" inputmode="numeric" pattern=".{14}|.{18}" name="cpf_cnpj" id="cpf_cnpj" placeholder="CPF ou CNPJ" value="<?php if(!empty($try)) echo $cliente->getCpf_cnpj(); ?>" />
                    <div class="invalid-feedback">
                        Documento inválido.
                    </div>
                </div>
                
                <script type="text/javascript">
                    
                    var Doc = function (val) {
                        return val.replace(/\D/g, '').length >= 12 ? '00.000.000/0000-00' : '000.000.000-000';
                    },
                    docOptions = {
                        onKeyPress: function(val, e, field, options) {
                            field.mask(Doc.apply({}, arguments), options);
                        }
                    };

                    $('.documento').mask(Doc, docOptions);
                    
                </script>
                
                <div class="form-group col-md-2">
                    <label for="telefone">Telefone 01: </label>
                    <input class="form-control telefone" type="text" inputmode="tel" pattern=".{13,14}" name="telefone1" id="telefone1" placeholder="(00)00000-0000" value="<?php if(!empty($try)) echo $cliente->getTelefone1() ?>" />
                    <div class="invalid-feedback">
                        Telefone inválido.
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <label for="telefone">Telefone 02: </label>
                    <input class="form-control telefone" type="text" inputmode="tel" pattern=".{13,14}" name="telefone2" id="telefone2" placeholder="(00)00000-0000" value="<?php if(!empty($try)) echo $cliente->getTelefone2() ?>" />
                    <div class="invalid-feedback">
                        Telefone inválido.
                    </div>
                </div>
                
                <script type="text/javascript">
                    
                    var SPMaskBehavior = function (val) {
                        return val.replace(/\D/g, '').length === 11 ? '(00)00000-0000' : '(00)0000-00000';
                    },
                    spOptions = {
                        onKeyPress: function(val, e, field, options) {
                            field.mask(SPMaskBehavior.apply({}, arguments), options);
                        }
                    };

                    $('.telefone').mask(SPMaskBehavior, spOptions);
                    
                </script>

                <div class="form-group col-md-6">
                    <label for="email">E-Mail: </label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="exemplo@meudominio.com" value="<?php if(!empty($try)) echo $cliente->getEmail()?>" pattern="[a-z0-9._%+-]{1,50}@[a-z0-9.-]{1,15}\.[a-z]{2,10}$" />
                    <div class="invalid-feedback">
                        E-mail inválido.
                    </div>
                </div>
                
                
                </fieldset>
                    
                
                    
                    
                    
                    <!-- Adicionando JQuery -->
                    

                    <!-- Adicionando Javascript -->
                    <script type="text/javascript" >

                        $(document).ready(function() {
                            
                            function limpa_formulário_cep() {
                                // Limpa valores do formulário de cep.
                                $("#rua").val("");
                                $("#bairro").val("");
                                $("#cidade").val("");
                                $("#uf").val("");
                                $("#rua").removeAttr("readonly");
                                $("#bairro").removeAttr("readonly");
                                $("#cidade").removeAttr("readonly");
                                $("#uf").removeAttr("readonly");
                                $("#rua").focus();
                                $("#rua").blur();
                                $("#cidade").focus();
                                $("#cidade").blur();
                                $("#uf").focus();
                                $("#uf").blur();
                            }

                            //Quando o campo cep perde o foco.
                            
                            $("#cep").blur(function() {

                                //Nova variável "cep" somente com dígitos.
                                var cep = $(this).val().replace(/\D/g, '');

                                //Verifica se campo cep possui valor informado.
                                if (cep != "") {

                                    //Expressão regular para validar o CEP.
                                    var validacep = /^[0-9]{8}$/;

                                    //Valida o formato do CEP.
                                    if(validacep.test(cep)) {

                                        //Preenche os campos com "..." enquanto consulta webservice.
                                        $("#rua").val("...");
                                        $("#bairro").val("...");
                                        $("#cidade").val("...");
                                        $("#uf").val("...");

                                        //Consulta o webservice viacep.com.br/
                                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                                            if (!("erro" in dados)) {
                                                //Atualiza os campos com os valores da consulta.
                                                $("#rua").val(dados.logradouro);
                                                $("#bairro").val(dados.bairro);
                                                $("#cidade").val(dados.localidade);
                                                $("#uf").val(dados.uf);
                                                
                                                //Campos encontrados deixam de ser editáveis
                                                if(dados.logradouro.toString()=="")
                                                     $("#rua").removeAttr("readonly");
                                                else {
                                                    $("#rua").focus();
                                                    $("#rua").blur();
                                                    $("#rua").attr("readonly", "true");
                                                }
                                                if(dados.bairro.toString()=="")
                                                     $("#bairro").removeAttr("readonly");
                                                else {
                                                    $("#bairro").focus();
                                                    $("#bairro").blur();
                                                    $("#bairro").attr("readonly", "true");
                                                }
                                                if(dados.localidade.toString()=="")
                                                     $("#cidade").removeAttr("readonly");
                                                else {
                                                    $("#cidade").focus();
                                                    $("#cidade").blur();
                                                    $("#cidade").attr("readonly", "true");
                                                }
                                                if(dados.uf.toString()=="")
                                                     $("#uf").removeAttr("readonly");
                                                else {
                                                    $("#uf").focus();
                                                    $("#uf").blur();
                                                    $("#uf").attr("readonly", "true");
                                                }
                                            } //end if.
                                            else {
                                                //CEP pesquisado não foi encontrado.
                                                limpa_formulário_cep();
                                                alert("CEP não encontrado.");
                                            }
                                        });
                                    } //end if.
                                    else {
                                        //cep é inválido.
                                        limpa_formulário_cep();
                                        alert("Formato de CEP inválido.");
                                    }
                                } //end if.
                                else {
                                    //cep sem valor, limpa formulário.
                                    limpa_formulário_cep();
                                }
                            });
                        });

                    </script>
                    <fieldset>
                    <legend>Endereço</legend>
                    <div id="endereco">
                    
                    <div class="form-group row" style="margin-left: 3px">
                        
                        <div class="form-group col-md-2">
                            <label for="cep">CEP: </label>
                            <input type="text" class="form-control cep" pattern=".{9}" inputmode="numeric" required name="cep" id="cep" placeholder="CEP" value="<?php if(!empty($try)) if(!empty($endereco->getCEP())) echo $endereco->getCEP() ?>" />
                            <div class="valid-feedback">
                                Ok!
                            </div>
                            <div class="invalid-feedback">
                                CEP inválido.
                            </div>
                        </div>
                        
                        
                        
                        <div class="form-group col-md-7">
                            <label for="rua">Rua: </label>
                            <input type="text" class="form-control rua" required name="rua" id="rua" placeholder="Rua" value="<?php if(!empty($try)) if(!empty($endereco->getRua())) echo $endereco->getRua() ?>" pattern="[0-9]{0,4}\s?[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ][A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ\s*?]{1,25}[0-9]{0,4}[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ\s*?]{1,25}[0-9]{0,4}" />
                            <div class="valid-feedback">
                                Ok!
                            </div>
                            <div class="invalid-feedback">
                                Rua inválida.
                            </div>
                        </div>
                        
                        <div class="form-group col-md-2">
                            <label for="numero">Numero: </label>
                            <input type="text" class="form-control num" inputmode="numeric" pattern=".{1,7}" name="numero" id="numero" placeholder="Numero" value="<?php if(!empty($try)) if(!empty($endereco->getNumero())) echo $endereco->getNumero() ?>" />
                            <div class="invalid-feedback">
                                Número inválido.
                            </div>
                        </div>
                          
                        <div class="form-group col-md-5"> 
                            <label for="bairro">Bairro: </label>
                            <input type="text" class="form-control bairro" name="bairro" id="bairro" placeholder="Bairro" value="<?php if(!empty($try)) if(!empty($endereco->getBairro())) echo $endereco->getBairro() ?>" pattern="[0-9]{0,4}\s?[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ][A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ\s*?]{1,25}[0-9]{0,4}[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ\s*?]{1,25}[0-9]{0,4}" />
                            <div class="invalid-feedback">
                                Bairro inválido.
                            </div>
                        </div>
                        
                        <div class="form-group col-md-5">
                            <label for="cidade">Cidade: </label>
                            <input type="text" class="form-control cidade" required name="cidade" id="cidade" placeholder="Cidade" value="<?php if(!empty($try)) if(!empty($endereco->getCidade())) echo $endereco->getCidade() ?>" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ][A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ\s*?]{3,50}" />
                            <div class="valid-feedback">
                                Ok!
                            </div>
                            <div class="invalid-feedback">
                                Cidade inválida.
                            </div>
                        </div>
                    
                        <div class="form-group col-md-1">
                            <label for="uf">Estado: </label>
                            <input type="text" class="form-control estado" required name="uf" id="uf" placeholder="UF" value="<?php if(!empty($try)) if(!empty($endereco->getEstado())) echo $endereco->getEstado() ?>" pattern="[A-Za-z]{2}" />
                            <div class="valid-feedback">
                                Ok!
                            </div>
                            <div class="invalid-feedback">
                                Estado inválido.
                            </div>
                        </div>
                    
                        <script type="text/javascript">
                            
                            $('.cep').mask('00000-000');
                            $('.num').mask('0000000');
                            $('.nome').mask('XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', {translation:  {'X': {pattern: /[a-zA-Z\u00C0-\u00FF ]/}}});
                            $('.rua').mask('XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', {translation:  {'X': {pattern: /[a-zA-Z0-9\u00C0-\u00FF ]/}}});
                            $('.bairro').mask('XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', {translation:  {'X': {pattern: /[a-zA-Z0-9\u00C0-\u00FF ]/}}});
                            $('.cidade').mask('XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', {translation:  {'X': {pattern: /[a-zA-Z0-9\u00C0-\u00FF ]/}}});
                            $('.estado').mask('XX', {translation:  {'X': {pattern: /[A-Za-z]/}}});
                            
                        </script>
                    
                    </div>
                    </div>
                    <button type="button" style="min-width: 200px;" class="btn btn-outline-secondary" onclick="toogleAdress()" id='toogle' nome='toogle'> Não cadastrar endereço </button>
                    </fieldset>
                    
                    
                    <script>
                        function toogleAdress () {
                            x = document.getElementById("endereco");
                            if (x.style.display == 'none') {
                                x.style.display = 'block';
                                document.getElementById("cep").required = true;
                                document.getElementById("rua").required = true;
                                document.getElementById("cidade").required = true;
                                document.getElementById("uf").required = true;
                                document.getElementById("toogle").innerHTML = 'Não cadastrar endereço';
                            } else {
                                x.style.display = 'none';
                                document.getElementById("cep").required = false;
                                document.getElementById("rua").required = false;
                                document.getElementById("cidade").required = false;
                                document.getElementById("uf").required = false;
                                document.getElementById("toogle").innerHTML = 'Cadastrar endereço';
                            }
                        }
                    </script>
                    
                    <?php 
                    if (!empty($try))
                        if(empty ($endereco->getRua()))
                            echo '<script>
                            setTimeout(function (){
                                document.getElementById("toogle").click();
                            }, 250); 
                            </script>';
                    ?>
                
                <div class="form-actions">
                    <br/>

                    <button type="submit" class="btn btn-success">Adicionar</button>
                    <a href="../Home/home.php" type="btn" class="btn btn-default">Menu Principal</a>
                    <a href="list_cliente.php" type="btn" class="btn btn-default">Voltar</a>

                </div>
            </form>
          </div>
        </div>
        </div>
    </div>
        
        <?php 
        
        
        if(!empty($_POST))
            if(!empty($try))
                echo '<script> 
                    $(document).ready(function() {
                        $("#exampleModalCenter").modal("toggle");
                    });
                </script>';
            elseif (!empty ($try2))
                echo '<script> 
                    $(document).ready(function() {
                        $("#exampleModalCenter").modal().on("hidden.bs.modal", function (e) {
                            window.location.href = "list_cliente.php";
                        })
                        $("#exampleModalCenter").modal("toggle");
                    });
                </script>';
            else
                echo '<script> 
                    $(document).ready(function() {
                        $("#confirmModal").modal().on("hidden.bs.modal", function (e) {
                            window.location.href = "list_cliente.php";
                        })
                        $("#confirmModal").modal("toggle");
                    });
                </script>';
        
        ?>
        
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Erro: </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-12">
                      <label for="erro">Erro na inserção de dados: </label><br>
                            <?php 
                            
                            if (strpos($try, 'Duplicate')) { 

                            if (strpos($try, "'nome'"))
                                echo 'O nome inserido já existe no banco de dados, e não pode ser cadastrado em duplicidade. Em caso de dúvidas, entre em contato com o suporte.';
                            elseif (strpos($try, "'cpf_cnpj'"))
                                echo 'O campo CPF/CNPJ inserido já existe no banco de dados, e não pode ser cadastrado em duplicidade. Em caso de dúvidas, entre em contato com o suporte.';

                            } else { echo $try; }

                            ?>
                    </div>
                    <div style="text-align: center;"><img src="../../util/suporte-tecnico.png" height="250px" width="250px" /></div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                  <!--<button type="button" class="btn btn-primary" id="designar">Salvar</button>-->
                </div>
              </div>
            </div>
        </div>
        
        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Dados adicionados: </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-8">
                            O cliente foi cadastrado com sucesso!
                    </div>
                    <div style="text-align: center;"><img src="../../util/confirma.png" height="175px" width="175px" /></div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                  <a href="create_cliente.php" type="button" class="btn btn-primary" id="designar">Cadastrar Outro</a>
                </div>
              </div>
            </div>
        </div>
    
    <script src="../../util/links/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../../util/links/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <p></p>
  </body>
</html>
