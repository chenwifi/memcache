<?php

require('./cfg.php');
require('./interface.php');
require('./moder.php');
require('./con.php');

$diser = new $dis();
foreach($ss as $s=>$v)
$diser->addNode($s);

$mem = new memcache();

for($i=1;$i<10000;$i++){
    $key = 'key_' . $i;
    $val = 'val_' . $i;

    $num = $diser->lookup($key);
    $mem->connect($ss[$num]['host'],$ss[$num]['port']);
    $mem->add($key,$val);
    $mem->close();
}

echo 'ok';
/*
<?php

class con implements hasher,distribution{
    protected $nodes = [];
    protected $points = [];
    protected $_mul = 64;

    public function _hash($str){
	return sprintf('%u',crc32($str));
    }

    public function lookup($key){
	$position = $this->_hash($key);
	foreach($this->points as $p=>$v){
	    if($p>=$position)
		return $this->points[$p];
	}
	return reset($this->points);
    }

    public function addNode($node){
	$this->nodes[$node] = [];
	for($i=0;$i<$this->_mul;$i++){
	    $point = $node . '_' . $i;
	    $point = $this->_hash($point);
	    $this->points[$point] = $node;
	    $this->nodes[$node][] = $point;
	}
	$this->resort();
    }

    public function delNode($node){
	foreach($this->nodes[$node] as $p){
	    unset($this->points[$p]);
	}
	    unset($this->nodes[$node]);
    }

    protected function resort(){
	ksort($this->points);
    }
}
*/
/*
$ccc = new con;
$ccc->addNode('A');
$ccc->addNode('B');
print_r($ccc);
echo $ccc->_hash('name') . '---' . $ccc->lookup('name');*/
