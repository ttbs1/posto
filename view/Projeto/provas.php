<?php

session_start(); 
if((substr_compare($_SESSION['permissao']['projeto'], '0', 0, 1)) == 0) {
    header("Location: ../Erro/permissao.php");
}

include_once '../../controller/ProjetoControle.php';
include_once '../../controller/ClienteControle.php';
include_once '../../controller/TarefaControle.php';
include_once '../../controller/IteracaoControle.php';
include_once '../../controller/UsuarioControle.php';

if(!empty($_GET['id']))
{
    $id = $_REQUEST['id'];
    
    $tarefaControle = new TarefaControle();
    $data = $tarefaControle->readTarefa($id);
}

?>

<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- Material Design Bootstrap -->
        <link rel="stylesheet" href="img/mdb.min.css">
        

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../util/links/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>PMA - Detalhar Projeto</title>
        <link rel="icon" href="../../util/icon.png" type="image/icon type">
        <link href="../../util/projectTable.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../../util/styles.css">
        <link rel="stylesheet" href="../../util/kanban.css">
        
        <script src="../../util/links/jquery-1.7.2.min.js"></script>
        <script src="../../util/jquery-ui.min.js"></script>
        <script src="../../util/jquery.ui.touch-punch.min.js"></script>
        <script>var $j2 = jQuery.noConflict(true);</script>
        
        <script src="../../util/links/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="../../util/links/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="../../util/links/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../../util/links/jquery-ui.js"></script>
        <script src="../../util/links/c0930358e4.js" crossorigin="anonymous"></script>
        <script src="../../util/kanban.js"></script>
        
        
        
        
    </head>
    <body>
        <div class="container">
            <div class="jumbotron row">
                <div>
                    <h2>Detalhamento do Projeto</h2><h4><span class="badge badge-secondary">PMA - Project Management Aplication</span></h4>
                </div>
                <div class="header-user">
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-friends" style="color: #ffc73d; font-size: 160%"></i>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#"><i class="fas fa-user"></i> 
                                                                    <?php
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
                        <h3 class="well"> Arquivos de imagem </h3>
                    </div>
                    
                    <div style="padding: 2em">
                        
                        <div class="row">
                            <div class="col-md-12">

                                <div id="mdb-lightbox-ui"></div>

                                <div class="mdb-lightbox no-margin">
                                    
                                    <?php
                                    $path = "repository/".$id."/";
                                    $diretorio = dir($path);
                                    
                                    while($arquivo = $diretorio -> read()){
                                        if (!($arquivo == '.' || $arquivo == '..')) {
                                            list($width, $height) = getimagesize($path.$arquivo);
                                            echo '<figure class="col-md-4">
                                                    <a href="'.$path.$arquivo.'" data-size="'.$width.'x'.$height.'">
                                                        <img alt="picture" src="'.$path.$arquivo.'"
                                                          class="img-fluid" style="height: 200px;">
                                                    </a>
                                                </figure>';
                                        }
                                    }
                                    $diretorio -> close();
                                    ?>
                                    
                                </div>

                            </div>
                        </div>
                        
                        <script>
                        $(function () {
                            $("#mdb-lightbox-ui").load("img/mdb-lightbox-ui.html");
                        });
                        </script>
                    </div>
                    
                    <div class="form-actions" style="text-align: right">
                        <button style="color: #CC3333; font-size: large; padding-right: 0px" class="portlet-icon btn btn-link" data-toggle="modal" data-target="#conclusionModal" data-task-id="<?php echo $id ?>" data-task-descricao="<?php echo $data['descricao'] ?>"><i class="fas fa-camera"></i></button>
                        <a href="../Home/home.php" type="btn" class="btn btn-default">Menu Principal</a>
                        <a href="#" type="btn" class="btn btn-default" onclick="goBack();">Voltar</a>
                        <script>
                            function goBack () {
                                window.history.back();
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        <div class="modal fade" id="conclusionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form name="terminar" id="terminar" action="upload.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="hidden" name="task_id" class="form-control id" id="recipient-name">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Tarefa já finalizada. Você pode adicionar mais arquivos, mas isso afetará a data de conclusão da tarefa.</label>
                                        <input type="file" required id="fileToUpload" name="fileToUpload" class="form-control-file btn btn-sm btn-light" id="exampleFormControlFile1" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                            <button type="submit" id="terminarBtn" class="btn btn-primary">Concluir</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <script>
            $('#conclusionModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var desc = button.data('task-descricao'); // Extract info from data-* attributes
                var id = button.data('task-id');
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this);
                modal.find('.modal-title').text('Tarefa ' + desc);
                modal.find('.id').val(id);
            });
            
            $("#terminarBtn").click(function(e){
                var arquivo = document.getElementById('fileToUpload');
                if(arquivo.checkValidity()) {
                    $('#terminar').submit();
                    setTimeout(function (){
                        location.reload(true);
                    }, 500);
                }
            });
            </script>
        
        
        
        <script type="text/javascript" src="img/mdb.min.js"></script>
            
        <p></p>
    </body>
</html>