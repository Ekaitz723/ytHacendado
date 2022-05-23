<?php
    // $responseLambda <- dict
    $lambda_func = "recuperarContrasena";
    $payload='{"username":"'.$_POST['name'].'","contrasenia":"'.$_POST['password'].'","frase_recu":"'.$_POST['frase_recu'].'"}';

    include 'consulta_lambda.php';
?>