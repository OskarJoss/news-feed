<?php

declare(strict_types=1);

/**
 * Takes a date in the form YYYYmmdd and returns how many days ago it was from the current date
 *
 * @param string $date
 * @return string
 */
function getDaysAgo(string $date): string
{

    //create a DateTime object with the current date
    $currentDate = new DateTime(date('Ymd'));

    //create a DateTime object with past date to compare with
    $publishedDate = new DateTime($date);

    //compare the difference, get DateIntervall
    $difference = $publishedDate->diff($currentDate);

    //format DateIntervall to total number of days and string
    $stringGetDaysAgo = $difference->format('%a');

    return $stringGetDaysAgo;

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

            //how many days old is the current article
            $daysOld = getDaysAgo($article['published_date']);

            //comparing string number to int number
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
        if ($id == $author['id']) {
            return $author['full_name'];
        }
    }
}

function getAuthorImageFromId(int $id, array $authors): string
{
    foreach ($authors as $author) {
        if ($id == $author['id']) {
            return $author['profile_picture'];
        }
    }
}

/**
 * Formats date to days ago, 0 = 'today', 1 = 'yesterday', the rest = 'X days ago'.
 *
 * @param string $date
 * @return string
 */
function formatToDaysAgo(string $date): string
{
   $daysAgo = getDaysAgo($date);

   if ($daysAgo === '0') {
       return 'today';
   } elseif ($daysAgo === '1') {
       return 'yesterday';
   }

   return $daysAgo . ' days ago';
}

/**
 * Formats date from YYYYmmdd to dd 'month as text' YYYY.
 *
 * @param string $date
 * @return string
 */
function formatDate(string $date): string
{
    $dateTimeObject = new DateTime($date);

    $formattedDate = $dateTimeObject->format('d F Y');

    return $formattedDate;
}
