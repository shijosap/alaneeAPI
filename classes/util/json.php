<?php
class Json{
	private $code;
	private $message;
	private $result;
	
	public function __construct(){
		$this->code = 1;
		$this->message = 'OK';
		$this->result = array();		
	}
	
	public function error($code=0,$message='Error',$result=array()){
		$this->code = $code;
		$this->message = $message;
		$this->result = $result;
		$this->render();		
	}
	
	public function ok($result=array()){
		$this->code = 1;
		$this->message = 'OK';
		$this->result = $result;
		$this->render();
	}
	
	public function render(){
		$render_array = array(
			'code' => $this->code,
			'message' => $this->message,
			'result' => $this->result
		);
		echo json_encode($render_array);
	}
	
}

?>