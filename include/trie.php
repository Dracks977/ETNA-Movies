<?php

function other_show_movies($lop, $pol){
	if ($lop == "genre" || $lop == "year" || $lop == "rate"){
		$func = "trie_" . $lop;
		$func($pol);
	}
	else{
		echo "etna_movies : u can only choose genre / year / rate.\n";
	}

}

function trie_genre($donnee) {
	$donnee = strtolower($donnee);
	$nbmv = 0;
	$collection = conecxion()->createCollection('movies');
	$regex = new MongoRegex("/{$donnee}/i");
	$curs = $collection->find(array(12 => $regex));
	foreach ($curs as $doc) {
		if (isset($doc[5])){
			$nbmv++;
			$nom = rtrim($doc[5]);
			echo "[{$doc[16]}] {$doc[1]}  -->  {$nom}  -  ({$doc[14]}) \n";
		}
	}
		echo "*{$nbmv}*\n";
}
function trie_year($donnee) {
	$nbmv = 0;
	$collection = conecxion()->createCollection('movies');
	$curs = $collection->find(array(11 => $donnee));
	foreach ($curs as $doc) {
		if (isset($doc[5])){
			$nom = rtrim($doc[5]);
			$nbmv++;
			echo "[{$doc[16]}] {$doc[1]}  -->  {$nom}  -  ({$doc[14]}) \n";
		}
	}
		echo "*{$nbmv}*\n";
}
function trie_rate($donnee) {
	$nbmv = 0;
	$collection = conecxion()->createCollection('movies');
	$curs = $collection->find();
	foreach ($curs as $doc) {
		if (isset($doc[5]) && ($doc[9] >= $donnee && $doc[9] < $donnee + 1)){
			$nbmv++;
			$nom = rtrim($doc[5]);
			echo "[{$doc[16]}] {$doc[1]}  -->  {$nom}  -  ({$doc[14]}) \n";
		}
	}
		echo "*{$nbmv}*\n";
}