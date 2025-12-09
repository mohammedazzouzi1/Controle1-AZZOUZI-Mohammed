<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'db-config.php';
require 'functions.php';

$PDO = new PDO(DB_DSN, DB_USER, DB_PASS, $options);

$validationResult = validateArticleInput($_POST);

if ($validationResult === true) {
    createArticle($PDO, $_POST["title"], $_POST["author"], $_POST["content"]);
    header('Location: index.php');
} else {
    echo '<p style="color: red; font-weight: bold;">' . $validationResult . '</p>';
    echo '<p><a href="index.php">accueil</a></p>';
}
