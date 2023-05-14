<?php
	if(!$_SESSION['matricula'])
	{	
		header('Location: ../index.php');
		exit();
		
	}
?>