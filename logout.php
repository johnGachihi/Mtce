<?php
session_start();
//require 'ref.php';
session_destroy();
header('Location: ./index.php');
?>