<?php
error_reporting(0);
session_start();
session_destroy();
// exit();
echo "<script>document.location.href='../index.php?session=unset';</script>";

?>
