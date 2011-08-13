<html>
<head>
	<title>Task Manager</title>
	<script type="text/javascript"
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js">
	</script>
	<script type="text/javascript">
		$(function(){
			$("#lista").load("ler.php");
				$("#botao").click(function(){
					var data = $("#data").val();
					var task = $("#task").val();
					$.ajax({
						type: "POST",
						url: 'inserir.php',
						data: 'dataTask=' + data + '&task=' + task,
						complete:function(data){
							alert("Enviado com sucesso");
							$("#lista").load("ler.php");						
						}								
					});
				});
				
				$(".remover").live('click', function() {
					
					var id = $(this).attr('id');
					
					$.ajax({
						type: "GET",
						url: 'remover.php',
						data: 'id=' + id,
						complete:function(data){
							alert("Removido com sucesso");
							$("#lista").load("ler.php");	
						}	
					
					});
				});
		});
	</script>	
	
</head>
<body>
<div id="container" width="768px" align="center">
	<h1>Task List</h1>
	<fieldset style="width: 768px;  align="center">
	<div>
		<ul id="lista">
		</ul>
	</div>
	Data:
	<input name="dataTask" type="text" id="data" />
	Task:
	<input name="task" type="text" id="task" />
	<input type="button" id="botao" value="New"">
	</fieldset>
</div>
</body>
</html>
