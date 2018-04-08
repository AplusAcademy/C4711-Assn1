<?php
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class PresetsController extends Application
 {
    function __construct()
	{
        parent::__construct();
        $this->load->model('PresetsCsv');
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
        $this->data['pagetitle'] = 'Equipments presets';
        $this->data['pagebody'] = 'presets';
            
        $parts = $this->PresetsCsv->all();
        $this->data['parts'] = $parts;
        $this->render();
 	}

    public function category($key)
    {
        if($key == "all")
        {
            $presets = $this->PresetsCsv->all();
            header("Content-type: application/json");
            echo json_encode($items);
            return;            
        }
        else if ($key == "update")
        {
            $this->update();            
        }
        else if ($key == "create")
        {
            $this->create();            
        }
        else 
        {
            $presets = $this->PresetsCsv->some('id', $key);
            header("Content-type: application/json");
            echo json_encode($presets);
            return;            
        }
    }

    private function update()
    {
        // echo var_dump($_POST);
        $preset = array();
        $preset['id'] = $_POST['id']; 
        $preset['name'] = $_POST['name'];
        $preset['helmet'] = ($_POST['helmet'] == "") ? "." : $_POST['helmet'] ;
        $preset['chest'] = ($_POST['chest'] == "") ? "." : $_POST['chest'];
        $preset['weapon_left'] = ($_POST['weapon_left'] == "") ? "." : $_POST['weapon_left'];
        $preset['weapon_right'] = ($_POST['weapon_right'] == "") ? "." :  $_POST['weapon_right'];
        $preset['ring_left'] = ($_POST['ring_left'] == "") ? "." : $_POST['ring_left'];
        $preset['ring_right'] = ($_POST['ring_right'] == "") ? "." : $_POST['ring_right'];
        $preset['amulet'] = ($_POST['amulet'] == "") ? "." : $_POST['amulet'];
        $preset['belt'] = ($_POST['belt'] == "") ? "." : $_POST['belt'];
        $preset['boot'] = ($_POST['boot'] == "") ? "." : $_POST['boot'];
        $preset['glove'] = ($_POST['glove'] == "") ? "." : $_POST['glove'];

        $this->PresetsCsv->update($preset);
        echo "Preset '".$_POST['name']."' updated!";
    }

    private function create()
    {
        if ($_POST['name'] == "")
        {
            echo "Failed: Can't create new preset with empty name!";
            return;
        }

        $preset = array();
        $preset['id'] = $_POST['id']; 
        $preset['name'] = $_POST['name'];
        $preset['helmet'] = ($_POST['helmet'] == "") ? "." : $_POST['helmet'] ;
        $preset['chest'] = ($_POST['chest'] == "") ? "." : $_POST['chest'];
        $preset['weapon_left'] = ($_POST['weapon_left'] == "") ? "." : $_POST['weapon_left'];
        $preset['weapon_right'] = ($_POST['weapon_right'] == "") ? "." :  $_POST['weapon_right'];
        $preset['ring_left'] = ($_POST['ring_left'] == "") ? "." : $_POST['ring_left'];
        $preset['ring_right'] = ($_POST['ring_right'] == "") ? "." : $_POST['ring_right'];
        $preset['amulet'] = ($_POST['amulet'] == "") ? "." : $_POST['amulet'];
        $preset['belt'] = ($_POST['belt'] == "") ? "." : $_POST['belt'];
        $preset['boot'] = ($_POST['boot'] == "") ? "." : $_POST['boot'];
        $preset['glove'] = ($_POST['glove'] == "") ? "." : $_POST['glove'];

        $this->PresetsCsv->add($preset);
        echo "New preset '".$_POST['name']."' created!";
    }

 }
