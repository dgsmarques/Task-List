<?php

	require_once ('autoload.php');

	$task = new Task;

	$task->removerTask($_GET['id']);		
