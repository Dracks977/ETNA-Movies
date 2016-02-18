<?php

require("include/func.php");
if (isset($argv[1]) AND $argv[1] == "show_rented_movies"){
	     		$argv[2] = 666;
	     		$argv[1]($argv[2]);
}
elseif (isset($argv[1]) AND ($argv[1] == "return_movie" OR 
	$argv[1] == "rent_movie")){
	if (isset($argv[2]) AND isset($argv[3])){
		$func = "other_" . $argv[1];
		     		$func($argv[2], $argv[3]);
	}
	else{
		echo "{$argv[1]} need some argument like login and imdb code..." . 
		" ur a noob !\n";
		return 0;
	}
}
else{

if (isset($argv[1]) && function_exists($argv[1])){
		if (isset($argv[2]) && preg_match("/^([a-zA-Z]{0,})_([a-zA-Z0-9]){1}$/",
		 $argv[2]) && $argv[1] != "rent_movie" && $argv[1] != "return_movie"){
	    		$argv[1]($argv[2]);
	    		return;
	        }
	     elseif(isset($argv[2]) && ($argv[1] == "show_movies" ||
	      $argv[1] == "rent_movie" || $argv[1] == "return_movie")){
		     	if (isset($argv[3])){
		     		$func = "other_" . $argv[1];
		     		$func($argv[2], $argv[3]);
		     	}
		     	elseif($argv[2] === "desc"){
		     		$argv[1]($argv[2]);
		     	}
		     	else{
		     		echo "\netna_movies : php etna_movies show_movies " . 
		     		"  {$argv[2]} [year or rate or genre] \n\n";
		     	}
	     }
	     elseif($argv[1] == "show_student" || $argv[1] == "movies_storing" || 
	     	$argv[1] == "show_movies" || $argv[1] = "show_rented_movies"){
	     		$argv[2] = 666;
	     		$argv[1]($argv[2]);
	        }
		else{
			echo "\netna_movies : php etna_movies " . $argv[1] . 
			" [login (lequer_r)]\n\n";
		}
}
else{
	echo "\netna_movies : php etna_movies  [add_student / del_student /" .
	" update_student / show_student / show_movies / movies_storing] / " . 
	"show_rented_movies / return_movie / rent_movie" .
	 " [login (lequer_r)]\n\n";
}
}