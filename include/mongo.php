<?php

require("return.php");
require("function.php");
require("anexe.php");

function conecxion()
{
	$conect = new MongoClient();
	$db = $conect->db_etna;
	return ($db);
}

function add_in_col_students($tab) {
	$collection = conecxion()->createCollection('students');
	$collection->insert($tab);

}

function rm_in_col_students($login) {
	$collection = conecxion()->createCollection('students');
	$tab["login"] = $login;
	$collection->remove($tab);
}

function show_one_students($login) {
	$collection = conecxion()->createCollection('students');
	$tab["login"] = $login;
	$curs = $collection->find($tab);
	foreach ($curs as $doc) {
		echo "login	  : {$doc['login']}\nnom	  : {$doc['name']}\n";
		echo "age       : {$doc['age']}\nemail	  : {$doc['email']}\n";
		echo "phone 	  : {$doc['phone']}\n";
	}
}

function show_all_students() {
	$etoile = 0;
	$collection = conecxion()->createCollection('students');
	$curs = $collection->find();
	echo "\nLogin :		  name  /  age  /   email  /   phone \n\n";
	foreach ($curs as $doc) {
		$etoile++;
		echo "{$doc['login']} :	";
		echo "  {$doc['name']} / {$doc['age']} / {$doc['email']}";
		echo " / {$doc['phone']}\n\n";
	}
	echo "*{$etoile}*\n";
}