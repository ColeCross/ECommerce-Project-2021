<?php
$mysqli = mysqli_connect("localhost", "chc0009", "chc0009", "chc0009");

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {

	$sql="CREATE TABLE `projectAccounts` (
		`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		`name` varchar(200) NOT NULL,
		`email` varchar(200) NOT NULL,
		`password` varchar(200) NOT NULL,
		`role` varchar(20) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
	
	$res = mysqli_query($mysqli, $sql);

	if ($res === TRUE) {
	   	echo "Table successfully created.";
	} else {
		printf("Could not create table: %s\n", mysqli_error($mysqli));
	}

	mysqli_free_result($res); //free memory
	mysqli_close($mysqli);
}
?>