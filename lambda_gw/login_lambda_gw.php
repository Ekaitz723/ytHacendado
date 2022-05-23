<?php
    // $responseLambda <- dict
    $lambda_func = "login";
    $payload='{"username":"'.$_POST['name'].'","contrasenia":"'.$_POST['password'].'"}';

    include 'consulta_lambda.php';
?>