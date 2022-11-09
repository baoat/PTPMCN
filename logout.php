<?php
session_start();

	include("Connection/Connection.php");

    session_destroy();
      header('location:index.php');
?>