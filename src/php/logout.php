<?php
session_start();
setcookie (session_id(), "", time() - 3600);
unset($_SESSION['email']);

$_SESSION['logout'] = 'User logout successfully';

header('Location: ../index.php');
?>
