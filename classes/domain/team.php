<?php
class Team
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
		$teamDB = new TeamDB();
		return $teamDB->fetchAllTeams();
	}
	
	public function get(){
		
		
	}

	public function save()
	{
		
	}
}

class TeamDB{
	public function fetchAllTeams(){
		$response = array();
		$db = new Database();
		$sql = "SELECT * FROM `team`";
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

class TeamFacrory
{
	public static function get($id, $name)
	{
		return new Team($id, $name);
	}
}

?>