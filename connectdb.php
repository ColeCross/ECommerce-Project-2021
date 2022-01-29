<!-- 
	Colton Cross
	This is the same connectdb.php from the examples.
-->
<?php 

$mysqli = mysqli_connect("localhost", "chc0009", "chc0009", "chc0009");
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}

?>

