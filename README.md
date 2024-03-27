# Drupal Book Setup

## Build Setup

```bash
# install docker and lando

# start lando
$ lando start

# install dependencies
$ lando composer install

# install drupal
$ lando drush site:install --db-url=mysql://drupal10:drupal10@database/drupal10 -y

# run config import
$ lando drush cim --partial --source=/app/config/default
```