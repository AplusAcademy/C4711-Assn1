<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends Application
{
    /**
     * Constructor for Homepage controller.
     * 
     * It loads the presetscsv model.
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('PresetsCsv');
    }

    /**
     * Index Page for Homepage controller.
     *
     * It grabs all the data from presetscsv and renders it on specified view.
     */
    public function index()
    {
        $this->data['pagetitle'] = 'Path of Exile - Home';
        $this->data['pagebody'] = 'homepage';
        $role = $this->session->userdata('userrole');
        // dropdown used as indicator of current role
        if ($role == "")
            $role = "User Role";
        $this->data['userrole'] = $role;

        if ($role == ROLE_GUEST || $role == "User Role")
        {
            $this->data['savingcontrols'] = '';
        }
        else 
        {
            $this->data['savingcontrols'] = $this->parser->parse('savingcontrols',[], true);
        }

        $presets = $this->PresetsCsv->all();
        $this->data['presets'] = $presets;
        $this->render(); 
    }
}