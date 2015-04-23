<?php

global $list;
for($i = 0; $i < 1000; $i++) {
    foreach($list as $s) {
        htmlspecials($s);
    }
}
