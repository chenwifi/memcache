<?php

$mem = new Memcache;
$mem->connect('localhost',11211);

for($i=0;$i<10922;$i++){
    $key = 'key_' . $i;
    $val = 'val_' . $i;

    $mem->add($key,$val,false,20);
    $mem->get($key);
    $mem->get($key);
}

echo 'ok';
