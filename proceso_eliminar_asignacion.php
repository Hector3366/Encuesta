<?php
	
	header('Content-type: application/json; charset=UTF-8');
	
	$response = array();
	
	if ($_POST['delete']) {
		
		require_once 'dbcon.php';
		
		$pid = intval($_POST['delete']);
		$query = "DELETE FROM asignar WHERE id_asignar=:pid";
		$stmt = $DBcon->prepare( $query );
		$stmt->execute(array(':pid'=>$pid));
		
		if ($stmt) {
			$response['status']  = 'success';
			$response['message'] = 'Asignación Eliminada Correctamente';
		} else {
			$response['status']  = 'error';
			$response['message'] = 'No se puede eliminar la Asignación';
		}
		echo json_encode($response);
	}