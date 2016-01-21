<?php
/**
 * wechat php test
 */


logLine2($_GET["ua"] );

}


function logLine2($message) 
{
    //为什么/1.txt就错
    //error_log(__LINE__ , 3, '1.txt');
    error_log($message.PHP_EOL, 3, '1.txt');

}
function logLine($message) 
{
    //为什么/1.txt就错
    //error_log(__LINE__ , 3, '1.txt');
    error_log(json_encode($message).PHP_EOL, 3, '1.txt');

}


?>
