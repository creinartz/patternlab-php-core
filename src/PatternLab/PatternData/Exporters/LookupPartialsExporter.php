<?php

/*!
 * Pattern Data Nav Items Exporter Class
 *
 * Copyright (c) 2015 Ian Devlin
 * Licensed under the MIT license
 *
 * Generates a lookup array of partials to src paths for Pattern Lab
 *
 */

namespace PatternLab\PatternData\Exporters;

use \PatternLab\PatternData;

class LookupPartialsExporter extends \PatternLab\PatternData\Exporter {
    public function __construct($options = array()) {

        parent::__construct($options);

    }

    public function run() {
        $lookupPartials = array();

        $store = PatternData::get();
        foreach ($store as $patternStoreKey => $patternStoreData) {
            if ($patternStoreData["category"] == "pattern") {
                $lookupPartials[$patternStoreData["partial"]] = $patternStoreData["pathName"];
            }
        }

        return $lookupPartials;
    }
}