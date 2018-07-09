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
            			<p>' . $row['Voornaam'] . '</p>
            			<p>' . $row['Tussenvoegsel'] . '</p>
            			<p>' . $row['Achternaam'] . '</p>
            			<p>' . $row['Telefoonnummer'] . '</p>
            			<p>' . $row['IP_van_registratie'] . '</p>
            			<p>' . $row['Schermnaam'] . '</p>
            			<p>' . $row['E_mailadres'] . '</p>
            			<image src="/opdracht/uploads/' . $row['Avatar_afbeelding'] . '"></image>
            			<p>' . $row['Wachtwoord'] . '</p><br>
            			<h1>Unset session</h1>
            			<form action="index.php">
            				<input type="submit" name="unset">
            			</form>
            		</div>
            	</body>
            </html>';

            return $ProfileOutput;
    }


}

?>