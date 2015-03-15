## Php Bijective Shortener
This package is a bijective shortener which shortens your unique integer identifier(like a mysql auto increment key) to a unique short string, the strategy simply makes a number with a longer base.

### Usage
You can set the characters which you want to be included into the shortened string, by default a random string is set. You should note that this is not an encrypting solution it's just an encoding solution like base_64 but in a bigger base, but by making a random sort of allowed characters you can gaurantee that it is impossible to guess a long number given a shortened string.
```php
<?php
use \Reshadman\BijectiveShortener\BijectiveShortener;

BijectiveShortener::setChars(
    'YRCAtS2qcL06JzFeWIsf9HbwgVPUoOkrZpaGm47vjNEuMT1dynlDxXhQK8i5B3'
);

$shortened = BijectiveShortener::makeFromInteger($int = 60500);

$decoded = BijectiveShortener::decodeToInteger($shortened);

echo 'The Shortened version of ' . $int ' is' . $shortened '\n';
echo 'The decoded version of ' . $shortened ' is ' . $decoded ' which is equal to original number(' . $int ')';
```