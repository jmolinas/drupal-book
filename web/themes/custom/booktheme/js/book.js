((Drupal, once) => {
  'use strict';

  /**
   * Highlights the "Classic" badge with a brief pulse animation
   * so it draws the reader's attention on page load.
   */
  Drupal.behaviors.bookClassicBadge = {
    attach(context) {
      once('book-classic-badge', '.book-node__badge--classic', context)
        .forEach((badge) => {
          badge.classList.add('book-node__badge--pulse');
          badge.addEventListener('animationend', () => {
            badge.classList.remove('book-node__badge--pulse');
          }, { once: true });
        });
    },
  };

})(Drupal, once);
