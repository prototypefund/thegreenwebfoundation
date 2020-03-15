# Run package tests
composer install

composer install -d packages/greencheck

# clear the test db
php ./packages/greencheck/tests/doctrine-cli.php orm:schema-tool:drop --force

# create the test db
php ./packages/greencheck/tests/doctrine-cli.php orm:schema-tool:create

# run the api tests
./vendor/bin/simple-phpunit -c phpunit.xml.dist

