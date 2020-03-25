<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>PMA - Cadastrar Tarefa</title>
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
                    <h2>Cadastro de Tarefas</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
                </div>
                <div class="header-user">
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="../../util/user.png" width="30px" height="30px">
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#"><?php session_start(); 
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
            
            <?php
            
            if(!empty($_GET['tipoProjeto_id']))
            {
                $tipoProjeto_id = $_REQUEST['tipoProjeto_id'];
            }
            if(!empty($_GET['projeto_id']))
            {
                $projeto_id = $_REQUEST['projeto_id'];
            }
            if(!empty($_POST))
            {
                include_once '../../domain/tarefa.php';
                include_once '../../controller/TarefaControle.php';
                $tarefa = new Tarefa();
                
                $tarefa->setDescricao($_POST['descricao']);
                $tarefa->setPeso($_POST['peso']);
                
                $tarefaControle = new TarefaControle();
                
                if(!empty($_POST['tipoProjeto_id'])) {
                    $try = $tarefaControle->novaTarefa_TipoProjeto($tarefa, $_POST['tipoProjeto_id']);
                }
                elseif (!empty($_POST['projeto_id'])) 
                    $try = $tarefaControle->novaTarefa_Projeto2($tarefa, $_POST['projeto_id']);
                
            }

            ?>
    
            <div clas="span10 offset1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="well"> Adicionar Modelo de Projeto </h3>
                    </div>
                    <div class="card-body">
            
                        <form class="form-horizontal needs-validation" novalidate action="create_tarefa.php" method="post">




                            <fieldset>
                            <legend>Tarefa</legend>
                            <div id="tarefa">

                                <?php 
                                if(!empty($tipoProjeto_id)) echo '<input type="hidden" name="tipoProjeto_id" id="tipoProjeto_id" value="'.$tipoProjeto_id.'" />';
                                if(!empty($projeto_id)) echo '<input type="hidden" name="projeto_id" id="projeto_id" value="'.$projeto_id.'" />';
                                ?>
                            
                                <div class="form-group col-md-6">
                                    <label for="descricao">Descrição: </label>
                                    <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição" value="" required pattern=".{1,85}" />
                                    <div class="valid-feedback">
                                        Ok!
                                    </div>
                                    <div class="invalid-feedback">
                                        Descrição inválida.
                                    </div>
                                </div>
                            
                                <div class="form-group col-md-1">
                                    <label for="peso">Peso: </label>
                                    <input type="text" inputmode="numeric" class="form-control peso" name="peso" id="peso" placeholder="Peso" value="" required pattern="[0-9]{1,4}" />
                                    <div class="valid-feedback">
                                        Ok!
                                    </div>
                                    <div class="invalid-feedback">
                                        Peso inválido.
                                    </div>
                                </div>
                            </div>
                            
                            <script type="text/javascript">
                                $('.peso').mask('0000');
                            </script>
                            
                            </fieldset>
                            
                            <div class="form-actions">
                                <br/>

                                <button type="submit" class="btn btn-success">Adicionar</button>
                                <a href="../Home/home.php" type="btn" class="btn btn-default">Menu Principal</a>
                                <a href="#" type="btn" class="btn btn-default" onclick="goBack();">Voltar</a>
                                <script>
                                    function goBack () {
                                        window.history.back();
                                    }
                                </script>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        
        <script src="../../util/links/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="../../util/links/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="../../util/links/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <?php
        
        if(!empty($_POST))
            if(!empty ($try))
                echo '<script> 
                    $(document).ready(function() {
                        $("#errorModal").modal("toggle");
                    });
                </script>';
            else 
                echo '<script> 
                    $(document).ready(function() {
                        $("#confirmModal").modal().on("hidden.bs.modal", function (e) {
                            window.history.go(-2);
                        });
                        $("#confirmModal").modal("toggle");
                    });
                </script>';
        
        ?>
        
        <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                            
                            { echo $try; }
                            
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
                            A tarefa foi cadastrada com sucesso!
                    </div>
                    <div style="text-align: center;"><img src="../../util/confirma.png" height="175px" width="175px" /></div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                </div>
              </div>
            </div>
        </div>
        
        <p></p>
        
    </body>
</html>
