<?php
	
	header('Content-type: application/json; charset=UTF-8');
	
	$response = array();
	
	if ($_POST['delete']) {
		
		require_once 'dbcon.php';
		
		$pid = intval($_POST['delete']);
		$STATUS=2;
		//$query = "DELETE FROM maestros WHERE id_maestros=:pid";
		$query= "UPDATE maestros SET  id_status='$STATUS' WHERE id_maestros=:pid";
		$stmt = $DBcon->prepare( $query );
		$stmt->execute(array(':pid'=>$pid));
		
		if ($stmt) {
			$response['status']  = 'success';
			$response['message'] = 'Maestro eliminado correctamente...';
		} else {
			$response['status']  = 'error';
			$response['message'] = 'No se puede eliminar el Maestro ...';
		}
		echo json_encode($response);
	}
	?>