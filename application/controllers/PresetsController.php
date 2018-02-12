<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PresetsController extends Application
{
    /**
     * Constructor for PresetsController.
     * 
     * It loads the presetscsv.
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('presetscsv');
    }
    /**
     * Index Page for PresetsController.
     *
     * It grabs all the data from presetscsv and renders it on specified view.
     */
    public function index()
    {
            $this->data['pagetitle'] = 'Equipments presets';
            $this->data['pagebody'] = 'presets';

            $parts = $this->presetscsv->all();
            $this->data['parts'] = $parts;

            $this->render();
    }
}