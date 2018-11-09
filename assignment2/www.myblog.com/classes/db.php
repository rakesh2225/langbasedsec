<?php

    $dblink = mysqli_connect("localhost", "rakeshsv", "12345","blog");
    if (mysqli_connect_errno()) {
    	printf("Connect failed: %s\n", mysqli_connect_error());
    	exit();
    }

?>
