<?php
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class SlotsController extends Application
 {
    function __construct()
	{
        parent::__construct();
        $this->load->model('SlotsCsv');
	}
 	/**
 	 * Index Page for this controller.
 	 *
 	 * Maps to the following URL
 	 * 		http://example.com/
 	 * 	- or -
 	 * 		http://example.com/welcome/index
 	 *
 	 * So any other public methods not prefixed with an underscore will
 	 * map to /welcome/<method_name>
 	 * @see https://codeigniter.com/user_guide/general/urls.html
 	 */
 	public function index()
 	{
        return; //this aint got no page, its just a controller
 	}

    public function category($key)
    {
        if($key == "all")
        {
            $slots = $this->SlotsCsv->all();
            header("Content-type: application/json");
            echo json_encode($slots);
            return;    
        }
        $slot = $this->SlotsCsv->some('id', $key);
        header("Content-type: application/json");
        echo json_encode($slot);
    }
 }
