<?php
    session_start();
    session_unset();
    session_destroy();
 	echo "<script type='text/javascript'>alert('Logout Berhasil')</script>";
	echo "<script>location='../index.php'</script>";
 ?>
