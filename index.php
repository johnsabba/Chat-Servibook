<!DOCTYPE HTML>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>CHAT SERVIBOOK-BETA</title>
	<style type="text/css">
		*{margin:0; padding:0; box-sizing: border-box;}
		body{background: #ebebeb;}			}
		.right{float: right;}/*Não funciona...*/
		.botao{
			float: right;/*Tem que definir no item ja que o "".right não funfa*/
			padding: 6px 8px; 
			background: linear-gradient(to bottom, #069, #09f 130%);
			border: 1px solid #fff;
			font: 16px tahoma, arial;
			color: white;
			border-radius: 5px;
		}
		.formulario{
			position: absolute; 
			top: 50%; 
			left: 50%; 
			width: 480px;
			height: 200px;
			background: white;
			border-radius: 6px;
			margin-left: -250px;
			margin-top: -100px;
			padding: 10px;
			box-shadow: #666 2px 10px 30px;
		}
		h1{
			float: left;
			width: 100%;
			margin-bottom: 10px;
			font:24px "Trebuchet MS", tahoma, arial;
			font-weight: bold;
			color: #069;
			padding: 5px;
			text-align: center;
		}
		.formulario label{
			float: left;
			width: 100%;
		}
		.formulario label span{
			float: left;
			width: 100%;
			font: 15px tahoma, arial;
			color: #666;
			margin-bottom: 10px;
		}
		.formulario label input{
			float: left;
			width: 100%;
			padding: 6px;
			background: #cdcdcd;
			border-radius: 5px;
			border: 1px solid #999;
			outline: none;
			margin-bottom: 10px;
		}
	</style>
</head>
	<body>
		<div class="formulario">
			<h1> Bem vindo ao chat, faça login</h1>
			<form action="" method="post" enctype="multipart/form-data">
				<label>
					<span>Informe seu Email</span>
					<input type="text" name="email" placeholder="Seu Email aqui."/>
				</label>	
				<input type="submit" value="Entrar" class="botao right" />
			</form>
		</div>
	</body>
</html>	