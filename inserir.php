<?php
	
	require_once ('autoload.php');

	$task = new Task;
	
	if ($_POST) {		
		$task->criarTask($_POST);		
	}
