<?php
class Player
{
	private $id;
	private $name;

	public function __construct($id=null, $name=null)
	{
		$this->setId($id);
		$this->setName($name);
	}
	
	public function setId($pId){
		$this->id = $pId;
	}
	
	public function getId(){
		return $this->id;
	}	
	
	public function setName($pName){
		$this->name = $pName;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function getAll(){
		$t_id = (int)$this->id;
		$playerDb = new PlayerDB();
		return $playerDb->fetchAllPlayersForThisTeam($t_id);
	}
	
	public function get(){
		
		
	}

	public function save()
	{
		
	}
}

class PlayerDB{
	public function fetchAllPlayersForThisTeam($teamId){
		$response = array();
		$db = new Database();
		$sql = "SELECT * FROM `players` WHERE `team_id`=$teamId";
		$rs = $db->executeQuery($sql);
		if($rs->num_rows>0) {
			//$response = $rs->fetch_all(true);
			while ($rw = $rs->fetch_assoc()) {
				$response[] = $rw;
			}
		}
		return $response;
	}


}

class PlayerFacrory
{
	public static function get($id, $name)
	{
		return new Player($id, $name);
	}
}

?>