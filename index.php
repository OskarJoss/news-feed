<?php

require __DIR__.'/data.php';
require __DIR__.'/functions.php';


$sortedArticles = sortArticles($articles);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://unpkg.com/sanitize.css">
        <link rel="stylesheet" href="/style.css">
        <title>Delorean Daily</title>
    </head>
    <body>

        <?php foreach ($sortedArticles as $article): ?>

            <?php
                $title = $article['title'];
                $content = $article['content'];
                $authorId = $article['author_id'];
                $publishedDate = $article['published_date'];
                $likes = $article['likes'];
            ?>

            <article>

                <h1>
                    <?php echo $title; ?>
                </h1>

                <p class="published">
                    Published <?php echo formatToDaysAgo($publishedDate) ?>
                </p>

                <p>
                    <?php echo $content; ?>
                </p>

                <div class="nameAndDate">

                    <p>
                        Author: <?php echo getAuthorNameFromId($authorId, $authors); ?>
                    </p>

                    <p class="date">
                        <?php echo formatDate($publishedDate); ?>
                    </p>

                </div>

                <div class="likes">
                    <p>
                        <?php echo $likes; ?> Likes
                    </p>
                </div>

            </article>

        <?php endforeach; ?>

    </body>
</html>
