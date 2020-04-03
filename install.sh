#!/bin/bash
cd app/ && composer install && yarn install && bin/phpunit


# composer install --no-dev --optimize-autoloader
# bin/console cache:warmup --env=prod --no-debug