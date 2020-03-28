<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../util/links/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>PMA - Project Management Aplication</title>
        <link rel="icon" href="../../util/icon.png" type="image/icon type">
        <link href="../../util/styles.css" rel="stylesheet" type="text/css" />
        
        
        <script src="../../util/links/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="../../util/links/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="../../util/links/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="../../util/links/c0930358e4.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="jumbotron row">
                <div>
                    <h2>Menu Princial</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span>
                </div>
                
                <?php 
                session_start();

                if (isset($_SESSION['usuario_id'])) {
                    include_once '../../controller/UsuarioControle.php';
                    include_once '../../controller/PermissaoControle.php';
                    $usuarioControle = new UsuarioControle();
                    $user = $usuarioControle->readUsuario($_SESSION['usuario_id']);
                    $permissaoControle = new PermissaoControle();
                    $permissoes = $permissaoControle->readPermissao($user['permissao_id']);
                    
                    $_SESSION['usuario'] = $user['usuario'];
                    $_SESSION['permissao'] = $permissoes;
                } else {
                    header("Location: ../login/login.php");
                }
                ?>
                
                <div class="header-user">
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-friends" style="color: #ffc73d; font-size: 160%"></i>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#"><i class="fas fa-user"></i> <?php echo 'Usuário: '. $_SESSION['usuario']; ?></a>
                            <a class="dropdown-item" href="../Registro/list_registro.php"><i class="fas fa-clipboard"></i> Log de registros</a>
                            <a class="dropdown-item" href="logout.php"><i class="fas fa-door-open"></i> Sair</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <table class="table table-striped">
                    <tr>
                        <?php 
                        
                        if((substr_compare($permissoes['cliente'], '1', 0,1)) == 0) {
                            echo '<td>';
                                echo '<label class="control-label">Clientes</label>';
                            '</td>';
                        }
                        if((substr_compare($permissoes['projeto'], '1', 0,1)) == 0) {
                            echo '<td>';
                               echo '<label class="control-label">Projetos</label>';
                            echo '</td>';
                        }
                        if((substr_compare($permissoes['usuario'], '1', 0,1)) == 0) {
                            echo '<td>';
                                echo '<label class="control-label">Usuários</label>';
                            echo '</td>';
                        }
                        if((substr_compare($permissoes['tipoprojeto'], '1', 0,1)) == 0) {
                            echo '<td>';
                                echo '<label class="control-label">Modelos de Projeto</label>';
                            echo '</td>';
                        }
                        if((substr_compare($permissoes['empresa'], '1', 0,1)) == 0) {
                            echo '<td>';
                                echo '<label class="control-label">Empresas</label>';
                            echo '</td>';
                        }
                    echo '</tr>';
                    echo '<tr>';
                        if((substr_compare($permissoes['cliente'], '1', 0,1)) == 0) {
                            echo '<td>';
                                echo '<a href="../Cliente/list_cliente.php">Listar Clientes</a>';
                            echo '</td>';
                        }
                        if((substr_compare($permissoes['projeto'], '1', 0,1)) == 0) {
                            echo '<td>';
                                echo '<a href="../Projeto/list_projeto.php">Listar Projetos</a>';
                            echo '</td>';
                        }
                        if((substr_compare($permissoes['usuario'], '1', 0,1)) == 0) {
                            echo '<td>';
                                echo '<a href="../Usuario/list_usuario.php">Listar Usuários</a>';
                            echo '</td>';
                        }
                        if((substr_compare($permissoes['tipoprojeto'], '1', 0,1)) == 0) {
                            echo '<td>';
                                echo '<a href="../TipoProjeto/list_tipoProjeto.php">Listar Modelos</a>';
                            echo '</td>';
                        }
                        if((substr_compare($permissoes['empresa'], '1', 0,1)) == 0) {
                            echo '<td>';
                                echo '<a href="../Empresa/list_empresa.php">Listar Empresas</a>';
                            echo '</td>';
                        }
                    echo '</tr>';
                    echo '<tr>';
                        if((substr_compare($permissoes['cliente'], '1', 0,1)) == 0) {
                            echo '<td>';
                            if((substr_compare($permissoes['cliente'], '11', 0,2)) == 0) {
                                echo '<a href="../Cliente/create_cliente.php">Cadastrar Cliente</a>';
                            }
                        echo '</td>';
                        }
                        if((substr_compare($permissoes['projeto'], '1', 0,1)) == 0) {
                            echo '<td>';
                            if((substr_compare($permissoes['projeto'], '11', 0,2)) == 0) {
                                echo '<a href="../Projeto/create_projeto.php">Cadastrar Projeto</a>';
                            }
                            echo '</td>';
                        }
                        if((substr_compare($permissoes['usuario'], '1', 0,1)) == 0) {
                            echo '<td>';
                                if((substr_compare($permissoes['usuario'], '11', 0,2)) == 0) {
                                    echo '<a href="../Usuario/create_usuario.php">Cadastrar Usuário</a>';
                                }
                            echo '</td>';
                        }
                        if((substr_compare($permissoes['tipoprojeto'], '1', 0,1)) == 0) {
                            echo '<td>';
                            if((substr_compare($permissoes['tipoprojeto'], '11', 0,2)) == 0) {
                                echo '<a href="../TipoProjeto/create_tipoProjeto.php">Cadastrar Modelo</a>';
                            }
                            echo '</td>';
                        }
                        if((substr_compare($permissoes['empresa'], '1', 0,1)) == 0) {
                            echo '<td>';
                            if((substr_compare($permissoes['empresa'], '11', 0,2)) == 0) {
                                echo '<a href="../Empresa/create_empresa.php">Cadastrar Empresa</a>';
                            }
                            echo '</td>';
                        }
                    echo '</tr>';
                    echo '<tr>';
                        if((substr_compare($permissoes['cliente'], '1', 0,1)) == 0) {
                            echo '<td>';
                                echo '<a href="../Cliente/read_cliente.php">Pesquisar por Clientes</a>';
                            echo '</td>';
                        }
                        if((substr_compare($permissoes['projeto'], '1', 0,1)) == 0) {
                            echo '<td>';
                                echo '<a href="../Tarefa/list_tarefa.php">Minhas Tarefas</a>';
                            echo '</td>';
                        }
                        if((substr_compare($permissoes['usuario'], '1', 0,1)) == 0) {
                            echo '<td>';
                                echo '<a></a>';
                            echo '</td>';
                        }
                        if((substr_compare($permissoes['tipoprojeto'], '1', 0,1)) == 0) {
                            echo '<td>';
                                echo '<a></a>';
                            echo '</td>';
                        }
                        if((substr_compare($permissoes['empresa'], '1', 0,1)) == 0) {
                            echo '<td>';
                                echo '<a></a>';
                            echo '</td>';
                        }
                        ?>
                    </tr>
                    
                </table>
        </div>
        
    </body>
</html>
