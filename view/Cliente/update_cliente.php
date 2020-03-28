<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
session_start(); 
if((substr_compare($_SESSION['permissao']['cliente'], '0', 2, 1)) == 0) {
    header("Location: ../Erro/permissao.php");
}
?>

<html>
    <head>
        <title>PMA - Atualizar Cliente</title>
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
        <script src="../../util/links/c0930358e4.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
        
            include '../../domain/cliente.php';
            include '../../domain/endereco.php';
            include '../../controller/clientecontrole.php';
            include '../../controller/enderecocontrole.php';
           
	if ( !empty($_GET['id']))
            {
		$id = $_REQUEST['id'];
            }
	if (!empty($_POST)) {
            $cliente = new Cliente();
            $id = ($_POST['id']);
            $cliente->setNome($_POST['nome']);
            if (!empty($_POST['cpf_cnpj']))
                $cliente->setCpf_cnpj($_POST['cpf_cnpj']);
            if (!empty($_POST['telefone1']))
                $cliente->setTelefone1($_POST['telefone1']);
            if (!empty($_POST['telefone2']))
                $cliente->setTelefone2($_POST['telefone2']);
            $cliente->setEmail($_POST['email']);
            if ($cliente->getEmail()=="")
                    $cliente->setEmail(NULL);
            
            $clienteControle = new ClienteControle();
            $try = $clienteControle->updateCliente($cliente, $id);
            
	} else {
            $clienteControle = new ClienteControle();
            $data = $clienteControle->readCliente($id);
	}
	
    ?>
        <div class="container">
            <div class="jumbotron row">
                <div>
                    <h2>Atualização de Clientes</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
                </div>
                <div class="header-user">
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-friends" style="color: #ffc73d; font-size: 160%"></i>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#"><i class="fas fa-user"></i> <?php
                                                                    if(isset($_SESSION['usuario'])) {
                                                                        echo 'Usuário: '. $_SESSION['usuario'];
                                                                    } else {
                                                                        header("Location: ../login/login.php");
                                                                    } ?></a>
                            <a class="dropdown-item" href="../Registro/list_registro.php"><i class="fas fa-clipboard"></i> Log de registros</a>
                            <a class="dropdown-item" href="../Home/logout.php"><i class="fas fa-door-open"></i> Sair</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="well"> Atualizar Cliente </h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal needs-validation" novalidate action="update_cliente.php" method="post">
                    <fieldset>
                            <legend>Cliente</legend>

                            <input type="hidden" name="id" id="id" value="<?php echo $id ?>" />

                            <div class="form-group col-md-8">
                                <label for="nome">Nome: </label>
                                <input class="form-control nome" type="text" required name="nome" id="nome" placeholder="Nome" value="<?php if(empty($_POST)) echo $data['nome']; else echo $cliente->getNome(); ?>" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ][A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ\s*?]{3,50}" />
                                <div class="valid-feedback">
                                    Ok!
                                </div>
                                <div class="invalid-feedback">
                                    Nome inválido.
                                </div>
                            </div>

                            <script type="text/javascript">
                                $('.nome').mask('XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', {translation:  {'X': {pattern: /[a-zA-Z\u00C0-\u00FF ]/}}});
                            </script>

                            <div class="form-group col-md-2">
                                <label for="telefone">Documento: </label>
                                <input class="form-control documento" type="text" inputmode="numeric" pattern=".{14}|.{18}" name="cpf_cnpj" id="cpf_cnpj" placeholder="CPF ou CNPJ" value="<?php if(!empty($_POST)) { if(!empty($cliente->getCpf_cnpj())) echo $cliente->getCpf_cnpj(); } else echo $data['cpf_cnpj']?>" />
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
                                <input class="form-control telefone" type="text" inputmode="tel" pattern=".{13,14}" name="telefone1" id="telefone1" placeholder="(00)00000-0000" value="<?php if(!empty($_POST)) { if(!empty($cliente->getTelefone1())) echo $cliente->getTelefone1(); } else echo $data['telefone1']?>" />
                                <div class="invalid-feedback">
                                    Telefone inválido.
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="telefone">Telefone 02: </label>
                                <input class="form-control telefone" type="text" inputmode="tel" pattern=".{13,14}" name="telefone2" id="telefone2" placeholder="(00)00000-0000" value="<?php if(!empty($_POST)) { if(!empty($cliente->getTelefone2())) echo $cliente->getTelefone2(); } else echo $data['telefone2']?>" />
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
                                <input type="email" class="form-control" name="email" id="email" placeholder="exemplo@meudominio.com" value="<?php if(!empty($_POST)) { if(!empty($cliente->getEmail())) echo $cliente->getEmail (); } else echo $data['email']?>" pattern="[a-z0-9._%+-]{1,50}@[a-z0-9.-]{1,15}\.[a-z]{2,10}$" />
                                <div class="invalid-feedback">
                                    E-mail inválido.
                                </div>
                            </div>


                            </fieldset>



                            <div class="control-group">
                                    <label class="control-label">Endereço(s):</label>
                                    <div class="controls">
                                        <label class="carousel-inner">
                                <?php

                                    echo '<table class="table table-striped">';
                                            echo '<thead>';
                                                echo '<tr>';
                                                    echo '<th scope="col"></th>';
                                                    echo '<th scope="col">Rua</th>';
                                                    echo '<th scope="col">Número</th>';
                                                    echo '<th scope="col">Bairro</th>';
                                                    echo '<th scope="col">Cidade</th>';
                                                    echo '<th scope="col">Estado</th>';
                                                    echo '<th scope="col">CEP</th>';
                                                    echo '<th scope="col"></th>';
                                                echo '</tr>';
                                            echo '</thead>';

                                            include_once '../../controller/enderecocontrole.php';
                                    $enderecoControle = new EnderecoControle();
                                    $data_fk = $enderecoControle->list_enderecosCliente($id);
                                    if ($data_fk != NULL) {
                                        foreach($data_fk as $row) if($row['ativo']) {
                                        //echo $row['rua'];


                                            echo '<tbody>';
                                                echo '<tr>';
                                                                  echo '<th scope="row">'. $row['id'] . '</th>';
                                                echo '<td>'. $row['rua'] . '</td>';
                                                echo '<td>'. $row['numero'] . '</td>';
                                                echo '<td>'. $row['bairro'] . '</td>';
                                                echo '<td>'. $row['cidade'] . '</td>';
                                                echo '<td>'. $row['estado'] . '</td>';
                                                echo '<td>'. $row['CEP'] . '</td>';
                                                echo '<td width=250>';
                                                echo '<a class="btn btn-warning" href="../Endereco/update_endereco.php?id='.$row['id'].'&cliente='.$id.'">Atualizar</a>';
                                                echo ' ';
                                                echo '<a class="btn btn-danger" href="../Endereco/delete_endereco.php?id='.$row['id'].'&cliente='.$id.'">Excluir</a>';
                                                echo '</td>';
                                                echo '</tr>';        
                                            echo '</tbody>';

                                        }
                                    }


                                        echo '</table>';

                                ?>
                                        </label>

                                <div class="form-actions" align="right">
                                    <?php echo '<a class="btn btn-default" href="../Endereco/create_endereco.php?cliente='.$id.'">Adicionar Endereço</a>' ?>
                                </div>

                                <br/>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">Atualizar</button>
                                    <a href="list_cliente.php" type="btn" class="btn btn-default">Voltar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        
        
        <?php 
        
        
        if(!empty($_POST))
            if(!empty($try))
                echo '<script> 
                    $(document).ready(function() {
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
                  <h5 class="modal-title" id="exampleModalLongTitle">Dados atualizados: </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-8">
                            O cliente foi atualizado com sucesso!
                    </div>
                    <div style="text-align: center;"><img src="../../util/update.png" height="175px" width="175px" /></div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                </div>
              </div>
            </div>
        </div>
        
        
        
        <script src="../../util/links/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="../../util/links/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <p></p>
    </body>
</html>
