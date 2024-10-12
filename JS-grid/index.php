<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>PGrid Demo</title>
<meta name="description" content="Demo grid">
<script src="kfGrid.js"></script>
<script src="batiment.js"></script>
</head>
<body>
<!-- Content -->
<div id="container" >
</div>
<?php 
/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=batiment;host=127.0.0.1';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password,  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
$sql =  'SELECT b.id, adresse, libelle as `type`, nbpiece FROM batiment b
inner join `type` t on  b.type_id = t.id';
$sql2 =  'SELECT count(*) FROM batiment b
inner join `type` t on  b.type_id = t.id';
$nRows = $dbh->query($sql2)->fetchColumn();

$col =  (int) ($nRows/2);

?>
<script>
myGrid = new kfGrid("container",<?=$col?>,<?=$col?>);
var nbElement = <?=$nRows;?>; 
<?php $nb=-1; foreach  ($dbh->query($sql) as $row) { $nb++; ?>
myGrid.addObject(<?=$nb;?>,new <?=$row['type']?>("<?=$row['adresse']?>", 0).getImage());	
<?php } ?>


</script>
</body>
</html>