<?php
if ($_SESSION['autenticado']) {
    header("Location: ./php/views/home.php");
} else {
    header("Location: ./php/views/login.php");
}
?>