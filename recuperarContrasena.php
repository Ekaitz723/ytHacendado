<?php
        session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
        <title>Recuperar Cuenta</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
                body {
                        background-color:black;
                        color:whitesmoke;
                }
                h1 {
                        text-align: center;
                }
        </style>
</head>
<body>
        <?php
                if(isset($_POST['name']) && isset($_POST['password']) && isset($_POST['frase_recu'])){
                        include 'lambda_gw/recu_lambda_gw.php';

                        
                        if($responseLambda['cambia']=='true'){
                                unset($_POST);
                                $_SESSION['info'] = $responseLambda['info'];
                                header("Location:pagPersonal.php");
                                exit();
                        }
                        else{
                                $errorMsg = "No se pudo";
                                echo "<p>No se pudo</p>";
                        }
                }
                unset($_POST);
        ?>
        
        <!-- <form action="" method="post">
                Nombre Usuario: <input type="text" name="name"><br>
                Contraseña: <input type="text" name="password"><br>
                <input type="submit"></input>
        </form> -->
        <h1>Recuperacion de Cuenta</h1>
        <div class="container">
        <div class="justify-content-center align-items-center">
                <h2>Introduce datos</h2>
                <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                                <label class="control-label col-sm-6" for="exampleInputEmail1">Nombre de Usuario</label>
                                <div class="col-sm-10">
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Usuario" name="name">
                                </div>
                                <!-- <small id="emailHelp" class="form-text text-danger"><?php //echo $errorMsg ?></small> -->
                        </div>
                        <div class="form-group">
                                <label class="control-label col-sm-6" for="exampleInputFrase">Frase de Recuperacion</label>
                                <div class="col-sm-10">
                                        <input type="password" class="form-control" id="exampleInputFrase" placeholder="Frase de Recuperacion" name="frase_recu">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-sm-6" for="exampleInputPassword1">Nueva Contraseña</label>
                                <div class="col-sm-10">
                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña" name="password">
                                </div>
                        </div>
                        <div class="form-check">
                                <input class="control-label col-sm-6" type="checkbox" class="form-check-input" id="exampleCheck1">
                                <div class="col-sm-10">
                                        <label class="form-check-label" for="exampleCheck1">Recuerdarme</label>
                                </div>
                                <!-- TODO las galletas -->
                        </div>
                        <button type="submit" class="btn btn-primary">Entrar</button>
                </form>
                <form action="login.php">
                        <button type="submit" class="btn btn-secondary">Iniciar sesion</button>
                </form>
                <form action="crearCuenta.php">
                        <button type="submit" class="btn btn-secondary">Crear cuenta</button>
                </form>
        </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        </body>
</html>