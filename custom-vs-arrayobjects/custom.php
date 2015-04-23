<?php

$z = new CustomMods(['x' => 'ws']);
for ($i = 0; $i < 100; $i++) {
    $z->$i = $i;
    $z->{'y' . $i} = $i;
}
