<!DOCTYPE HTML>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>CHAT SERVIBOOK-BETA</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.js"> </script>
	<script type="text/javascript">
		$.noConflict();
	</script>
	
</head>
<body>
	<aside id="users_online">
		<ul>
		<?php for ($i=1; $i <=8 ; $i++):?>  
			<li id="5">
				<div class="imgSmall"><img src="images/logo.png" border="0"/></div>
				<a href="#" id="3:" class="comecar">Usuário_X</a>
				<span id="5" class="status on"></span>
			</li>
		<?php endfor;?> 	
		</ul>
	</aside>

	<aside id="chats">
		
	</aside>
	<script type="text/javascript" src="js/funcoes.js"></script>
</body>
</html>


<!-- <div class="window" id="janela_x">
			<div class="header_window"><a href="#" class="close">X</a><span class="name">John</span><span id="5" class="status on"> </span></div>
			<div class="body"> 
				<div class="mensagens">
					<ul>
						
					</ul>
				</div>
				<div class="send_message" id="3:5">
					<input type="text" name="mensagem" class="msg" id="3:5">
				</div>
			</div>
		</div> -->