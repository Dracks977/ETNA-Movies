<?php

require("read.php");
require("mongo.php");
require("update.php");
require("trie.php");

function add_student($login){
	$tab = array();
	$tab["login"] = $login;
	echo "Name ?\n> ";	
	$tab["name"] = Read_n();
	echo "Age ?\n> ";	
	$tab["age"] = Read_a();
	echo "Email ?\n> ";	
	$tab["email"] = Read_e();
	echo "Phone number ?\n> ";	
	$tab["phone"] = Read_p();
	$tab['renting_students'] = array();
	add_in_col_students($tab);
	echo "User registered !\n";
	return;	
}

function del_student($login){
	echo "Are you sure ?\n> ";
	if (yon() == 1){ //yes
		rm_in_col_students($login);
		echo "User deleted !\n";
	}
	else { // no
		echo "ok , it cancels ... sad\n";
	}

}

function update_student($login){
	echo "What do you want to update?\n> ";
	$cont = Read_n();
	$func = 'update_' . $cont;
	if (function_exists($func)){
		$func($login);
		echo "User informations modified !\n";
	}
	else{
		echo "{$cont} not exist\n";
		return;
	}
}

function show_student($login)
{
	if ($login != 666)
		show_one_students($login);
	else
		show_all_students();
}

function show_movies($lop){
	$nbmv = 0;
	if ($lop == 666){
		$collection = conecxion()->createCollection('movies');
		$curs = $collection->find();
		$curs->sort(array(5 => 1));
		foreach ($curs as $doc) {
			if (isset($doc[5])){
				$nom = rtrim($doc[5]);
				echo "[{$doc[16]}] {$doc[1]}  -->  {$nom}  -  ({$doc[14]}) \n";
				$nbmv++;
			}
		}
	}
	else{
		$collection = conecxion()->createCollection('movies');
		$curs = $collection->find();
		$curs->sort(array(5 => -1));
		foreach ($curs as $doc) {
			if (isset($doc[5])){
				$nom = rtrim($doc[5]);
				$nbmv++;
				echo "[{$doc[16]}] {$doc[1]}  -->  {$nom}  -  ({$doc[14]}) \n";
			}
		}
	}
	echo "*{$nbmv}*\n";
}
