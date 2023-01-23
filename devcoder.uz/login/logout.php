<?php
session_start();
session_destroy();
$papka == __DIR__;
header("Location: index.php");

?>