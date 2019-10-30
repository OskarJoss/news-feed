<?php

require __DIR__.'/functions.php';

$pdo = new PDO('sqlite:newsfeed.db');

$getArticles = $pdo->query("SELECT * FROM authors LEFT JOIN articles ON articles.author_id = authors.id WHERE articles.published_date BETWEEN date('now', '-100 day') AND date('now') ORDER BY published_date DESC");

$articles = $getArticles->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://unpkg.com/sanitize.css">
        <link rel="stylesheet" href="/style.css">
        <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
        <title>Delorean Daily</title>
    </head>
    <body>

        <nav>

            <h1>DeLorean Daily</h1>

        </nav>

        <div class="articleBox">

            <div class="contentBox">

                <?php foreach ($articles as $article): ?>

                    <?php
                        $title = $article['title'];
                        $content = $article['content'];
                        $publishedDate = formatDate($article['published_date']);
                        $publishedDaysAgo = formatToDaysAgo($article['published_date']);
                        $likes = $article['likes'];
                        $articleImage = $article['image'];
                        $articleImageText = $article['image_text'];
                        $authorName = $article['full_name'];
                        $authorImage = $article['profile_picture'];
                    ?>

                    <article>

                        <h1><?php echo $title; ?></h1>

                        <div class="articleInfoBox">

                            <p class="published">Published <?php echo $publishedDaysAgo; ?></p>

                            <div class="likeBox">

                                <p><?php echo $likes; ?></p>

                                <img class="likeSymbol" src="/images/icons/like.svg" alt="Like symbol">

                            </div>

                        </div>

                        <div class="articleImage" style="background-image: url(<?php echo $articleImage; ?>)"></div>

                        <p class="imageText"><?php echo $articleImageText; ?></p>

                        <p class="articleContent"><?php echo $content; ?></p>

                        <div class="nameAndDateBox">

                            <div class="authorBox">

                                <img class="profilePicture" src="<?php echo $authorImage; ?>" alt="Image of author">

                                <p>Author: <?php echo $authorName; ?></p>

                            </div>

                            <p class="date"><?php echo $publishedDate; ?></p>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>

        </div>

    </body>
</html>
