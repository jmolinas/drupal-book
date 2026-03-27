<?php

namespace Drupal\book\services;

use Drupal\Core\Datetime\DateFormatterInterface;
use Drupal\node\NodeInterface;

class BookHelper {

  public function __construct(
    private readonly DateFormatterInterface $dateFormatter,
  ) {}

  /**
   * Returns the node title, appending "!!!" when the body contains "awesome".
   */
  public function getTitle(NodeInterface $book): string {
    $content = $book->get('body')->value ?? '';
    $title = $book->getTitle();

    return str_contains(strip_tags($content), 'awesome') ? "{$title}!!!" : $title;
  }

  /**
   * Returns TRUE if the book was published more than one year ago.
   */
  public function is1yearOld(NodeInterface $book): bool {
    $datePublished = $book->get('field_publication_date')->getValue();

    if (empty($datePublished)) {
      return FALSE;
    }

    return strtotime($datePublished[0]['value']) < strtotime('-1 year');
  }

  /**
   * Returns the publication date formatted as a human-readable string.
   */
  public function getFormattedPublicationDate(NodeInterface $book): ?string {
    $value = $book->get('field_publication_date')->value;

    if (!$value) {
      return NULL;
    }

    return $this->dateFormatter->format(strtotime($value), 'custom', 'F j, Y');
  }

}
