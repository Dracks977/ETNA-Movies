<?php

function update_name($login) {
	echo "New name ?\n> ";
	$name = Read_n();
	$collection = conecxion()->createCollection('students');
	$tab["login"] = $login;
	$new_name = array('$set' => array('name' => "{$name}"));
	$collection->findAndModify($tab, $new_name);
}


function update_age($login) {
	echo "New age ?\n> ";
	$age = Read_a();
	$collection = conecxion()->createCollection('students');
	$tab["login"] = $login;
	$new_age = array('$set' => array('age' => "{$age}"));
	$collection->findAndModify($tab, $new_age);
}

function update_email($login) {
	echo "New email ?\n> ";
	$email = Read_e();
	$collection = conecxion()->createCollection('students');
	$tab["login"] = $login;
	$new_email = array('$set' => array('email' => "{$email}"));
	$collection->findAndModify($tab, $new_email);
}

function update_phone($login) {
	echo "New phone ?\n> ";
	$phone = Read_p();
	$collection = conecxion()->createCollection('students');
	$tab["login"] = $login;
	$new_phone = array('$set' => array('phone' => "{$phone}"));
	$collection->findAndModify($tab, $new_phone);
}