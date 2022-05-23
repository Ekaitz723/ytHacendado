<?php
    // $responseLambda <- dict
    $lambda_func = "listarVideos";
    $payload='{"username":"'.$_POST['username'].'","tags":"'.$_POST['tags'].'"}';

    include 'consulta_lambda.php';
?>