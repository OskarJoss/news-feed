<?php

declare(strict_types=1);

function daysAgo(string $publishedDate): string
{

    $currentDate = new DateTime(date('Ymd'));

    $date = new DateTime($publishedDate);

    $diff=$date->diff($currentDate);

    $days = date_interval_format($diff, '%a');

    return $days;

}


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

            $daysOld = daysAgo($article['published_date']);

            if ($daysOld == $i) {
                $result[] = $article;
            }

        }
    }

    return $result;
}

/**
 * Get authors full name from authors array by inserting author_id from articles array.
 *
 * @param integer $id
 * @param array $authors
 * @return string
 */
function getAuthorNameFromId(int $id, array $authors): string
{
    foreach ($authors as $author) {
        if ($id === $author['id']) {
            return $author['full_name'];
        }
    }
}
