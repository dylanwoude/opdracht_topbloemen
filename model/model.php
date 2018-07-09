<?php

class FormModel{

	private $_acceptedFormats = ['image/png', 'image/jpg', 'image/jpeg'];

    public $FirstName; 
    public $insertion; 
    public $LastName; 
    public $Phonenumber; 
    public $IP; 
    public $Screen; 
    public $E_mail; 
    public $Image; 
    public $Password;

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