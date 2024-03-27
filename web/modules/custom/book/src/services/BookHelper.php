<?php

namespace Drupal\book\services;

class BookHelper
{
    public function getTitle($book)
    {
        $content = $book->get('body')->value;
        $title = $book->getTitle();
        $title = strpos(strip_tags($content), 'awesome') !== FALSE ? "{$title}!!!" : $title;

        return $title;
    }

    public function is1yearOld($book)
    {
        $datePublished = $book->get('field_publication_date')->getValue();
        if (!empty($datePublished)) {
            return strtotime($datePublished[0]['value']) < strtotime('-1 year');
        }
        return FALSE;
    }
}
