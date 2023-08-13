<?php

	include('./config/constants.php');

	$uid = $_SESSION['uid']; 

	$notify = "SELECT * FROM m_order WHERE uid='$uid' AND notif2=0";

	$push = mysqli_query($conn, $notify);

	$pushed = mysqli_num_rows($push);

	echo $pushed;


?>