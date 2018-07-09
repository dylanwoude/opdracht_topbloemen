<?php

class FormView{
	
	private $model;
    private $controller;

    public function __construct(FormController $controller, FormModel $model) {
            $this->controller = $controller;
            $this->model = $model;
    }

    public function output() {
 
    		$_SESSION['screen'] = 'Form';

			$form_output =
            '<form action="index.php" method="POST" enctype="multipart/form-data">
				<p>Voornaam:</p>
				<input type="text" name="FirstName" required><br>
				<p>Tussenvoegsel</p>
				<input type="text" name="Insertion" required><br>
				<p>Achternaam</p>
				<input type="text" name="LastName" required><br>
				<p>Telefoonnummer</p>
				<input type="text" name="PhoneNumber" required><br>
				<p>E-mailadres</p>
				<input type="text" name="E_mail" required><br>
				<p>Afbeelding</p>
				<input type="file" name="Image" ><br>
				<p>Wachtwoord</p>
				<input type="text" name="Password" required><br>
				<input type="submit" name="submit" value="submit">
			</form>';

            return $form_output;
    }


}

?>