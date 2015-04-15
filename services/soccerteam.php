<?php
class Soccerteam extends Json{
	
	public function __construct(){
		
		
	}
	
	public function __call($name, $params){
		$this->error(9999,"Sorry no service exists");
	}
	
	public function getteams($params){
		//var_dump($params);
		require SERVER_ROOT.'/classes/team.php';
		$team = TeamFacrory::get(null,null);
		$teams = $team->getAll();
		$this->ok($teams);
		
	}
	
}

?>