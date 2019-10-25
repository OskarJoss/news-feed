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

                <div class="articleInfo">

                    <p class="published">
                        Published <?php echo formatToDaysAgo($publishedDate) ?>
                    </p>

                    <div class="likeBox">

                        <p>
                            <?php echo $likes; ?>
                        </p>

                        <img class="likeSymbol" src="/images/icons/like.svg" alt="Like symbol">

                    </div>

                </div>

                <img src="https://images.unsplash.com/photo-1571865577910-3d260b5e7cb1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1650&q=80" alt="bild">

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

            </article>

        <?php endforeach; ?>

    </body>
</html>
