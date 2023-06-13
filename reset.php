<?php
session_start();

unset($_SESSION['board']);
unset($_SESSION['currentPlayer']);
unset($_SESSION['message']);

header('Location: index.php');
exit();
?>
