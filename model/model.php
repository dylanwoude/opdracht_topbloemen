<?php

class FormModel{

    public $FirstName; 
    public $insertion; 
    public $LastName; 
    public $Phonenumber; 
    public $IP; 
    public $Screen; 
    public $E_mail; 
    public $Image; 
    public $Password;

	public function db_connect(){

	    static $connection;

	    if(!isset($connection)) {
	        $config = parse_ini_file('C:/nginx/www/opdracht/config.ini'); 
	        $connection = mysqli_connect($config['servername'], $config['username'], $config['password'], $config['dbname']);
	    }

	    if($connection === false) {
	        return mysqli_connect_error(); 
	    }
	    return $connection;
	}

    public function Array_Form($FirstName, $insertion, $LastName, $Phonenumber, $IP, $Screen, $E_mail, $Image, $Password){

    	$database = $this->db_connect();
    	

    	if(isset($_POST['submit'])){
	    	$data = array(
	    		'FirstName' => mysqli_real_escape_string($database, $FirstName),
	    		'insertion' => mysqli_real_escape_string($database, $insertion),
	    		'LastName' => mysqli_real_escape_string($database, $LastName),
	    		'Phonenumber' => mysqli_real_escape_string($database, $Phonenumber),
	    		'IP' => $_SERVER['REMOTE_ADDR'],
	    		'Screen' => $Screen,
	    		'E_mail' => mysqli_real_escape_string($database, $E_mail),
	    		'image' => $Image,
	    		'Password' => mysqli_real_escape_string($database, $Password)
	    	);
		    return $data;
    	}
    }

    public function Select_Information($Voornaam){

    	$server = "localhost";
		$user= "root";
		$password = "dylan9189";
		$db = "topbloemen";

		$database = mysqli_connect($server, $user, $password, $db);

    	$query = 'SELECT * FROM informatie_topbloemen WHERE Voornaam = "' . $Voornaam . '";';
    	$result = mysqli_query($database, $query);
    	$row = mysqli_fetch_assoc($result);

    	return $row;
    }

    

}

?>