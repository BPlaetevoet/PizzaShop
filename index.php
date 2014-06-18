<?php
session_start();

require_once 'bootstrap.php';


// Maak de pagina aan

$view = $twig->render("page.twig");
print $view;
