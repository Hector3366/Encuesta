<?php
	
	header('Content-type: application/json; charset=UTF-8');
	
	$response = array();
	
	if ($_POST['delete']) {
		
		require_once 'dbcon.php';
		$STATUS=2;
		$pid = intval($_POST['delete']);
		//$query = "DELETE FROM alumnos WHERE no_control=:pid";
		$query= "UPDATE alumnos SET  id_status='$STATUS' WHERE no_control=:pid";
		$stmt = $DBcon->prepare( $query );
		$stmt->execute(array(':pid'=>$pid));
		
        $pid = intval($_POST['delete']);
		$query = "DELETE FROM usuarios WHERE usuario=:pid";
		$stmt = $DBcon->prepare( $query );
		$stmt->execute(array(':pid'=>$pid));
		



		if ($stmt) {
			$response['status']  = 'success';
			$response['message'] = 'Alumno Eliminado Correctamente';
		} else {
			$response['status']  = 'error';
			$response['message'] = 'No se puede Eliminar el Alumno';
		}
		echo json_encode($response);
	}