<?php

 class Equipments extends CI_Model
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
                        array('equip_id' => '1', 'equip_code' => 'belt_2', 'CA_code' => '#000006', 'manufacturer' => 'sfu', 'built_date' => "02-03-2018 08:45"),
                        array('equip_id' => '2', 'equip_code' => 'belt_0', 'CA_code' => '#000007', 'manufacturer' => 'sfu', 'built_date' => "02-03-2018 12:10"),
                        array('equip_id' => '3', 'equip_code' => 'belt_1', 'CA_code' => '#000008', 'manufacturer' => 'sfu', 'built_date' => "02-03-2018 16:15"),

                        array('equip_id' => '4', 'equip_code' => 'amulet_0', 'CA_code' => '#000009', 'manufacturer' => 'ut', 'built_date' => "02-04-2018 08:25"),
                        array('equip_id' => '5', 'equip_code' => 'amulet_1', 'CA_code' => '#00000A', 'manufacturer' => 'ut', 'built_date' => "02-04-2018 12:00"),
                        array('equip_id' => '6', 'equip_code' => 'amulet_2', 'CA_code' => '#00000B', 'manufacturer' => 'ut', 'built_date' => "02-04-2018 15:20"),
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