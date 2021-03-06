<?php

session_start();

include 'model/model.php';
include 'controller/controller.php';
include 'view/view.php';
include 'view/viewProfile.php';

$model = new FormModel();
$controller = new FormController();
$view = new FormView($controller, $model);
$viewProfile = new ProfileView($controller, $model);

if(isset($_POST['submit'])){
	if(isset($_FILES['Image'])){
		$controller->upload_image($_FILES['Image']);

		$connection = $model->db_connect();

		$table = 'informatie_topbloemen';
		$controller->Insert_Information($table, $model->Array_Form(
			mysqli_real_escape_string($connection, $_POST['FirstName']), 
			mysqli_real_escape_string($connection, $_POST['Insertion']), 
			mysqli_real_escape_string($connection, $_POST['LastName']), 
			mysqli_real_escape_string($connection, $_POST['PhoneNumber']), 
			$_SERVER['REMOTE_ADDR'], 
			$_SESSION['screen'], 
			mysqli_real_escape_string($connection, $_POST['E_mail']), 
			$_FILES['Image']['name'],
			mysqli_real_escape_string($connection, $_POST['Password'])
		));

		$_SESSION['Voornaam'] = mysqli_real_escape_string($connection, $_POST['FirstName']);
		
		
	}
}

if(isset($_POST['unset'])){
	unset($_SESSION);	
}


if(!isset($_SESSION['Voornaam']) && !isset($_SESSION[''])){
	$_SESSION['Voornaam'] = NULL;
	echo $view->output($_SESSION['Voornaam']);
}elseif(isset($_SESSION['Voornaam'])){
	$row = $model->Select_Information($_SESSION['Voornaam']);
	echo $viewProfile->output($row);
}




?>

