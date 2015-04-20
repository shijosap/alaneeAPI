<?php
class Soccerteam extends Json{
	
	public function __construct(){
		
		
	}
	
	public function __call($name, $params){
		$this->error(9999,"Sorry no service exists");
	}
	
	public function getteams($params){
		//var_dump($params);
		require SERVER_ROOT.'/classes/domain/team.php';
		$team = TeamFacrory::get(null,null);
		$teams = $team->getAll();
		foreach ($teams as &$teamRw){
			$teamRw['logo_url'] = 'http://'.SITE_URL.'images/'.$teamRw['logo_url'];
		}
		$this->ok($teams);
	}
	
	public function getteamplayers($params){
		require SERVER_ROOT.'/classes/domain/player.php';
		$player = PlayerFacrory::get($params[0],null);
		$players = $player->getAll();
		foreach ($players as &$playerRw){
			$playerRw['image_url'] = 'http://'.SITE_URL.'images/'.$playerRw['image_url'];
		}
		$this->ok($players);
	}
	
}

?>