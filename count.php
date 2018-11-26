<?php

require('cfg.php');

$get = 0;
$hit = 0;

$mem = new Memcache();
foreach($ss as $k=>$v){
    $mem->connect($v['host'],$v['port']);
    $info = $mem->getStats();
    $get += $info['cmd_get'];
    $hit += $info['get_hits'];
    $mem->close();    
}

echo $hit/$get;

