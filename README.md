TIC-SGBD - Etna Movies

Durée : 5 jours
Système d'exploitation : Debian
Nom du script exécuté : etna_movies.php
Technologies : PHP + MongoDB
Objectifs : Maitriser MongoDB, savoir communiquer avec une base de données MongoDB via PHP
Attention !

Votre projet sera corrigé par une moulinette, il est donc très important que vous respectiez les consignes suivantes.
Bien évidemment vous devez toujours coder à la norme ! Autrement, un ou plusieurs malus seront attribués.
Exemples : 80 colonnes (vous pouvez découper vos lignes de codes contenant plus de 80 caractères...), 25 lignes par fonction, 5 fonctions par fichier, etc.

Avant de démarrer
Vous disposez d'une VM par groupe sous Debian avec les packages nécessaires pour effectuer ce projet (Apache, MySQL, PHP, Emacs, SublimeText, Gcc, Make)
Toutefois, vous devez installer MongoDB par vous-mêmes.
Présentation du projet
Vous devez apprendre à utiliser MongoDB et son utilisation avec PHP en réalisant un script.

L'Etna veut concevoir un service de location de films pour les étudiants.
Pour cela, les dirigeants souhaiteraient que vous réalisiez l'interface qui intéragit avec la base de données. Le script doit permettre à l'utilisateur d'enregistrer des étudiants dans la base de données, ainsi que des films, et pouvoir enregistrer les différentes locations de chacun.

Notification

Ce n'est pas très compliqué mais vous n'avez pas beaucoup de temps ! Cet exercice vous permet de manipuler une nouvelle technologie, mais il vous demande aussi de faire preuve de rigueur avec les consignes.
Alors gérez votre temps efficacement et partagez-vous le travail équitablement.
Étape 1 - Les étudiants
Pour cette première partie, vous allez vous occuper de l'enregistrement des étudiants dans la base de données et des différentes interactions avec les données.

Voici les commandes à réaliser :

add_student
del_student
update_student
show_student
Ci-dessous, un exemple d'utilisation du script :
Architecture de la base de données

Attention !

Cette architecture doit être respectée pour que vous passiez la moulinette de correction.
	db (bases de données utilisées par MongoDB)
	|
	|-- db_etna (votre base de données)
	    |
	    |-- students (collection)
	        |
	        |--- { (document)
	     	       login: <xxxxxx_x>     				(lettres / lettres ou chiffres)
	               name:  <string>       				(ne peut pas être vide)
	               age:   <int>          				(de 1 à 99 Oui oui, les centenaires sont exclus !)
	               email: <respectant la RFC 5322> 			(ne peut pas être vide)
	               phone: <respectant la norme des numéro français> (ne peut pas être vide)
	             },
	             ...
	
Gestion des étudiants

Attention !

Pour chacune de ces commandes, vous devez respecter l'affichage suivant.
C'est à dire qu'il vous est imposé d'afficher les questions comme suit :
$>  ./etna_movies.php add_student lequer_r   	# Lancement du script
Question ? 					# Question : retour à la ligne (obligatoire)
> Réponse 					# Entrée utilisateur: Commence par un "> " (espace) ; les infos doivent être validées par la touche "entrée" (obligatoire)
Retour du script
$>
				
Ces consignes doivent être respectées pour que vous passiez la moulinette de correction.
Si vous avez la moindre question n'hésitez pas à me la poser sur le mur du projet ou par mail ! Ne restez pas dans le flou :)
Commande "add_student" :

$> ./etna_movies.php add_student lequer_r
Name ?
> Robin LE QUEREC
Age ?
> 28
Email ?
> robin.lequerec@etna-learning.fr
Phone number ?
> 0101010101
User registered !
$>
		
Notification

Vous devez demander ces informations dans le même ordre que l'exemple.
Commande "del_student" :

$> ./etna_movies.php del_student lequer_r
Are you sure ?
> yes
User deleted !
$>
		
Notification

Vous devez demander confirmation à l'utilisateur.
Vous devez accepter : oui / non / yes / no
Commande "update_student" :

$> ./etna_movies.php update_student lequer_r
What do you want to update?
> name
New name ?
> Robin LE QUEREC Roi De Bretagne
User informations modified !
$> ./etna_movies.php update_student lequer_r
What do you want to update?
> age
New age ?
> 42
User informations modified !
$>
		
Notification

L'utilisateur ne doit pas pouvoir changer le login.
Vous devez accepter les mêmes clés que la base de données (name, age, email, phone)
Commande "show_student" :

$> ./etna_movies.php show_student lequer_r
login	  : lequer_r
nom	  : Robin LE QUEREC Roi De Bretagne
age	  : 42
email	  : robin.lequerec@etna-learning.fr
phone 	  : 0101010101
$> ./etna_movies.php show_student
lequer_r  Robin LE QUEREC Roi De Bretagne   42   0101010101    robin.lequerec@etna-learning.fr
burrow_r  Raphaelle Burrow Reine du désert  21   0202020202    raphaelle.burrow@etna-learning.fr
*2*    [étoile_nombreD'étudiantAffiché_étoile]
		
Notification

Lorsqu'aucun argument n'est passé à show_student, vous devez afficher, sur la dernière ligne, le nombre d'étudiants affiché comme dans l'exemple. Vous êtes libre d'afficher les informations comme vous le souhaitez.
Faîtes un truc stylé ! ;)

Étape 2 - Les films
Pour cet étape, vous allez devoir parser le fichier CSV qui vous a été fourni : movies.csv
Le but étant d'enregistrer les données qui nous intéressent en suivant l'architecture suivante :

Architecture de la base de données

Attention !

Cette architecture doit être respectée pour que vous passiez la moulinette de correction.
	db (bases de données utilisées par MongoDB)
	|
	|-- db_etna (votre base de données)
	    |
	    |-- students { ... },
	    |
	    |-- movies (collection)
	        |
	        |--- {             (exemple de document)			(Clés de la colonne du fichier CSV)
	               imdb_code:  "tt0468569",					("const")
	               title:      "The Dark Knight",				("Title")
	               year:       2008,					("Year", <int>)
	               genres:     ["action", "crime", "drama"],		("Genres", <array de string>)
	               directors:  ["Christopher Nolan"],			("Directors", <array de string>)
	               rate:       9.0,						("IMDb Rating", <float>)
	               link:       "http://www.imdb.com/title/tt0468569/",	("URL")
	               stock:	   3 						(chiffre random à générer entre 0 et 5, <int>)
	             },
	             ...
	
Il vous est demandé de rajouter la clé "stock" qui aura pour valeur un chiffre aléatoire entre 0 et 5 inclusif. Cela servira pour l'étape 3.

Gestion des films

Commande "movies_storing" :

$> ./etna_movies.php movies_storing
4242 movies successfully stored ! (ce nombre est random)
		
Notification

Vous n'avez pas d'erreurs à gérer pour cette commande.
En effet, le fichier n'est et ne sera pas corrompu. Vous n'avez donc pas de gestion d'erreurs à faire sur celui-ci. :)
Commande "show_movies" :

$> ./etna_movies.php show_movies
[ affiche la totalité des films dans l'ordre alphabétique ]
*4242*
$> ./etna_movies.php show_movies desc
[ affiche la totalité des films dans l'ordre alphabétique inverse ]
*4242*
$> ./etna_movies.php show_movies genre AcTiOn 			(insensible à la casse, on ne peut préciser qu'un genre)
[ affiche tous les films du genre préciser ]
*42*
$> ./etna_movies.php show_movies year 1994			(on ne peut préciser qu'une année)
[ affiche tous les films de l'année précisée ]
*21*
$> ./etna_movies.php show_movies rate 7 			(on ne peut préciser qu'une note (int))
[ affiche tous les films notés entre 7 inclus et 8 exclus ]
*48*
$>
		
Notification

Une gestion d'erreurs est attendue pour les commandes qui acceptent des paramètres : show_movies, show_movies genre, show_movies year et show_movies rate.
Vous êtes libre d'afficher les informations comme vous le souhaitez, cependant le imdb_code doit apparaître.
Vous devez seulement afficher en dernière ligne le nombre de films affichés de la manière suivante:
$> ./etna_movies.php show_movies
[...]
*4242*      (étoile_NOMBRE_DE_FILM_AFFICHÉS_étoile suivi d'un retour à la ligne)
$>
			
Faîtes un truc stylé ! ;)

Étape 3 - Les locations
Enfin, pour cette partie, il s'agit de manipuler les références.
Dans chaque document d'etudiants vous allez créer une clé "rented_movies" qui contiendra un objet de références aux documents de la collection "movies" (films que l'étudiant loue).
Dans chaque document de movies, vous allez créer une clé "renting_students" qui contiendra un objet de références aux documents de la collection "students" (étudiant qui loue actuellement ce film).
Lorsqu'un film est loué ou rendu, la modification de ces objets doit être faite. Par exemple, lorsqu'un film est loué, sa référence doit être mise dans l'ojet "rented_movies" de son locataire et la référence du locataire doit être mise dans l'objet "renting_students" du film loué.
Architecture de la base de données

Attention !

Cette architecture doit être respectée pour que vous passiez la moulinette de correction.
	db (bases de données utilisées par MongoDB)
	|
	|-- db_etna (votre base de données)
	    |
	    |-- students (collection)
	    |	|
	    |	|-- {
	    |	      ...,
	    |	      rented_movies: { _id, ... }		(références aux documents de la collection "movies")
	    |	    },
	    |       ...
	    |
	    |-- movies (collection)
	        |
	        |-- {
	     	      ...,
	              stock: stock - 1,				(le stock est modifié dans le document du film en question)
	              renting_students: { _id, ... }		(références aux documents de la collection "students")
	            },
		        ...

	
Gestion des locations

Commande "rent_movie" :

La location d'un film se fait grâce à la commande "rent_movie" suivi du login du locataire et l'imdb_code du film.
La location d'un film dépend de son stock.

$> ./etna_movies.php rent_movie login_x imdb_code
Rented !						(lorsque le stock du film n'est pas à 0)
$> ./etna_movies.php rent_movie login_x imdb_code
Stock-out !						(lorsque le stock du film est à 0)
		
Notification

On ne peut entrer qu'un seul imdb_code à la fois, mais un étudiant peut louer plusieurs films à la fois. Vous devez gérer le fait que :
le login existe,
l'imdb code existe,
le film ait un stock suffisant pour être loué.
Vous devez afficher "Rented" en cas de succès et "Stock-out" en cas d'échec.
Commande "return_movie" :

Rendre un film se fait grâce à la commande "return_movie" suivi du login du locataire et l'imdb_code du film.
$> ./etna_movies.php return_movie login_x imdb_code
Returned						(lorsque le film est rendu)
$> ./etna_movies.php return_movie login_x imdb_code
Error: [...]						(lorsque le film n'est pas loué, et/ou le login est incorrecte, et/ou l'imdb code est incorrecte)
		
Notification

Vous devez gérer le fait que :
le login existe,
l'imdb code existe,
le film soit bien loué et par le login.
Vous devez afficher "Returned" en cas de succès et "Error: " (suivi de votre message d'erreur) en cas d'échec.
Commande "show_rented_movies" :

Cette commande permet d'afficher tout les films loués.
$> ./etna_movies.php show_rented_movies
[...]
*21*      (étoile_NOMBRE_DE_FILM_AFFICHÉS_étoile suivi d'un retour à la ligne)
		
Notification

Vous êtes libre d'afficher cela comme vous le souhaitez.
Faites un truc stylé ;).
Toutefois, vous devez afficher le nombre total de films affichés (loués) en dernière ligne comme ci-dessus.

Gestion d'erreurs
Comme vous devez vous en douter, qui dit "entrée utilisateur", dit "gestion d'erreurs".
En effet ce projet vous demande une gestion d'erreurs importante pour la majorité des données à entrer.
Dans la base de données, pour chaque valeur associée à sa clé, la syntaxe autorisée est précisée entre parenthèses.

Notification

N'oubliez pas que le usage est très apprécié lorsqu'une commande est mal entrée, ou lorsqu'un argument manque.
La notation de ce projet s'appuiera fortement sur la gestion d'erreurs des entrées utilisateur.
Soyez donc rigoureux.

README
Pour ce projet, la création d'un README est obligatoire.
En effet, pour votre vie future, vous serez tenu d'expliquer clairement le fonctionnement de votre projet, son utilisation, etc.
J'attends de celui-ci, qu'il soit complet, sans fautes, et propre. :)
Un malus sera accordé si il n'est pas présent dans le dossier de rendu. :(

Dossier de rendu
L'architecture du dossier de rendu et sa bonne tenu seront aussi jugés pour ce projet.
Vous devrez faire attention à donner des noms de fichiers/fonctions cohérents à leur utilisation/fonctionnalités.
N'hésitez pas à créer des dossiers, répartir vos fichiers intelligemment, etc. Tout ceci fait parti de la norme. 

Bonus
Pour les bonus, c'est comme d'habitude. Ils ne seront comptés que si l'intégralité du projet est traité.
Bien évidemment, je compte sur le fait que vous avez assez de travail pour ne pas avoir le temps de faire de bonus. Je préfère que le sujet soit traité parfaitement et sans bonus, que partiellement avec des erreurs partout et full bonus !
Tout de même, si bonus est, une deuxième version de votre projet sera :

dossier de rendu
|
|-- version sans bonus
|-- version avec bonus
	
Encore quelques mots
N'hésitez pas à me contacter sur le mur du projet, ou par mail pour toutes questions ou flou ou autres.
Je me répète, le projet n'est pas compliqué, il requiert juste de la rigueur. Faites attention aux consignes, aux erreurs, relisez le sujet, relisez vous, et tout ira bien.
Bon courage :D.
