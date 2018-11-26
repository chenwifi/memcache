
<?php

require('./cfg.php');
require('./interface.php');
require('./moder.php');
require('./con.php');

$diser = new $dis();
foreach($ss as $s=>$v)
$diser->addNode($s);

$mem = new memcache();

$diser->delNode('C');

for($i=1;$i<10000;$i++){
    $key = 'key_' . $i;
    $num = $diser->lookup($key);
    $mem->connect($ss[$num]['host'],$ss[$num]['port']);

    if(!$mem->get($key)){
	$mem->add($key,'val_'.$i);
    }
    $mem->close();
}
echo 'ok';
