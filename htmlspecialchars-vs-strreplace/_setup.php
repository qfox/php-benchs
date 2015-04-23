<?php

function htmlspecials($s) {
    return htmlspecialchars($s, ENT_QUOTES);
}

function ampReplace($s) {
    return str_replace("&", "&amp;", str_replace('"', '&quot;', $s));
}

$list = [
    "lolwat\"foo\'b&\"\"\"\"\"\"\"\"\"\"\"\"\"\"<>!@#<>&\'ar' &&&&&&&&&&&&&&&&&&&&&",
    "&qwe\"\'zxc\'\"",
];
