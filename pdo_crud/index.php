<?php
require_once 'crud.php';
?>
<!DOCTYPE html>
<html>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<link href="my.css" rel="stylesheet" type="text/css"/>
<head>
<title>PDO & CRUD</title>
</head>
<body>
<center>
 <div class="container">
<header>
	<h1>PDO & CRUD</h1>
</header>

<form method="post">
<table>
<tr>
<td><input type="text" name="uname" placeholder="Username" value="<?php if(isset($_GET['edit_id'])){ print($editRow['username']); } ?>" /></td>
</tr>
<tr>
<td><input type="text" name="umail" placeholder="Email" value="<?php if(isset($_GET['edit_id'])){ print($editRow['email']); } ?>" /></td>
</tr>
<tr>
<td>
<?php
if(isset($_GET['edit_id']))
{
	?>
	<button type="submit" name="update">Update</button>
	<?php
}
else
{
	?>
	<button type="submit" name="save">Add Record</button>
	<?php
}
?>
</td>
</tr>
</table>
</form>

<br />

<?php

$stmt = $DBcon->prepare("SELECT * FROM tbl_test ORDER BY id DESC");
$stmt->execute();
?>
<table>
<tr>
<th>Username</th>
<th>Email</th>
<th colspan="2">Edit options</th>
</tr>
<?php
if($stmt->rowCount() > 0)
{
	while($row=$stmt->FETCH(PDO::FETCH_ASSOC))
	{
		?>
		<tr>
		<td><?php print($row['username']); ?></td>
		<td><?php print($row['email']); ?></td>
		<td><a href="index.php?edit_id=<?php print($row['id']); ?>">EDIT</a></td>
		<td><a href="index.php?delete_id=<?php print($row['id']); ?>">DELETE</a></td>
		</tr>
		<?php
	}
}
else
{
	?>
	<tr>
	<td colspan="3"><?php print("nothing here...");  ?></td>
	</tr>
	<?php
}
?>
</table>

<footer>
	<p>&copy; <?php echo date("Y"); ?> Your name.</p>
</footer>

</center>
</div><!--	End container-->
</body>
</html>