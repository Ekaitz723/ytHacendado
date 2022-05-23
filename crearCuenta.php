<?php
        session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
        <title>Crear cuenta</title>
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
                //session_start();
                if(     isset($_POST['name']) && 
                        isset($_POST['password']) &&
                        isset($_POST['username']) &&
                        isset($_POST['correo']) &&
                        isset($_POST['frase_recu'])
                ){
                        include 'lambda_gw/singup_lambda_gw.php';
                        //$_SESSION['info'] = $responseLambda['info'];
                        //header("Location:pagPersonal.php");
                        //exit();
                        
                        if($responseLambda['disponible']=='true'){
                                unset($_POST);
                                $errorMsg = "";
                                $_SESSION['info'] = $responseLambda['info'];
                                //header("Location:pagPersonal.php?usr=".$responseLambda['info']['username']);
                                //exit();
                                header("Location:pagPersonal.php");
                                exit();
                                //echo $responseLambda['body'];
                        }
                        else{
                                //$errorMsg = "a".$_POST['name']."e";
                                $errorMsg = "El usuario ya existe";
                                //echo "<p>Ta mal</p>";
                        }

                        /*$_SESSION['info'] = $responseLambda['info'];
                        unset($_POST);
                        //header("Location:pagPersonal.php?usr=".$responseLambda['info']['username']);
                        header("Location:pagPersonal.php");
                        exit();
                        
                        //$responseLambda=json_decode($result[0],true);
                        //echo $responseLambda['info'];
                        //echo "cosa:".$result[0];
                        /*if($responseLambda['existe']=='true'){
                                unset($_POST);
                                $errorMsg = "";
                                $_SESSION['info'] = $responseLambda['info'];
                                //header("Location:pagPersonal.php?usr=".$responseLambda['info']['username']);
                                //exit();
                                echo $responseLambda['body']
                        }
                        else{
                                //$errorMsg = "a".$_POST['name']."e";
                                $errorMsg = "Intentalo de nuevo";
                                //echo "<p>Ta mal</p>";
                        }*/
                }
                /*else {
                        $errorMsg = "";
                }*/
                //unset($_POST);
        ?>
        <h1>Crea tu cuenta</h1>
        <!-- <form action="" method="post">
                Nombre Usuario: <input type="text" name="name"><br>
                Contraseña: <input type="text" name="password"><br>
                <input type="submit"></input>
        </form> -->
        <!--
                $payload='{"name":"'.$_POST['name'].'","username":"'.$_POST['username'].'","contrasenia":"'.$_POST['password'].'","frase_recuperacion":"'.$_POST['frase_recuperacion'].'","correo":"'.$_POST['correo'].'"}';
        -->
        <div class="container">
        <div class="justify-content-center align-items-center">
                <h2>Introduce datos</h2>
                <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                                <label class="control-label col-sm-6" for="NombreUsuario">Nombre de Usuario</label>
                                <div class="col-sm-10">
                                        <input type="text" class="form-control" id="NombreUsuario" aria-describedby="emailHelp" placeholder="Usuario" name="username">
                                        
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-sm-6" for="ContrasenaCuenta">Contraseña</label>
                                <div class="col-sm-10">
                                        <input type="password" class="form-control" id="ContrasenaCuenta" placeholder="Contraseña" name="password">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-sm-6" for="NombreCompleto">Nombre</label>
                                <div class="col-sm-10">
                                        <input type="text" class="form-control" id="NombreCompleto" placeholder="Nombre" name="name">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-sm-6" for="CorreoCuenta">Correo</label>
                                <div class="col-sm-10">
                                        <input type="email" class="form-control" id="CorreoCuenta" placeholder="Correo" name="correo">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-sm-6" for="FraseRecu">Frase de Recuperacion</label>
                                <div class="col-sm-10">
                                        <input type="text" class="form-control" id="FraseRecu" placeholder="Frase de Recuperacion" name="frase_recu">
                                        <small id="infoFrase" class="form-text text-muted">Se usara para recuperar la cuenta si se te olvida la contraseña</small>
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
                <form action="recuperarContrasena.php">
                        <button type="submit" class="btn btn-secondary">Recuperar Contraseña</button>
                </form>
        </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        </body>
</html>