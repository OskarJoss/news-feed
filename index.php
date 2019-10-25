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

        <div class="articleBox">

            <div class="contentBox">

                <?php foreach ($sortedArticles as $article): ?>

                    <?php
                        $title = $article['title'];
                        $content = $article['content'];
                        $authorId = $article['author_id'];
                        $publishedDate = $article['published_date'];
                        $likes = $article['likes'];
                        $image = $article['image'];
                        $imageText = $article['image_text'];
                    ?>

                    <article>

                        <h1><?php echo $title; ?></h1>

                        <div class="articleInfoBox">

                            <p class="published">Published <?php echo formatToDaysAgo($publishedDate) ?></p>

                            <div class="likeBox">

                                <p><?php echo $likes; ?></p>

                                <img class="likeSymbol" src="/images/icons/like.svg" alt="Like symbol">

                            </div>

                        </div>

                        <div class="articleImage" style="background-image: url(<?php echo $image?>)"></div>

                        <p><?php echo $content; ?></p>

                        <div class="nameAndDateBox">

                            <div class="authorBox">

                                <img class="profilePicture" src="<?php echo getAuthorImageFromId($authorId, $authors) ?>" alt="Image of author">

                                <p>Author: <?php echo getAuthorNameFromId($authorId, $authors); ?></p>

                            </div>

                            <p class="date"><?php echo formatDate($publishedDate); ?></p>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>

        </div>

    </body>
</html>
