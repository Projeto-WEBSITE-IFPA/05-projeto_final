<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagens/favicon.ico">
    <link rel="stylesheet" href="venda.css">
    <title>IFPA Tech</title>
</head>
<body>
    <div class="topo">
        <h1>IFPA TECH</h1>
    </div>  
    <ul class="menu">
        <a href="index.php" class="buscar">BUSCAR</a>      
        <a href="carrinho.php" class="img_1"><img src="imagens/carrinho.png" height="50px" width="50px"></a>
        <a href="login.php" class="img_2"><img src="imagens/login.png" height="50px" width="50px"></a>
    </ul>
    <div class="corpo">
        <div class="esquerda">						
			<div> 
                <img src="imagens/desktop.png" width="200" height="200"> 
                <h4>Computadores</h4>
                <img src="imagens/laptop.png" width="200px" height="200px">
                <h4>Notebooks</h4>
                <img src="imagens/impressora.png" width="200px" height="200px">
                <h4>Impressoras</h4>
             </div>
        </div>
		<div class="centro">
            <form id="vendas" method="post" class="vendas">
                <table>
                    <tr> 
                    <td>Data Inicial: </td><td><input type="date" name="campo_dti" id="cmpNm"></td>
                    </tr>
                    <tr>
                        <td>Data Final: </td><td><input type="date" name="campo_dtf" id="cmpTel"></td>
                    </tr>
                    <tr>
                        <td>Equipamento: </td><td><input type="text" name="campo_equipamento" id="cmpEnd"></td>
                    </tr>
                    <tr>
                     
                    </tr>
                    <tr>
                        <td><input type="submit" value="BUSCAR"></td><td></td>
                    </tr>
                </table>
            </form>	
		</div>
    </div>
    <div class="rodape">

        <h4> &copy; IFPA TECH - 2020</h4>
    </div>        
    
</body>
</html>