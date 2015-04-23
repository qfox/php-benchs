#!/usr/bin/env php
<?php

require __DIR__ . "/vendor/autoload.php";
require __DIR__ . "/test.php";

use Lijinma\Commander;

$cmd = new Commander('benchit', 'Allows you to run php files several times');

$cmd
    ->version('0.1.0')
    ->option('-c, --count [count=1000]', 'Count of calls')
    ->parse($argv);

if (empty($cmd->_unknownArgs)) {
    $cmd->outputHelp();
    exit(1);
}

$count = (int)(@$cmd->count ?: 1000);

$filelen = 40;
$headpat = "%-{$filelen}s   | %-8s | %-8s | %-8s | %-10s";
$pat = "  %{$filelen}s | %8.5F | %8.5F | %8.5F | %10.5F";

$setup = null;
$tests = array_filter($cmd->_unknownArgs, function ($file) use (&$setup) {
    if (strpos($file, '/_setup.php') !== false) {
        $setup = $file;
        return false;
    }
    return true;
});

include_once $setup;
foreach($tests as $i => $file) {
    if (!file_exists($file)) {
        echo 'Error: file ' . $file . ' not found' . PHP_EOL;
        continue;
    }

    $res = test($file, $count);
    if (!($i % 20)) {
        echo sprintf($headpat, 'File', 'Min (ms)', 'Max (ms)', 'Avg (ms)', 'Total (ms)') . PHP_EOL;
    }

    echo sprintf($pat,
        (strlen($file) > $filelen - 3 ? '...' : '') . substr($res['file'], 3 - $filelen),
        $res['min'], $res['max'], $res['avg'], $res['total']) . PHP_EOL;
}
