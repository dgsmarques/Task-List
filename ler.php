<?php

require_once ('autoload.php');

$task = new Task;
$dados = $task->listarTask('*');

foreach ($dados as $dado) {
?>
	<li><?php echo $dado['task'] ?> (<?php echo $dado['dataTask'] ?>) <img src="delete.png" id="<?php echo $dado['id'] ?>" class="remover" /></li>
<?php
}
