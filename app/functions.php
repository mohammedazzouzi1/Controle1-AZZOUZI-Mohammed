<?php

// app/functions.php

function getArticles(PDO $PDO)
{
    $sql = "SELECT * FROM articles ORDER BY id DESC";
    $result = $PDO->query($sql);
    $articles = $result->fetchAll(PDO::FETCH_ASSOC);
    $result->closeCursor();
    return $articles;
}

function validateArticleInput($input)
{

    if (!isset($input["title"]) || empty($input["title"])) {
        return "Il manque le titre de l'article";
    }
    if (!isset($input["author"]) || empty($input["author"])) {
        return "Il manque le nom de l'auteur de l'article";
    }
    if (!isset($input["content"]) || empty($input["content"])) {
        return "Il manque le contenu de l'article";
    }
    return true;
}

function createArticle(PDO $PDO, $title, $author, $content)
{

    $request = $PDO->prepare("INSERT INTO articles (title, author, content) VALUES (:title, :author, :content)");
    $request->bindValue(":title", $title);
    $request->bindValue(":author", $author);
    $request->bindValue(":content", $content);
    return $request->execute();
}
