<?php

function other_return_movie($login, $imb){
if (return_movie($login, $imb) >= 6){
		other_return_movied($login, $imb);
	}
	elseif (rent_movie($login, $imb) == 0)
		echo "Login introuvable\n";
	elseif (rent_movie($login, $imb) == 1)
		echo "film introuvable\n";
	else
		echo "Error: {$login} ne loue pas ce film !\n";
}

function is_rent_no_more($imb, $login){
	$newtab = array();
$collectiond = conecxion()->createCollection('movies');
	$abt[1] = $imb;
	$cursd = $collectiond->find($abt);
	foreach ($cursd as $docd){
		for ($i = 0; isset($docd[17][$i]); $i++){
			if ($docd[17][$i] != $login){
				array_push($newtab, $docd[17][$i]);
			}
		}
	}
	return($newtab);
}

function new_rent_no_more($imb){
	$collectiond = conecxion()->createCollection('movies');
	$abt[1] = $imb;
	$cursd = $collectiond->find($abt);
	foreach ($cursd as $docd){
		return ($docd[16] + 1);
	}
}

function is_rent_student_no_more($imb, $login){
	$newtab = array();
	$collectiond = conecxion()->createCollection('students');
	$abt['login'] = $login;
	$cursd = $collectiond->find($abt);
	foreach ($cursd as $docd){
		for ($i = 0; isset($docd['renting_students'][$i]); $i++){
			if ($docd['renting_students'][$i] != $imb){
				array_push($newtab, $docd['renting_students'][$i]);
			}
		}
	}
	return($newtab);
}

function other_return_movied($login, $imb){
	$add_film = conecxion()->createCollection('movies');
	$tab[1] = $imb;
	$student = is_rent_no_more($imb, $login);
	$new_name = array('$set' => array(17 => $student));
	$add_film->findAndModify($tab, $new_name);
	$new_rent = array('$set' => array(16 => new_rent_no_more($imb)));
	$add_film->findAndModify($tab, $new_rent);
	$add_user = conecxion()->createCollection('students');
	$abt['login'] = $login;
	$movie = is_rent_student_no_more($imb, $login);
	$new_n = array('$set' => array('renting_students' => $movie));
	$add_user->findAndModify($abt, $new_n);
	echo "Returned\n";
}