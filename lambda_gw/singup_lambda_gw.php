<?php
    // $responseLambda <- dict
    //$lambda_func = "crearCuenta";
    $lambda_func = "crearCuenta";
    /*$payload='{"name":"'.$_POST['name'].
            '","username":"'.$_POST['username'].
            '","contrasenia":"'.$_POST['password'].
            '","frase_recuperacion":"'.$_POST['frase_recuperacion'].
            '","correo":"'.$_POST['correo'].'"}';*/
    $payload = '{"name":"'.$_POST['name'].'","username":"'.$_POST['username'].'","frase_recuperacion":"'.$_POST['frase_recu'].'","correo":"'.$_POST['correo'].'","contrasenia":"'.$_POST['password'].'"}';
    //$payload = '{"e":"a"}';
    include 'consulta_lambda.php';
?>