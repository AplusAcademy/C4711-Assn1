<?php

 class Presets extends CI_Model
 {
        /*
        // equip ID
        public $equip_id;

        // Plant built at
        public $manufacturer;

        // date & time built
        public $built_date;
        */

        var $data = array(
                        array('pre_id' => '1', 'pre_code' => 'Screenshot_41', 'CA_code' => '#000000', 'manufacturer' => 'bcit', 'built_date' => "02-02-2018 8:30"),
                        array('pre_id' => '2', 'pre_code' => 'Screenshot_42', 'CA_code' => '#000001', 'manufacturer' => 'bcit', 'built_date' => "02-02-2018 11:45"),
                        array('pre_id' => '3', 'pre_code' => 'Screenshot_43', 'CA_code' => '#000002', 'manufacturer' => 'bcit', 'built_date' => "02-02-2018 15:10"),
                        array('pre_id' => '4', 'pre_code' => 'Screenshot_44', 'CA_code' => '#000003', 'manufacturer' => 'ubc', 'built_date' => "02-02-2018 08:50"),
                        array('pre_id' => '5', 'pre_code' => 'Screenshot_47', 'CA_code' => '#000004', 'manufacturer' => 'ubc', 'built_date' => "02-02-2018 11:55"),
                        array('pre_id' => '6', 'pre_code' => 'Screenshot_48', 'CA_code' => '#000005', 'manufacturer' => 'ubc', 'built_date' => "02-02-2018 14:35"),
        );

        // Constructor
        function __construct()
        {
            parent::__construct();
        }

        function get($which)
        {
                foreach ($this->data as $record)
                        if ($record['id'] == $which)
                                return $record;
                return null;
        }

        function all()
        {
                return $this->data;
        }
 }