<?php

function test($file, $c = 1000) {
    $avgs = array();
    $lastStatsTime = time();

    $php = file_get_contents($file);
    $php = join("\n", array_slice(explode("\n", $php), 1));
    $fn = eval("return function() {\n" . $php . "\n};");

    for ($i=0; $i<$c; $i++) {
        $a = microtime(true);

        $fn();

        $avgs[] = microtime(true) - $a;
    }

    $min = (min($avgs) * 1000);
    $max = (max($avgs) * 1000);
    $avg = ((max($avgs) + min($avgs)) * 500);
    $total = array_sum($avgs) * 1000;
    $med = $total / count($avgs);

    return compact('file', 'min', 'avg', 'med', 'max', 'total');
}
