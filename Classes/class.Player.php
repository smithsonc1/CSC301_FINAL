<?php

Class Player {
	protected $playerid;
	public $PlayerName;
	protected $database;
	
	function __construct($playerid, $database) {
		$this->playerid = $playerid;
		$this->database = $database;


$sql = file_get_contents('sql/getPlayer.sql');
	$params = array(
		'playerid' => $_SESSION["playerid"]
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$players = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	$player = $players[0];
	$this->playerName = $player['name'];
	
	
	
	
	}
	
}
	
	?>