<?php
    // $responseLambda <- dict
    $lambda_func = "borrarVideo";
    $payload='{"id_video":"'.$_POST['id_video'].'"}';

    include 'consulta_lambda.php';
?>