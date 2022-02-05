<?php
	
	header('Content-type: application/json; charset=UTF-8');
	
	$response = array();
	
	if ($_POST['delete']) {
		
		require_once 'dbcon.php';
		
		$pid = intval($_POST['delete']);
		$query = "DELETE FROM periodo WHERE id_periodo=:pid";
		$stmt = $DBcon->prepare( $query );
		$stmt->execute(array(':pid'=>$pid));
		



		if ($stmt) {
			$response['status']  = 'success';
			$response['message'] = 'Periodo Eliminado Correctamente';
		} else {
			$response['status']  = 'error';
			$response['message'] = 'No se puede Eliminar el Periodo';
		}
		echo json_encode($response);
	}