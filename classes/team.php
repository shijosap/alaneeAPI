<?php
class Team
{
	private $id;
	private $name;

	public function __construct($id=null, $name=null)
	{
		$this->id = $id;
		$this->name = $name;
	}
	
	public function getAll(){
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
	
	public function get(){
		
		
	}

	public function save()
	{
		
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