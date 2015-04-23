<?php

class Mods extends ArrayObject {
    public function __construct ($mods) {
        parent::__construct($mods, ArrayObject::STD_PROP_LIST | ArrayObject::ARRAY_AS_PROPS);
    }
}

class CustomMods {

    /**
     * Mods
     * @param array [$mods]
     */
    public function __construct ($mods = null) {
        if (!$mods) {
            return;
        }
        foreach ($mods as $k => $v) {
            $this->$k = $v;
        }
    }

    public function __get ($k) {
        // suppress notices in templates
    }

}
