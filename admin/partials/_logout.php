<?php

session_start();
session_destroy();

header('Location: /barigas/admin/login.php');
?>
