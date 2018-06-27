<?php

require_once 'dbcon.php';

if(isset($_POST['save']))
{
	$uname = $_POST['uname'];
	$umail = $_POST['umail'];
	
	
	$stmt = $DBcon->prepare("INSERT INTO tbl_test(username,email) VALUES(:uname, :umail)");
	
	$stmt->bindparam(':uname', $uname);
	$stmt->bindparam(':umail', $umail);
	$stmt->execute();

}


if(isset($_GET['delete_id']))
{
	$id = $_GET['delete_id'];
	$stmt = $DBcon->prepare("DELETE FROM tbl_test WHERE id=:id");
	$stmt->execute(array(':id' => $id));
	header("Location: index.php");
}

if(isset($_GET['edit_id']))
{
	$stmt = $DBcon->prepare("SELECT * FROM tbl_test WHERE id=:id");
	$stmt->execute(array(':id' => $_GET['edit_id']));
	$editRow=$stmt->FETCH(PDO::FETCH_ASSOC);
	
}

if(isset($_POST['update']))
{
	$uname = $_POST['uname'];
	$umail = $_POST['umail'];
	$id = $_GET['edit_id'];
	
	$stmt = $DBcon->prepare("UPDATE tbl_test SET username=:uname, email=:uemail WHERE id=:id");
	$stmt->bindparam(':uname', $uname);
	$stmt->bindparam(':uemail', $umail);
	$stmt->bindparam(':id', $id);
	$stmt->execute();
	header("Location: index.php");
}


?>