<?php

declare(strict_types=1);

/**
 * Formats date to days ago, 0 returns 'today', 1 returns 'yesterday', the rest return 'X days ago'.
 *
 * @param string $date
 * @return string
 */
function formatToDaysAgo(string $date): string
{
    $currentDate = new DateTime(date('Ymd'));
    $publishedDate = new DateTime($date);
    $difference = $publishedDate->diff($currentDate);
    $daysAgo = $difference->format('%a');

   if ($daysAgo === '0') {
       return 'today';
   } elseif ($daysAgo === '1') {
       return 'yesterday';
   }

   return "$daysAgo days ago";
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
