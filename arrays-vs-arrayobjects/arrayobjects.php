<?php

// arrayobjects
$z = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
for ($i = 0; $i < 100; $i++) {
    $z[$i] = $i;
    $z['y' . $i] = $i;
}
