# Yet another PHP benching stub

## Installation

```
git clone https://github.com/zxqfox/php-benchs.git
composer install
```

## Usage

Run `php benchit.php ./arrays-vs-arrayobjects/* -c 5000` to get some results
for 5k executions of each PHP file:
```
File                                       | Min (ms) | Max (ms) | Avg (ms) | Total (ms)
  ...rays-vs-arrayobjects/arrayobjects.php |  0.10085 |  0.42105 |  0.26095 |  534.92832
       ./arrays-vs-arrayobjects/arrays.php |  0.09799 |  1.23811 |  0.66805 |  517.61246
```

if in file `./arrays-vs-arrayobjects/arrays.php`:
```php
<?php
$z = array();
for ($i = 0; $i < 100; $i++) {
    $z[$i] = $i;
    $z['y' . $i] = $i;
}
?>
```

and in `./arrays-vs-arrayobjects/arrayobjects.php`
```php
<?php
$z = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
for ($i = 0; $i < 100; $i++) {
    $z[$i] = $i;
    $z['y' . $i] = $i;
}
?>
```

## License

[The MIT License](LICENSE)
