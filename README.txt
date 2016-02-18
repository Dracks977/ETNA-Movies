			TIC-SGBD - Etna Movies
by : Labegorre Sebastien & Nathan Van Hemelryck

contien les fichier :

	doc		labego_s 					12	Element 		
	doc			include					8	Element 		
	php				func.php			5	fonction		
	php 			return.php			5	fonction		
	php 			function.php 		5	fonction		
	php 			anexe.php 			4	fonction		
	php				mongo.php			5	fonction		
	php				read.php			5	fonction 		
	php				update.php			4	fonction		
	php				trie.php			4	fonction		
	php			database.php 			4	fonction		
	php			etna_movies.php			-   --------		
	txt			README.txt				-	--------		


Étape 1	---  ---  ---  ---  ---

	Commande "add_student" :								OK
	Commande "del_student" :								OK
	Commande "update_student" :								OK
	Commande "show_student" :								OK
	Commande "show_student login_x" :						OK
	gestion des erreur :									OK


Étape 2	---  ---  ---  ---  ---

	parseing du CSV :										OK
	Commande "movies_storing" :								OK
	Commande "show_movies" :								OK
	Commande "show_movies desc" :							OK
	Commande "show_movies genres xxxxxx" :					OK
	Commande "show_movies year xxxx" :						OK
	Commande "show_movies rate xx" :						OK
	gestion des erreur :									Ok

Étape 3	---  ---  ---  ---  ---

	Commande "rent_movie login_x imdb" :					OK
	Commande "return_movie login_x imdb" :					OK
	Commande "show_rented_movies"							OK
	gestion des erreur :									Ok

Bonus	---  ---  ---  ---  ---

	Pas de bonnus


Description des commandes  ---  ---  ---  ---  ---

	lancement du programme dans le terminale avec la commande :

	>	php etna_movies.php [option] [option2]

	[option] peux etre  	:

	> add_student							: ajoute un etudiant a la base de donnee
	> del_student							: supprime un etudiant de la base de donnee
	> update_student						: modifie les donnees d'un etudiant
	> show_student 							: montre tout les etudiants
	> show_movies 							: affiche les films peux etre suivie de [option2]
	> movies_storing						: cree une base de donnee a partire du fichier CSV
	> rent_movie [login_x] [imdb_code]		: permet de louer un film 
	> renturn_movie [login_x] [imdb_code]	: retourne un film
	> show_rented_movies					: affiche les films loues
	
	[option2] peux etre 	: 

	dans le cas de 			:	show_movies 

	> desc 					: de Z a A
	> genres xxxxxx 		: cherche le genres demande
	> year xxxx 			: cherche l'annee demande
	> rate x				: cherche la note demande

	dans les autres cas 	:

	> lequer_r 				: le nom d'une personne
