<?php

declare(strict_types=1);

/**
 * Sorts all articles by date and returns an array with the newest article first at index 0.
 *
 * @param array $articles
 * @return array
 */
function sortArticles(array $articles): array
{
    $result = [];

    // $i represents how many days old an article is and checks from 0-100 days.
    for ($i = 0; $i <= 100; $i++) {

        //inner loop, adds articles to result array by order of days old, starting with 0.
        foreach ($articles as $article) {

            $currentDate = date('Ymd');
            $publishedDate = $article['published_date'];
            $daysOld = $currentDate - $publishedDate;

            if ($daysOld === $i) {
                $result[] = $article;
            }

        }
    }

    return $result;
}

