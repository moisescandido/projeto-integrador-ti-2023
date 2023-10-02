<?php
session_start();

function verificar_autenticacao()
{
    if ($_SESSION['autenticado']) {
        return true;
    } else {
        return false;
    }
}


?>