<?php

namespace Drupal\book\services;

class BookHelper
{
    protected $book;

    public function __construct($book)
    {
        $this->book = $book;
    }

    public function getTile($book)
    {
        $content = '';
        $title = '';
        $title = strpos($content, 'awesome') !== FALSE ? "{$title}!!!" : $title;

        return $title;
    }
}
