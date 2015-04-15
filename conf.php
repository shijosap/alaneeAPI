<?php
class Config {
	private static $conf;
	private static $databasecConf;
	
	public static function doConfig() {
		$config_file = SERVER_ROOT.'/config/conf.ini';
		self::$conf = parse_ini_file($config_file,true);
		$db_config_file = SERVER_ROOT.'/config/database.ini';
		self::$databasecConf = parse_ini_file($db_config_file,true);
	}
/**
 * 
 * Enter description here ...
 * @param string $confKey
 * @todo : needs to be refactored ... to allow multilevel configuration.
 */	
	public static function read($confKey) {
		$conf_val = self::$conf;
		$conf_key_arr = explode('.', trim($confKey));
		foreach ($conf_key_arr as $conf_key){
			$conf_val = $conf_val[$conf_key];
		}
		return $conf_val;
	}
	
	public static function write($confKey,$value) {
		$conf_val = &self::$conf;
		$conf_key_arr = explode('.', trim($confKey));
		foreach ($conf_key_arr as $conf_key){
			$conf_val = &$conf_val[$conf_key];
		}
	}
	
	public static function getDbConfigs(){
		return self::$databasecConf;
	}
	
}
Config::doConfig();
/**
 * Class auto loader
 */
    class Autoloader {
    	private $classFolder = '';
        public function __construct($path='') {
        	$this->classFolder = $path;
            spl_autoload_register(array($this, 'loader'));
        }
        private function loader($className) {
        	$classFile = SERVER_ROOT.'/'.$this->classFolder.'/'.strtolower($className).'.php';
        	if (file_exists($classFile)) {
        		include_once $classFile;
        	}else{
        		
        	}
        	
        }
        public function loadThisClass($classFile) {
        	include_once SERVER_ROOT.'/'.$classFile;
        }
    }
    
  // Database
    class Database {
    	private $host;
    	private $database;
    	private $user;
    	private $password;
    	public $dbCon;
    	public function __construct() {
    		$dbVals = Config::getDbConfigs();
    		$config = $dbVals[Config::read('environment')];
    		$this->host = $config['host'];
    		$this->database = $config['database'];
    		$this->user = $config['user'];
    		$this->password = $config['password'];
    	}
    	public function getConnection() {
    		$this->dbCon = new mysqli($this->host,$this->user,$this->password,$this->database);
    		return $this->dbCon;
    	}
    
    	public function closeConnection() {
    		$this->dbCon->close();
    	}
    	public function executeQuery($query) {
    		$oConn = $this->getConnection();
    		$res = $oConn->query($query);
    		$this->closeConnection();
    		return $res;
    	}
    	public function insertQuery($query) {
    		$LiId = 0;
    		$oConn = $this->getConnection();
    		$oConn->query($query);
    		$LiId = $oConn->insert_id;
    		$con->closeConnection();
    		return $LiId;
    	}
    	
    	/**
    	 * Safe execute query with mysqli - prepare statement
    	 * @param string $query
    	 * @param array $query_vals
    	 */
    	public function safeExecute($query, $query_vals=array()){
    		$oConn = $this->getConnection();
    		$bindType = '';
    		$bindVal = array('');
    		if(count($query_vals)>0){
	    		foreach ($query_vals as $pType => $pVal){
	    			switch ($pType){
	    				case 's' :
	    				case 'b' :
	    					$bindType .=$pType;
	    					$bindVal[] = $oConn->real_escape_string($pVal);
	    					break;
	    				case 'i':
	    					$bindType .=$pType;
	    					$bindVal[] = $pVal;
	    					break;
	    				case 'd':
	    					$bindType .=$pType;
	    					$bindVal[] = $pVal;
	    					break;
	    				default:
	    					$bindType .='s';
	    					$bindVal[] = $oConn->real_escape_string($pVal);
	    					break;
	    			}
	    		}
	    		$bindVal[0] = $bindType;
    		}else{
    			$bindVal = array();
    		}
    		$stmt = $oConn->prepare($query);
    		call_user_func(array($stmt, 'bind_param'), $bindVal);
    		$stmt->execute();
    		$stmt->execute();
    		$stmt->bind_result($response);
    		$stmt->fetch();
    		$stmt->close();
    		$this->closeConnection();
    		return $response;
    	}
    
    }  

?>