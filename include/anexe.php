<?php

function movies_storing(){
	if (file_exists("movies.csv")){
		$collection = conecxion()->createCollection('movies');
		$r = fopen("movies.csv", 'r');
		$op = 0;
		while (($tab = fgetcsv($r, 0, ",", '"')) !== false){
			$tab[16] = rand(0, 5);
			$tab[17] = array();
			if ($op != 0){
				$collection->insert($tab);
			}
			$op++;
		}
		$op = $op - 1;
		echo "{$op} films chargés en memoire !\n";
		fclose($r);
	}
	else{
		echo "movies.csv introuvale \n";
	}

}

function rent_movie($login, $imb){
	$ok = 0;
	$collection = conecxion()->createCollection('students');
	$tab["login"] = $login;
	$curs = $collection->find($tab);
	foreach ($curs as $doc) {
		if (isset($doc['login']))
			$ok += 1;
		else
			return(0);
	}
	$collectiond = conecxion()->createCollection('movies');
	$abt[1] = $imb;
	$cursd = $collectiond->find($abt);
	foreach ($cursd as $docd) {
		if (isset($docd[5])){
			$ok += 2;
			if ($docd[16] != 0)
				$ok += 3;
			else
				return (2);
		}
		else
			return (1);
	}
	return ($ok);
}

function other_rent_movie($login, $imb){
	if (rent_movie($login, $imb) == 6){
		other_rent_movied($login, $imb);

	}
	elseif (rent_movie($login, $imb) == 0)
		echo "Login introuvable\n";
	elseif (rent_movie($login, $imb) == 1)
		echo "film introuvable\n";
	else
		echo "Stock-out\n";
}

function is_rent($imb){
	$collectiond = conecxion()->createCollection('movies');
	$abt[1] = $imb;
	$cursd = $collectiond->find($abt);
	foreach ($cursd as $docd){
		return ($docd[17]);
	}
}