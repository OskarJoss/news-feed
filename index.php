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

            <article>

                <h1>
                    <?php echo $article['title'] ?>
                </h1>

                <p>
                    <?php echo $article['content'] ?>
                </p>

                <div class="nameAndDate">

                    <p>
                        <?php echo getAuthorNameFromId($article['author_id'], $authors) ?>
                    </p>

                    <p class="date">
                        <?php echo $article['published_date'] ?>
                    </p>

                </div>

                <p>
                    <?php echo $article['likes']; ?> Likes
                </p>

            </article>

        <?php endforeach; ?>

    </body>
</html>
