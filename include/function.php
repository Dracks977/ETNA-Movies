<?php

function new_rent($imb){
	$collectiond = conecxion()->createCollection('movies');
	$abt[1] = $imb;
	$cursd = $collectiond->find($abt);
	foreach ($cursd as $docd){
		return ($docd[16] - 1);
	}
}

function is_rent_student($login){
	$collectiond = conecxion()->createCollection('students');
	$abt['login'] = $login;
	$cursd = $collectiond->find($abt);
	foreach ($cursd as $docd){
		return ($docd['renting_students']);
	}
}

function other_rent_movied($login, $imb){
	$add_film = conecxion()->createCollection('movies');
	$tab[1] = $imb;
	$student = is_rent($imb);
	$new = array_push($student, $login);
	$new_name = array('$set' => array(17 => $student));
	$add_film->findAndModify($tab, $new_name);
	$new_rent = array('$set' => array(16 => new_rent($imb)));
	$add_film->findAndModify($tab, $new_rent);
	$add_user = conecxion()->createCollection('students');
	$abt['login'] = $login;
	$movie = is_rent_student($login);
	$new = array_push($movie, $imb);
	$new_n = array('$set' => array('renting_students' => $movie));
	$add_user->findAndModify($abt, $new_n);
	echo "Rented\n";
}

function show_rented_movies($inutile){
	$nbmv = 0;
	$collection = conecxion()->createCollection('movies');
	$curs = $collection->find();
	$curs->sort(array(5 => 1));
	foreach ($curs as $doc) {
		$truc = 0;
		if (isset($doc[5]) AND !empty($doc[17])){
			while (isset($doc[17][$truc])) {
				$truc++;
			}
			$nom = rtrim($doc[5]);
			echo "{$doc[1]}  -->  {$nom} 	x{$truc}\n";
			$nbmv= $nbmv + $truc;
		}
	}
	echo "*{$nbmv}*\n";
}

function return_movie($login, $imb){
	$ok = 0;
	$collection = conecxion()->createCollection('students');
	$tab["login"] = $login;
	$curs = $collection->find($tab);
	foreach ($curs as $doc){
		if (isset($doc['login']))
			$ok += 1;
		else
			return (0);
	}
	$collectiond = conecxion()->createCollection('movies');
	$abt[1] = $imb;
	$cursd = $collectiond->find($abt);
	foreach ($cursd as $docd) {
		if (isset($docd[5])){
			$ok += 2;
			for ($i = 0; isset($docd[17][$i]); $i++){
				if ($docd[17][$i] == $login)
				$ok += 3; 
			else
				return (2);
			}
		}
		else
			return (1);
	}
	return ($ok);
}