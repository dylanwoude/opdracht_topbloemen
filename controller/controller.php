<?php

class FormController{

	private $_acceptedFormats = ['image/png', 'image/jpg', 'image/jpeg'];

	private $model;

	public function __construct(){
		$this->model = new FormModel();
	}

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

	public function Insert_Information($table, $values) {

		$connection = $this->db_connect();
        
		$query = "INSERT INTO informatie_topbloemen 
		(Voornaam, Tussenvoegsel, Achternaam, Telefoonnummer, IP_van_registratie, Schermnaam, E_mailadres, Avatar_afbeelding, Wachtwoord)
		 VALUES (" . "'" . implode("', '", $values) . "'" .");";

		$result = mysqli_query($connection, $query);
    }


    public function upload_image($Image) {

    	if(is_array($Image)){

    		if(in_array($Image['type'], $this->_acceptedFormats)){

    			move_uploaded_file($Image['tmp_name'], 'C:/nginx/www/opdracht/uploads/' . $Image['name']);

    		}else{
    			die('file format is not suppported');
    		}

    	}else{
    		die('this is not a $_FILES array');
    	}
    }

    

}

?>