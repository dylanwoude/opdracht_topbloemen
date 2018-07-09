<?php

if(isset($_POST['submit'])){

	$config = parse_ini_file('C:/nginx/www/opdracht/config.ini'); 

	$connect = mysqli_connect($config['servername'], $config['username'], $config['password'], $config['dbname']);

	$queryTable = "CREATE TABLE informatie_topbloemen (
	id INT(6) AUTO_INCREMENT PRIMARY KEY,
	Voornaam VARCHAR(30) NOT NULL,
	Tussenvoegsel VARCHAR(30) NOT NULL,
	Achternaam VARCHAR(30) NOT NULL,
	Telefoonnummer VARCHAR(30) NOT NULL,
	Schermnaam VARCHAR(30) NOT NULL,
	E_mailadres VARCHAR(50),
	Avatar_afbeelding VARCHAR(30),
	Wachtwoord VARCHAR(50)
	);";

	$Create_Table = mysqli_query($connect, $queryTable);
}

?>

<html>
	<body>
		<form action="install_script.php">
			<p>The table can be installed through the button below.</p> 
			<p>The server, database, username and password are defined in the config.ini and that only has to be adjusted for the script to work</p>
			<p>create table:</p>
			<input type="submit" name="submit">
		</form>

	</body>
</html>