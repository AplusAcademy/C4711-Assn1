<?php

/**
 * SlotsCsv.php
 * 
 * This class extends CSV_Model and is constructed from slots.csv.
 */
class SlotsCsv extends CSV_Model
{
    /**
     * Constructor for SlotsCsv.
     * Construct the class from data/slots.csv with id as key.
     */
    function __construct()
    {
        parent::__construct('../data/slots.csv','id');
    }
}
