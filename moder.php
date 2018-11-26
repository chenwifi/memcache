<?php


class moder implements hasher,distribution{

    protected $_ser = array();
    protected $num = 0;    

    public function _hash($key){
   	return sprintf('%u',crc32($key));
    }

    public function lookup($key){
	$index = $this->_hash($key)%$this->num;
	return $this->_ser[$index];
    }

    public function addNode($s){
	$this->_ser[] = $s;
	$this->num += 1;
    }

    public function delNode($s){
	foreach($this->_ser as $k=>$v){
	    if($v == $s){
		unset($this->_ser[$k]);
		$this->num -= 1;
	    }
	}
	
	$this->_ser = array_merge($this->_ser);
    }
}
/*
$mod = new moder;
$mod->addNode('a');
$mod->addNode('b');
$mod->addNode('c');
$mod->addNode('d');

for($i=1;$i<=100;$i++){
	$key = 'key_' . $i;
	echo $mod->lookup($key) . "\n";
    }*/
