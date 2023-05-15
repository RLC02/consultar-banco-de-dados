<?php

define('MYQL_HOST', 'localhost:3306' );
define('MYSQL_USER', 'root' );
define('MYSQL_PASSWORD', '');
define('MYSQL_DB_NAME', 'bd_sistema');

try
{
    $PDO = new PDO('mysql:host=' . MYQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD);        
}catch( PDOException $e )
{
    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP -- Sistema de Acesso ao banco de dados</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</head>
<body>

    
<div class="Dados">
    <div class="row">
        <p class="TPrincipal">Consultar Dados de clientes</p>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Bairro</th>
                        <th scope="col">Cep</th>
                        <th scope="col">Cidade</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
        $sql = "SELECT * FROM clientes";
        $result = $PDO->query( $sql );
        $rows = $result->fetchAll();
        for($i=0; $i < count($rows); $i++){ ?>
                <td scope="col"> 
                Nome: <?php echo $rows [$i]['nome']; ?><br>             
                </td>
                <td scope="col">  
                Endereço: <?php echo $rows [$i]['endereco']; ?><br>
                </td>
                <td scope="col">  
                Bairro: <?php echo $rows [$i]['bairro']; ?><br>
                </td>
                <td scope="col">                 
                Cidade: <?php echo $rows [$i]['cidade']; ?><br>
                </td>
                <td scope="col">
                Cep: <?php echo $rows [$i]['cep']; ?><br>
                </td>         
                </tbody>
<?php
}
?>   
            </table>
        </div>
    </div>
</div>      
</body>
</html>