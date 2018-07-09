<?php


class ProfileView{
	
	private $model;
    private $controller;

    public function __construct(FormController $controller, FormModel $model) {
            $this->controller = $controller;
            $this->model = $model;
    }

    public function output($row) {

			$ProfileOutput =
            '<html>
            	<body>
            		<div>
            			<h1> verzonden informatie</h1>
            			<p>Voornaam: ' . $row['Voornaam'] . '</p>
            			<p>Tussenvoegsel: ' . $row['Tussenvoegsel'] . '</p>
            			<p>Achternaam: ' . $row['Achternaam'] . '</p>
            			<p>Telefoonnummer: ' . $row['Telefoonnummer'] . '</p>
            			<p>IP: ' . $row['IP_van_registratie'] . '</p>
            			<p>Schermnaam: ' . $row['Schermnaam'] . '</p>
            			<p>E-mail: ' . $row['E_mailadres'] . '</p>
            			<p>Wachtwoord: ' . $row['Wachtwoord'] . '</p>
            			<image src="/opdracht/uploads/' . $row['Avatar_afbeelding'] . '"></image>
            			<h1>Unset session</h1>
            			<form action="index.php" method="POST">
            				<input type="submit" name="unset">
            			</form>
            		</div>
            	</body>
            </html>';

            return $ProfileOutput;
    }


}

?>