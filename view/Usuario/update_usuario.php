<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php

session_start(); 
if((substr_compare($_SESSION['permissao']['usuario'], '0', 2, 1)) == 0) {
    header("Location: ../Erro/permissao.php");
}

include_once '../../domain/usuario.php';
include_once '../../domain/permissao.php';
include_once '../../controller/usuariocontrole.php';
include_once '../../controller/PermissaoControle.php';

if(!empty($_GET['id'])) {
    {
        $id = $_REQUEST['id'];
    }
}

if(!empty($_POST)) {
    $usuario = new Usuario();
    $usuario->setPermissao_id(new permissao());
    
    $id = $_REQUEST['id'];
    
    $usuario->setUsuario($_POST['usuario']);
    if(isset($_POST['senha']))
        $usuario->setSenha($_POST['senha']);
    
    if (isset($_POST['adm'])) {
        $permissao = "1";
    } else {
        $permissao = "0";
    }
    
    $usuario->getPermissao_id()->setAdm($permissao);
    
    if (isset($_POST['ler_usuario'])) {
        $permissao = "1";
    } else {
        $permissao = "0";
    }
    if (isset($_POST['cadastrar_usuario'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['alterar_usuario'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['excluir_usuario'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    
    $usuario->getPermissao_id()->setUsuario($permissao);
    
    if (isset($_POST['ler_empresa'])) {
        $permissao = "1";
    } else {
        $permissao = "0";
    }
    if (isset($_POST['cadastrar_empresa'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['alterar_empresa'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['excluir_empresa'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    
    $usuario->getPermissao_id()->setEmpresa($permissao);
    
    if (isset($_POST['ler_cliente'])) {
        $permissao = "1";
    } else {
        $permissao = "0";
    }
    if (isset($_POST['cadastrar_cliente'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['alterar_cliente'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['excluir_cliente'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    
    $usuario->getPermissao_id()->setCliente($permissao);
    
    if (isset($_POST['ler_endereco'])) {
        $permissao = "1";
    } else {
        $permissao = "0";
    }
    if (isset($_POST['cadastrar_endereco'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['alterar_endereco'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['excluir_endereco'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    
    $usuario->getPermissao_id()->setEndereco($permissao);
    
    if (isset($_POST['ler_projeto'])) {
        $permissao = "1";
    } else {
        $permissao = "0";
    }
    if (isset($_POST['cadastrar_projeto'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['alterar_projeto'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['excluir_projeto'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    
    $usuario->getPermissao_id()->setProjeto($permissao);
    
    if (isset($_POST['ler_iteracao'])) {
        $permissao = "1";
    } else {
        $permissao = "0";
    }
    if (isset($_POST['cadastrar_iteracao'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['alterar_iteracao'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['excluir_iteracao'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    
    $usuario->getPermissao_id()->setIteracao($permissao);
    
    if (isset($_POST['ler_tipo'])) {
        $permissao = "1";
    } else {
        $permissao = "0";
    }
    if (isset($_POST['cadastrar_tipo'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['alterar_tipo'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['excluir_tipo'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    
    $usuario->getPermissao_id()->setTipoprojeto($permissao);
    
    if (isset($_POST['ler_tarefa'])) {
        $permissao = "1";
    } else {
        $permissao = "0";
    }
    if (isset($_POST['cadastrar_tarefa'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['alterar_tarefa'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    if (isset($_POST['excluir_tarefa'])) {
        $permissao = $permissao."1";
    } else {
        $permissao = $permissao."0";
    }
    
    $usuario->getPermissao_id()->setTarefa($permissao);
    $permissao_id = $_REQUEST['permissao_id'];
    
    $usuarioControle = new UsuarioControle();
    if(!empty($_POST['senha']))
        $try = $usuarioControle->updateUsuario($usuario, $id);
    else
        $try = $usuarioControle->updateUsuario_semSenha ($usuario, $id);
    $permissaoControle = new PermissaoControle();
    if(empty($try))
        $try = $permissaoControle->updatePermissao($usuario->getPermissao_id(), $permissao_id);
    
    //header("Location: list_usuario.php");
} else {
    $usuarioControle = new UsuarioControle();
    $data = $usuarioControle->readUsuario($id);
    $permissaoControle = new PermissaoControle();
    $data_fk = $permissaoControle->readPermissao($data['permissao_id']);
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>PMA - Atualizar Usuário</title>
        <link rel="icon" href="../../util/icon.png" type="image/icon type">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../util/links/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="../../util/sizes.css" rel="stylesheet" type="text/css" />
        <link href="../../util/styles.css" rel="stylesheet" type="text/css" />
        <script src="../../util/links/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../../util/validationForm.js"></script>
        <script type="text/javascript" src="../../util/jquery.mask.js"></script>
        <script src="../../util/links/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="../../util/links/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="../../util/links/c0930358e4.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="jumbotron row">
                <div>
                    <h2>Atualização de Usuários</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
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
            
            <div clas="span10 offset1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="well"> Atualizar Usuário </h3>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal needs-validation" novalidate action="update_usuario.php" method="post">

                        <div class="row">
                            <fieldset style="padding-left: 1.5em;">
                                <legend>Usuário</legend>
                                        
                                <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
                                <input type="hidden" name="permissao_id" id="permissao_id" value="<?php echo $data['permissao_id']; ?>" />
                                
                                <div class="form-group col-md-12">
                                    <label for="usuario">Nome de usuário: </label>
                                    <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario" value="<?php if(!empty($_POST)) echo $_POST['usuario']; else echo $data['usuario']; ?>" pattern=".{1,30}" required />
                                    <div class="valid-feedback">
                                        Ok!
                                    </div>
                                    <div class="invalid-feedback">
                                        Nome de usuário inválido.
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="senha">Senha: </label>
                                    <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" value="" pattern=".{1,30}" />
                                    <div class="valid-feedback">
                                        Ok!
                                    </div>
                                    <div class="invalid-feedback">
                                        Senha inválida.
                                    </div>
                                </div>

                                <label for="adm">Administrador: </label> <input type="checkbox" name="adm" id="adm" <?php if(isset($_POST['adm'])) echo 'checked'; else if(empty ($_POST)) if($data_fk["adm"]) echo 'checked'; ?>>

                            </fieldset>
                                
                            <fieldset style="padding-left: 1.5em;">
                                <legend>Permissões do usuário</legend>
                                <table class="table-striped">
                                    <tr>
                                        <th style="width: 150px;"></th>
                                        <th style="width: 100px;">Leitura</th>
                                        <th style="width: 100px;">Cadastro</th>
                                        <th style="width: 100px;">Alteração</th>
                                        <th style="width: 100px;">Exclusão</th>
                                        <td style="width: 100px;">Marcar todos</td>
                                    </tr>
                                    <tr>
                                        <td><label>Usuarios</label></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="ler_usuario" id="ler_usuario" <?php if(!empty($_POST['ler_usuario'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['usuario'], 0, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="cadastrar_usuario" id="cadastrar_usuario" <?php if(!empty($_POST['cadastrar_usuario'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['usuario'], 1, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="alterar_usuario" id="alterar_usuario" <?php if(!empty($_POST['alterar_usuario'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['usuario'], 2, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="excluir_usuario" id="excluir_usuario" <?php if(!empty($_POST['excluir_usuario'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['usuario'], 3, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="marcar_usuario" id="marcar_usuario" onclick="marcarUsuarios();"></td>
                                    </tr>
                                    <tr>
                                        <td><label>Empresas</label></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="ler_empresa" id="ler_empresa" <?php if(!empty($_POST['ler_empresa'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['empresa'], 0, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="cadastrar_empresa" id="cadastrar_empresa" <?php if(!empty($_POST['cadastrar_empresa'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['empresa'], 1, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="alterar_empresa" id="alterar_empresa" <?php if(!empty($_POST['alterar_empresa'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['empresa'], 2, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="excluir_empresa" id="excluir_empresa" <?php if(!empty($_POST['excluir_empresa'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['empresa'], 3, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="marcar_empresa" id="marcar_empresa" onclick="marcarEmpresas();"></td>
                                    </tr>
                                    <tr>
                                        <td><label>Clientes</label></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="ler_cliente" id="ler_cliente" <?php if(!empty($_POST['ler_cliente'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['cliente'], 0, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="cadastrar_cliente" id="cadastrar_cliente" <?php if(!empty($_POST['cadastrar_cliente'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['cliente'], 1, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="alterar_cliente" id="alterar_cliente" <?php if(!empty($_POST['alterar_cliente'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['cliente'], 2, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="excluir_cliente" id="excluir_cliente" <?php if(!empty($_POST['excluir_cliente'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['cliente'], 3, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="marcar_cliente" id="marcar_cliente" onclick="marcarClientes();"></td>
                                    </tr>
                                    <tr>
                                        <td><label>Endereços</label></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="ler_endereco" id="ler_endereco" <?php if(!empty($_POST['ler_endereco'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['endereco'], 0, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="cadastrar_endereco" id="cadastrar_endereco" <?php if(!empty($_POST['cadastrar_endereco'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['endereco'], 1, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="alterar_endereco" id="alterar_endereco" <?php if(!empty($_POST['alterar_endereco'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['endereco'], 2, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="excluir_endereco" id="excluir_endereco" <?php if(!empty($_POST['excluir_endereco'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['endereco'], 3, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="marcar_endereco" id="marcar_endereco" onclick="marcarEnderecos();"></td>
                                    </tr>
                                    <tr>
                                        <td><label>Projetos</label></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="ler_projeto" id="ler_projeto" <?php if(!empty($_POST['ler_projeto'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['projeto'], 0, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="cadastrar_projeto" id="cadastrar_projeto" <?php if(!empty($_POST['cadastrar_projeto'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['projeto'], 1, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="alterar_projeto" id="alterar_projeto" <?php if(!empty($_POST['alterar_projeto'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['projeto'], 2, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="excluir_projeto" id="excluir_projeto" <?php if(!empty($_POST['excluir_projeto'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['projeto'], 3, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="marcar_projeto" id="marcar_projeto" onclick="marcarProjetos();"></td>
                                    </tr>
                                    <tr>
                                        <td><label>Iterações</label></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="ler_iteracao" id="ler_iteracao" <?php if(!empty($_POST['ler_iteracao'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['iteracao'], 0, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="cadastrar_iteracao" id="cadastrar_iteracao" <?php if(!empty($_POST['cadastrar_iteracao'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['iteracao'], 1, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="alterar_iteracao" id="alterar_iteracao" <?php if(!empty($_POST['alterar_iteracao'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['iteracao'], 2, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="excluir_iteracao" id="excluir_iteracao" <?php if(!empty($_POST['excluir_iteracao'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['iteracao'], 3, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="marcar_iteracao" id="marcar_iteracao" onclick="marcarIteracoes();"></td>
                                    </tr>
                                    <tr>
                                        <td><label>Tipos de Projeto</label></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="ler_tipo" id="ler_tipo" <?php if(!empty($_POST['ler_tipo'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['tipoprojeto'], 0, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="cadastrar_tipo" id="cadastrar_tipo" <?php if(!empty($_POST['cadastrar_tipo'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['tipoprojeto'], 1, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="alterar_tipo" id="alterar_tipo" <?php if(!empty($_POST['alterar_tipo'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['tipoprojeto'], 2, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="excluir_tipo" id="excluir_tipo" <?php if(!empty($_POST['excluir_tipo'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['tipoprojeto'], 3, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="marcar_tipo" id="marcar_tipo" onclick="marcarTipos();"></td>
                                    </tr>
                                    <tr>
                                        <td><label>Tarefas</label></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="ler_tarefa" id="ler_tarefa" <?php if(!empty($_POST['ler_tarefa'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['tarefa'], 0, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="cadastrar_tarefa" id="cadastrar_tarefa" <?php if(!empty($_POST['cadastrar_tarefa'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['tarefa'], 1, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="alterar_tarefa" id="alterar_tarefa" <?php if(!empty($_POST['alterar_tarefa'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['tarefa'], 2, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="excluir_tarefa" id="excluir_tarefa" <?php if(!empty($_POST['excluir_tarefa'])) echo 'checked'; else if(empty ($_POST)) if(substr($data_fk['tarefa'], 3, 1) == '1') { echo 'checked=""';} ?> ></td>
                                        <td style="padding-left: 5%;"><input type="checkbox" name="marcar_tarefa" id="marcar_tarefa" onclick="marcarTarefas();"></td>
                                    </tr>

                                    <script>
                                        function marcarUsuarios() {
                                            if(document.getElementById("marcar_usuario").checked == true) {
                                                document.getElementById("ler_usuario").checked = true;
                                                document.getElementById("cadastrar_usuario").checked = true;
                                                document.getElementById("alterar_usuario").checked = true;
                                                document.getElementById("excluir_usuario").checked = true;
                                            } else {
                                                document.getElementById("ler_usuario").checked = false;
                                                document.getElementById("cadastrar_usuario").checked = false;
                                                document.getElementById("alterar_usuario").checked = false;
                                                document.getElementById("excluir_usuario").checked = false;
                                            }
                                        }

                                        function marcarEmpresas() {
                                            if(document.getElementById("marcar_empresa").checked == true) {
                                                document.getElementById("ler_empresa").checked = true;
                                                document.getElementById("cadastrar_empresa").checked = true;
                                                document.getElementById("alterar_empresa").checked = true;
                                                document.getElementById("excluir_empresa").checked = true;
                                            } else {
                                                document.getElementById("ler_empresa").checked = false;
                                                document.getElementById("cadastrar_empresa").checked = false;
                                                document.getElementById("alterar_empresa").checked = false;
                                                document.getElementById("excluir_empresa").checked = false;
                                            }
                                        }

                                        function marcarClientes() {
                                            if(document.getElementById("marcar_cliente").checked == true) {
                                                document.getElementById("ler_cliente").checked = true;
                                                document.getElementById("cadastrar_cliente").checked = true;
                                                document.getElementById("alterar_cliente").checked = true;
                                                document.getElementById("excluir_cliente").checked = true;
                                            } else {
                                                document.getElementById("ler_cliente").checked = false;
                                                document.getElementById("cadastrar_cliente").checked = false;
                                                document.getElementById("alterar_cliente").checked = false;
                                                document.getElementById("excluir_cliente").checked = false;
                                            }
                                        }

                                        function marcarEnderecos() {
                                            if(document.getElementById("marcar_endereco").checked == true) {
                                                document.getElementById("ler_endereco").checked = true;
                                                document.getElementById("cadastrar_endereco").checked = true;
                                                document.getElementById("alterar_endereco").checked = true;
                                                document.getElementById("excluir_endereco").checked = true;
                                            } else {
                                                document.getElementById("ler_endereco").checked = false;
                                                document.getElementById("cadastrar_endereco").checked = false;
                                                document.getElementById("alterar_endereco").checked = false;
                                                document.getElementById("excluir_endereco").checked = false;
                                            }
                                        }

                                        function marcarProjetos() {
                                            if(document.getElementById("marcar_projeto").checked == true) {
                                                document.getElementById("ler_projeto").checked = true;
                                                document.getElementById("cadastrar_projeto").checked = true;
                                                document.getElementById("alterar_projeto").checked = true;
                                                document.getElementById("excluir_projeto").checked = true;
                                            } else {
                                                document.getElementById("ler_projeto").checked = false;
                                                document.getElementById("cadastrar_projeto").checked = false;
                                                document.getElementById("alterar_projeto").checked = false;
                                                document.getElementById("excluir_projeto").checked = false;
                                            }
                                        }

                                        function marcarIteracoes() {
                                            if(document.getElementById("marcar_iteracao").checked == true) {
                                                document.getElementById("ler_iteracao").checked = true;
                                                document.getElementById("cadastrar_iteracao").checked = true;
                                                document.getElementById("alterar_iteracao").checked = true;
                                                document.getElementById("excluir_iteracao").checked = true;
                                            } else {
                                                document.getElementById("ler_iteracao").checked = false;
                                                document.getElementById("cadastrar_iteracao").checked = false;
                                                document.getElementById("alterar_iteracao").checked = false;
                                                document.getElementById("excluir_iteracao").checked = false;
                                            }
                                        }

                                        function marcarTipos() {
                                            if(document.getElementById("marcar_tipo").checked == true) {
                                                document.getElementById("ler_tipo").checked = true;
                                                document.getElementById("cadastrar_tipo").checked = true;
                                                document.getElementById("alterar_tipo").checked = true;
                                                document.getElementById("excluir_tipo").checked = true;
                                            } else {
                                                document.getElementById("ler_tipo").checked = false;
                                                document.getElementById("cadastrar_tipo").checked = false;
                                                document.getElementById("alterar_tipo").checked = false;
                                                document.getElementById("excluir_tipo").checked = false;
                                            }
                                        }

                                        function marcarTarefas() {
                                            if(document.getElementById("marcar_tarefa").checked == true) {
                                                document.getElementById("ler_tarefa").checked = true;
                                                document.getElementById("cadastrar_tarefa").checked = true;
                                                document.getElementById("alterar_tarefa").checked = true;
                                                document.getElementById("excluir_tarefa").checked = true;
                                            } else {
                                                document.getElementById("ler_tarefa").checked = false;
                                                document.getElementById("cadastrar_tarefa").checked = false;
                                                document.getElementById("alterar_tarefa").checked = false;
                                                document.getElementById("excluir_tarefa").checked = false;
                                            }
                                        }
                                    </script>
                                </table>
                            </fieldset>
                        </div>
                        
                        <div class="form-actions">
                            <br/>

                            <button type="submit" class="btn btn-success">Atualizar</button>
                            <a href="../Home/home.php" type="btn" class="btn btn-default">Menu Principal</a>
                            <a href="list_usuario.php" type="btn" class="btn btn-default">Voltar</a>
                        </div>
                        
                    </form>
                    </div>
                </div>
            </div>
        </div>
        
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
                            window.location.href = "list_usuario.php";
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
                            
                            if (strpos($try, 'Duplicate')) {

                            if (strpos($try, "'usuario'"))
                                echo 'Já existe um usuário cadastrado com esse nome, e não pode ser cadastrado em duplicidade. Em caso de dúvidas, entre em contato com o suporte.';

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
                            O usuário foi atualizado com sucesso!
                    </div>
                    <div style="text-align: center;"><img src="../../util/update.png" height="175px" width="175px" /></div>
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
