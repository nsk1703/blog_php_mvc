<?php

/**
 * Permet de securiser une chaine de caractere
 * @param $string
 * @return string
 */
function str_secur($string){
    return trim(htmlspecialchars($string));
}

/**
 * Debug plus lisible des differentes variables
 * @param $var
 */
function debug($var){
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

/**
 * Formatage precise des dates
 * @param $date
 * @param $format
 * @return DateTime
 */
function formatDate($date, $format)
{
    return date_format(date_create($date, $format));
}

/**
 * Reduit le contenu d'un article a 60.
 * @param $content
 * @param $limit
 * @return string
 */
function getExcerpt(string $content, int $limit = 60)
{
    if(mb_strlen($content) < $limit){
        return $content;
    }
    $lastSpace = mb_strpos($content, ' ', $limit);
    return nl2br(htmlentities(substr($content, 0, $lastSpace). '...'));
}