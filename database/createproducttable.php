<?php
$mysqli = mysqli_connect("localhost", "chc0009", "chc0009", "chc0009");

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {
    $sql="CREATE TABLE `projectProducts` (
        `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `name` varchar(200) NOT NULL,
        `type` varchar(200) NOT NULL,
		`price` int(100) NOT NULL,
		`rating` int(11) NOT NULL,
		`sale` boolean NOT NULL,
		`description` LONGTEXT NOT NULL
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