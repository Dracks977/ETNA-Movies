<?php

function Read_n(){
	while (1){
		$line = rtrim(fgets(fopen("php://stdin", "r")), "\n");
		if (preg_match ("/^([a-zA-Z ]+)$/", $line)){
			return($line);
		}
		else{
			echo "u need to type a string [a-z A-Z]\n> ";
		}	
	}
}

function Read_a(){
	while (1){
		$line = rtrim(fgets(fopen("php://stdin", "r")), "\n");
		if (preg_match ("/^(0?[1-9]|[1-9][0-9]|[1][1-9][1-9]|200)$/", $line)){
			return($line);
		}
		else{
			echo "u need to type a number [0,99]\n> ";		
		}
	}
}

function Read_e(){
	while (1){
		$line = rtrim(fgets(fopen("php://stdin", "r")), "\n");
		if (preg_match ("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/",
		 $line)){
			return($line);
		}
		else{
			echo "u need to type a valide mail adresse\n> ";
		}	
	}	
}

function Read_p(){
	while (1){
		$line = rtrim(fgets(fopen("php://stdin", "r")), "\n");
		if (preg_match ("/^(0)([0-9]{9})$/", $line)){
			return($line);
		}
		else{
			echo "u need to type a valide french's phone [0xxxxxxxxx]\n> ";
		}
	}	
} 

function yon(){
	while (1){
		$line = rtrim(fgets(fopen("php://stdin", "r")), "\n");
		if ($line == "oui" || $line == "yes"){
			return(1);
			}
		elseif ($line == "non" || $line == "no"){
			return(0);
		}
		else{
			echo "yes or no ?\n> ";
		}
	}	
} 

