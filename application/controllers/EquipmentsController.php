<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

class EquipmentsController extends Application
{
    /**
     * Constructor for EquipmentsController.
     * 
     * It loads the assetscsv model, and sets the page title and page body.
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('assetscsv');
        $this->data['pagetitle'] = 'Equipments build';
        $this->data['pagebody'] = 'assembly';
    }
    
    /**
     * Index Page for this controller.
     *
     * It grabs all the data from assetscsv and render it on specified view.
     */
    public function index()
    {             
        $parts = $this->assetscsv->all();
        $this->data['parts'] = $parts;
        $this->render();
    }

    /**
     * Filters the data in assetscsv by category with a given key.
     * 
     * @param type $key
     */
    public function category($key)
    {
        $parts = $this->assetscsv->some('category', $key);
        $this->data['parts'] = $parts;
        $this->render();
    }
}