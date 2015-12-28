<?php

include('class.password.php');

class User extends Password{

    private $db;
	
	function __construct($db){
		parent::__construct();
	
		$this->_db = $db;
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}		
	}

	private function get_user_hash($username){	

		try {

			$stmt = $this->_db->prepare('SELECT PW FROM membership WHERE ID = :username');
			$stmt->execute(array('username' => $username));
			
			$row = $stmt->fetch();
			return $row['PW'];

		} catch(PDOException $e) {
		    echo '<p class="error">'.$e->getMessage().'</p>';
		}
	}

	
	public function login($username,$password){	

		//hashed는 DB에 저장된 PW//
		$hashed = $this->get_user_hash($username);
		
		//password는 입력값.//
		if($password == $hashed){
		    
		    $_SESSION['loggedin'] = true;
		    return true;
		}		
	}
	
		
	public function logout(){
		session_destroy();
	}
	
}


?>