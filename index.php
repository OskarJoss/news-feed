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
        <title></title>
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

                    <p>
                        <?php echo $article['published_date'] ?>
                    </p>

                    <p>
                        <?php echo $article['likes']; ?>
                    </p>
                </div>

            </article>

        <?php endforeach; ?>

    </body>
</html>
