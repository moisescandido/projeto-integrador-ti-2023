<?php
require_once './php/autenticacao.php';
$resultado = verificar_autenticacao("index.php");

if ($resultado) {
    header("Location: ./php/views/pesquisa.php");
} else {
    header("Location: ./php/views/pesquisa.php");
}
?>