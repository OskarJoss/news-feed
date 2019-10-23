<?php

declare(strict_types=1);

/**
 * Takes a date and returns how many days ago it was from the current date
 *
 * @param string $date
 * @return string
 */
function daysAgo(string $date): string
{

    //create a dateTime object with the current date
    $currentDate = new DateTime(date('Ymd'));

    //create a dateTime object with past date to compare with
    $publishedDate = new DateTime($date);

    //compare the difference
    $difference = $publishedDate->diff($currentDate);

    //format it to total number of days and string
    $stringDaysAgo = $difference->format('%a');

    return $stringDaysAgo;

}


/**
 * Sorts all articles by date and returns an array with the newest article first at index 0,
 * only takes the last 100 days.
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
