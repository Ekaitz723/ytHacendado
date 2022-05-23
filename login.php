<?php
        session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
        <title>LogIn</title>
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
                //$_SESSION['form'] = 
                if(isset($_POST['name']) && isset($_POST['password'])){
                        //Comprobar datos aunque todo correcto(?)
                        /*$aws_access_key_id = "ASIAV74BRDM67CU2UOQG";
                        $aws_secret_access_key = "/pKp6XD/YdTPn6OdcFBi++uhBgDbBo7dmxjzJ++Y";
                        $aws_session_token = "FwoGZXIvYXdzEMD//////////wEaDGPumdxUh7DU+6JjvyK+AQrG3QJ/2siQmqDMIxyy9d4Qr4T+nsjw5y6vubGHEC1xXskkG7OoasW1VWYGL0+7EK451mq4KgnMjEIUHUwQ9Nx4iWa5HfHZtVuRdiv9Dt76uxsLTRM+R0HzzOMDu4Dbcn7xwyDW3m3F45mETXhrebEWUzTTAL7AGsc41IGIa/4VR4Bs1X3J4eUhmZTiWOjdvIXQ75Kjrtf2v0XvrQIL+0wbrqRCoqfdTbDSFoq9rF8BgXgYNtfWV/XsPPdqZrQo3vzPjwYyLZhRUe9pta95E8y2ARAOQcTzMHF2SwpZsskMhy12lm+XdP9oSAnXyBslqUUbTA==";
                        
                        //include 'lambda_gw/aws_keys.php';
                        
                        $user = $_POST['name'];
                        $password = $_POST['password'];
                        //$user = "inakiuser";
                        //$password = "aaaaaa";
                        $lambda_func = "prueba1";
                        $payload='{"username":"'.$user.'","contrasenia":"'.$password.'"}';
                        $cmd = 'AWS_ACCESS_KEY_ID='. $aws_access_key_id . ' AWS_SECRET_ACCESS_KEY='. $aws_secret_access_key . ' AWS_SESSION_TOKEN='. $aws_session_token . 
                                ' aws lambda invoke --function-name '.$lambda_func.' --cli-binary-format raw-in-base64-out --payload \''.$payload.'\' '. 
                                ' /dev/stdout | while read line; do echo "${line}";break; done | sed \'s/.$//\'';
                        //exec( $cmd,$result,$result2);
                        //$responseLambda=json_decode($result[0],true);*/
                        include 'lambda_gw/login_lambda_gw.php';

                        //echo json_encode($json);
                        echo $result[0].":datos";
                        echo $responseLambda;
                        echo "pepe:".$cmd;
                        
                        if($responseLambda['existe']=='true'){
                                if($responseLambda['bloqueado']=='false'){
                                        if($responseLambda['contrasenia']=='true'){
                                                $errorMsg = "Correcto ";
                                                echo "<p>Esta bloqueado</p>";
                                                $_SESSION['info'] = $responseLambda['info'];
                                                header("Location:pagPersonal.php");
                                                exit();
                                        }
                                        else {
                                                $errorMsg = "Contrasena incorrecta intentos ".$responseLambda['intentos'];
                                                echo "<p>Contrasena incorrecta intentos ".$responseLambda['intentos']."</p>";
                                        }
                                }
                                else {
                                        $errorMsg = "Esta bloqueado";
                                        echo "<p>Esta bloqueado</p>";
                                }

                                /*$errorMsg = "";
                                $_SESSION['info'] = $responseLambda['info'];
                                echo $_SESSION['info']['username'];
                                unset($_POST);
                                //header("Location:pagPersonal.php?usr=".$responseLambda['info']['username']);
                                header("Location:pagPersonal.php");
                                exit();*/
                        }
                        else{
                                $errorMsg = "No existe el usuario";
                                echo "<p>No existe el usuario</p>";
                        }

                        if($responseLambda['existe']=='true'){
                                $errorMsg = "";
                                $_SESSION['info'] = $responseLambda['info'];
                                echo $_SESSION['info']['username'];
                                unset($_POST);
                                //header("Location:pagPersonal.php?usr=".$responseLambda['info']['username']);
                                header("Location:pagPersonal.php");
                                exit();
                        }
                        else{
                                //$errorMsg = "a".$_POST['name']."e";
                                $errorMsg = "Intentalo de nuevo";
                                //echo "<p>Ta mal</p>";
                        }
                }
                unset($_POST);
        ?>
        
        <!-- <form action="" method="post">
                Nombre Usuario: <input type="text" name="name"><br>
                Contraseña: <input type="text" name="password"><br>
                <input type="submit"></input>
        </form> -->
        <h1>Entra en tu cuenta</h1>
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
                                <label class="control-label col-sm-6" for="exampleInputPassword1">Contraseña</label>
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
                <form action="crearCuenta.php">
                        <button type="submit" class="btn btn-secondary">Crear cuenta</button>
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