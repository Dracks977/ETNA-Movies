<?php
function conecxion() {
	$conect = new MongoClient();
	$db = $conect->db_etna;
	return ($db);
}

function add_in_col_students($tab) {
	$collection = conecxion()->createCollection('students');
	$collection->insert($tab);
}


function updata_login() {
	db.students.update(
		{'Login':$login},
		{$set : {'Login': $new_login}})
}

function rm_in_col_students() {
	db.students.remove({$login});
}