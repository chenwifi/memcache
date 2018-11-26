<?php

$mem = new Memcache;
$mem->connect('localhost',11211);

$news = $mem->get('new');
//$news = false;
if(!$news){

	$pdo = new PDO('mysql:dbname=test;host=localhost','root',123456);

	$sql = 'select * from news';

	$stm = $pdo->query($sql);

	$news = $stm->fetchAll(PDO::FETCH_ASSOC);

	$mem->add('new',$news,false,8);
	
	echo 'from mysql';
}else{
	echo 'from cache';
}

print_r($news);
