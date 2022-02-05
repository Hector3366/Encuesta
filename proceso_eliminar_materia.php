<?php
	
	header('Content-type: application/json; charset=UTF-8');
	
	$response = array();
	
	if ($_POST['delete']) {
		
		require_once 'dbcon.php';
		$STATUS=2;
		$pid = intval($_POST['delete']);
		//$query = "DELETE FROM materias WHERE id_materia=:pid";
		$query= "UPDATE materias SET  id_status='$STATUS' WHERE id_materia=:pid";
		$stmt = $DBcon->prepare( $query );
		$stmt->execute(array(':pid'=>$pid));
		



		if ($stmt) {
			$response['status']  = 'success';
			$response['message'] = 'Materia Eliminada Correctamente';
		} else {
			$response['status']  = 'error';
			$response['message'] = 'No se puede Eliminar la Materia';
		}
		echo json_encode($response);
	}