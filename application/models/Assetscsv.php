<?php

/**
 * AssetsCsv.php
 * 
 * This class extends CSV_Model and is constructed from assets.csv.
 */
class AssetsCsv extends CSV_Model
{
    /**
     * Constructor for AssetsCsv.
     * Construct the class from data/assets.csv with id as key.
     */
    function __construct()
    {
        parent::__construct('../data/assets.csv','id');
    }
}