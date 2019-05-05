<?php
$id = -1;
$del = false;
$nome = "";
$valor = 0;
//conexao
try {
    $host = "mysqldb";
    $user = "stark";
    $pass = "iAmIronMan";
    $dbName = "loja1";
    $conn = new mysqli($host, $user, $pass, $dbName);
} catch (Exception $e) {
    //se nao conectar :(
    echo $e->getMessage();
}

mysqli_set_charset($conn, 'utf8');
//se existe dados POST
if(isset( $_POST["nome"]) && isset($_POST["valor"]) ){
    //se veio id beleza, se não veio continua -1
    if ( isset($_POST["id"]) ) $id = $_POST["id"];
    if ( isset($_GET["del"]) ) $del = $_GET["del"];
    $nome = $_POST["nome"];
    $valor = $_POST["valor"];

    //mas se eles estão vazios:
    if( empty($nome) || empty($valor)){
        $erro = "Campo faltando";
    }else{
        //se mandou id é para alterar existente
        if( is_numeric($id) ){

            if($id > 0){
                //prepara a solicitação
                $stmt = $conn->prepare("UPDATE produto SET nome=?, `valor`=? WHERE id = ? ");
	    		$stmt->bind_param('sss', $nome, $valor, $id);
                
                //e manda
			    if( $stmt->execute() ){
                    $sucesso = "Dados cadastrados com sucesso";
			    }else{
    				$erro = $stmt->error;
			    }
		    }
        }else{
            // se não mandou id, prepara a solicitação insert
    	    $stmt = $conn->prepare("INSERT INTO produto (nome,valor) VALUES (?,?)");
		    $stmt->bind_param('ss', $nome, $valor);
             
            //e manda ver
	    	if($stmt->execute()){
    		 	$sucesso = "Dados cadastrados com sucesso!";
		    }else{
        	    $erro = $stmt->error;
            }
        }
    }
    
}else{
    //se não for um post é um get entao verifico se foi mandado del=true
    if( $_GET["id"] > 0 && ($_GET["del"]) ){
        //prepara a solicitação
        $stmt = $conn->prepare( "DELETE from produto WHERE id = ? ");
        $stmt->bind_param('s', $_GET["id"]);
        
        //e manda
        if( $stmt->execute() ){
            $sucesso = "Produto de id: ".$_GET["id"]." excluído com sucesso";
        }else{
            $erro = $stmt->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Loja1</title>
</head>
<body>
    <form action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
	    <input type="text" name="nome" placeholder="nome do produto" value="<?=$_GET["nome"]?>"><br/><br/>
	    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="0.01" name="valor" placeholder="0,00" value="<?=$_GET["valor"]?>"><br/><br/>
        <input type="hidden" value="<?if( $_GET["del"] ){ echo ""; }else{ echo $_GET["id"]; }?>" name="id" >
        <button type="submit">
        <?if($_GET["id"] > 0 && !($_GET["del"]) ){ echo "Editar produto"; }else{ echo "Salvar novo"; }?>
        </button>
    </form>
<?
if(isset($erro))
	echo '<div style="color:#F00">'.$erro.'</div>';
else
if(isset($sucesso))
	echo '<div style="color:#00f">'.$sucesso.'</div>';
 
?>
    <br>
    <br>
    <table width="400px">
        <tr>
            <td><strong>Id</strong></td>
            <td><strong>Nome</strong></td>
            <td><strong>Valor</strong></td>
        </tr>
<?
if( $result = $conn->query("SELECT * FROM produto") ){
    while ( $resultado = $result->fetch_assoc() ){
        echo '<tr>';
        echo '  <td>'.$resultado["id"].'</td>';
        echo '  <td>'.$resultado["nome"].'</td>';
        echo '  <td>'.$resultado["valor"].'</td>';
        echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?id='.$resultado["id"].'&nome='.$resultado["nome"].'&valor='.$resultado["valor"].'">Editar</a></td>';
        echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?id='.$resultado["id"].'&del=true">Excluir</a></td>';
        echo '</tr>';
    }
}else{
    echo "<tr>
        <td>[vazio]</td>
        <td>[vazio]</td>
        <td>[vazio]</td>
    </tr>";
    echo "<strong>A tabela 'produto' foi criada?";
}
?>
    </table>
</body>
</html>