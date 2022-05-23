<!-- <!DOCTYPE html>
<html>
        <head>
                <style>
                </style>
        </head>
<body>
</body> 
</html> -->

<?php
        session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
        <title>Borrar</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
        <?php
                if(isset($_POST['id_video'])){
                        include 'lambda_gw/borrar_lambda_gw.php';
                        
                        if($responseLambda['existe']=='true'){
                                echo "Video borrado | ".$_POST['id_video'];
                        }
                        else{
                                echo "Video no encontrado";
                        }
                }
        ?>
        <div class="container">
        <div class="justify-content-center align-items-center">
                <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                                <label class="control-label col-sm-6" for="NombreUsuario">ID video a ocultar</label>
                                <div class="col-sm-10">
                                        <input type="text" class="form-control" id="id_video" aria-describedby="id_video" placeholder="" name="id_video">
                                </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Borrar</button>
                </form>
        </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        </body>
</html>