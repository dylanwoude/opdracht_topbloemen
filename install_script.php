<?php

if(isset($_POST['submit'])){

	$connect = mysqli_connect($_POST['Server'], $_POST['Username'], $_POST['Password']);

	$queryDatabase = "CREATE DATABASE topbloemen;";

	$Create_Db = mysqli_query($connect, $queryDatabase);

	$connect = mysqli_connect($_POST['Server'], $_POST['Username'], $_POST['Password'], "informatie_topbloemen");

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
			<p>Server:</p>
			<input type="text" name="Server" required>
			<p>username:</p>
			<input type="text" name="Username" required>
			<p>password:</p>
			<input type="text" name="Password" required>
			<p>database:</p>
			<input type="submit" name="submit">
		</form>

	</body>
</html>