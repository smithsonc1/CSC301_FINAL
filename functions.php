<?php

function searchHeroes($term, $database) {
	// Get list of heroes
	$term = $term . '%';
	$sql = file_get_contents('sql/getHeroes.sql');
	$params = array(
		'term' => $term
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$heroes = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $heroes;
}
function searchPlayers($term, $database) {
  $sql = file_get_contents('sql/searchPlayers.sql');
  $params = array (
    'searchTerm' => $term
  );

  //run database query and get the results
  //loop over the results
  $statement = $database->prepare($sql);
  $statement->execute($params);

  $players = $statement->fetchAll(PDO::FETCH_ASSOC);
  return $players;

}
function searchHero($heroid, $database) {
	// Get list of heroes
	$sql = file_get_contents('sql/getHero.sql');
	$params = array(
		'heroid' => $heroid
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$heroes = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $heroes;
}
/*
- Create a function named get() that:
	- takes a parameter holding a $_GET key as a string
	- if the GET variable isset, return the GET variable
	- else return an empty string
*/

function get($key) {
	if(isset($_GET[$key])) {
		return $_GET[$key];
	}
	
	else {
		return '';
	}
}