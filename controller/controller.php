<?php

class FormController{

	protected $model;

	public function __construct(FormModel $model){
		$this->model = new FormModel();
	}

	public function Insert_Information($table, $values) {

		$server = "localhost";
		$user= "root";
		$password = "dylan9189";
		$db = "topbloemen";

		$database = mysqli_connect($server, $user, $password, $db);
        
		$query = "INSERT INTO informatie_topbloemen 
		(Voornaam, Tussenvoegsel, Achternaam, Telefoonnummer, IP_van_registratie, Schermnaam, E_mailadres, Avatar_afbeelding, Wachtwoord)
		 VALUES (" . "'" . implode("', '", $values) . "'" .");";

		echo $query;
		$result = mysqli_query($database, $query);
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