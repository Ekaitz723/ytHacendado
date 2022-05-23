<?php
    include 'aws_keys.php';
    $cmd = 'AWS_ACCESS_KEY_ID='. $aws_access_key_id . ' AWS_SECRET_ACCESS_KEY='. $aws_secret_access_key . ' AWS_SESSION_TOKEN='. $aws_session_token . 
            ' aws lambda invoke --function-name '.$lambda_func.' --cli-binary-format raw-in-base64-out --payload \''.$payload.'\' '. 
            ' /dev/stdout | while read line; do echo "${line}";break; done | sed \'s/.$//\'';
    exec($cmd,$result,$result2);
    $responseLambda=json_decode($result[0],true);
?>