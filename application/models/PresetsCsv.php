<?php

/**
 * PresetsCsv.php
 * 
 * This class extends CSV_Model and is constructed from presets.csv.
 */
class PresetsCsv extends CSV_Model
{
    /**
     * Constructor for PresetsCsv.
     * Construct the class from data/presets.csv with id as key.
     */
    function __construct() {
      parent::__construct('../data/presets.csv','id');
    }

}
